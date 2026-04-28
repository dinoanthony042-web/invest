<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Models\Investment;
use App\Models\CryptoCurrency;
use App\Models\DepositRequest;
use App\Models\InvestmentPlan;
use App\Models\UserInvestment;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $totalUsers = \App\Models\User::count();
            $totalInvestments = \App\Models\Investment::count();
            $totalPortfolioValue = \App\Models\Investment::with('cryptoCurrency')->get()->sum(function ($investment) {
                return $investment->amount * $investment->cryptoCurrency->current_price;
            });
            $cryptos = \App\Models\CryptoCurrency::all();
            $recentUsers = \App\Models\User::latest()->take(5)->get();

            return view('admin.dashboard', compact('totalUsers', 'totalInvestments', 'totalPortfolioValue', 'cryptos', 'recentUsers'));
        } else {
            $user = Auth::user();
            $investments = $user->investments()->with('cryptoCurrency')->get();
            
            // Get active investment plans
            $userInvestmentPlans = $user->userInvestments()->with('investmentPlan')->where('status', 'active')->get();

            // Calculate total portfolio value including investments and plans
            $totalValue = 0;
            $totalCost = 0;
            foreach ($investments as $investment) {
                $currentValue = $investment->amount * $investment->cryptoCurrency->current_price;
                $cost = $investment->amount * $investment->purchase_price;
                $totalValue += $currentValue;
                $totalCost += $cost;
            }

            // Include investment plans value
            foreach ($userInvestmentPlans as $plan) {
                $daysElapsed = $plan->created_at->diffInDays(now());
                $totalDays = $plan->investmentPlan->duration_months * 30; // approximate
                $progress = min($daysElapsed / $totalDays, 1);
                $currentValue = $plan->amount + ($plan->expected_return * $progress);
                $totalValue += $currentValue;
                $totalCost += $plan->amount;
            }

            $profit = $totalValue - $totalCost;

            $cryptos = CryptoCurrency::all();

            // Get recent transactions
            $deposits = $user->depositRequests()->latest()->take(5)->get()->map(function ($deposit) {
                return [
                    'type' => 'deposit',
                    'icon' => '💰',
                    'color' => 'green',
                    'title' => 'Deposit',
                    'description' => ucfirst($deposit->network) . ' Transfer',
                    'amount' => $deposit->amount,
                    'date' => $deposit->created_at,
                    'status' => $deposit->status,
                ];
            });

            $investments = $user->userInvestments()->with('investmentPlan')->latest()->take(5)->get()->map(function ($investment) {
                return [
                    'type' => 'investment',
                    'icon' => '📈',
                    'color' => 'blue',
                    'title' => $investment->investmentPlan->name,
                    'description' => 'Investment Plan Purchase',
                    'amount' => -$investment->amount,
                    'date' => $investment->created_at,
                    'status' => $investment->status,
                ];
            });

            $recentTransactions = $deposits->merge($investments)->sortByDesc('date')->take(5);

            // Get crypto news
            $news = [];
            try {
                $response = Http::get('https://newsapi.org/v2/everything', [
                    'q' => 'cryptocurrency OR bitcoin OR ethereum',
                    'sortBy' => 'publishedAt',
                    'apiKey' => env('NEWS_API_KEY'),
                    'pageSize' => 5,
                ]);
                if ($response->successful()) {
                    $news = $response->json()['articles'] ?? [];
                }
            } catch (\Exception $e) {
                // Handle error silently
            }

            return view('user.dashboard', compact('investments', 'totalValue', 'profit', 'cryptos', 'userInvestmentPlans', 'recentTransactions', 'news'));
        }
    }

    public function deposit()
    {
        return view('user.deposit');
    }

    public function submitDepositRequest(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10',
            'network' => 'required|string|in:btc,eth,usdt-trc20,usdt-erc20,bnb',
            'wallet_address' => 'required|string|max:255',
        ]);

        $deposit = DepositRequest::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'network' => $validated['network'],
            'wallet_address' => $validated['wallet_address'],
            'status' => 'pending',
        ]);

        // Send pending deposit email
        Mail::to($deposit->user->email)->send(new \App\Mail\DepositPendingMail($deposit));

        return redirect()->route('deposit.confirmation', ['deposit' => $deposit->id]);
    }

    public function depositConfirmation(DepositRequest $deposit)
    {
        if ($deposit->user_id !== Auth::id()) {
            abort(403);
        }

        return view('user.deposit_confirmation', compact('deposit'));
    }

    public function adminDepositRequests()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $deposits = DepositRequest::with('user')->latest()->get();

        return view('admin.deposit_requests', compact('deposits'));
    }

    public function approveDeposit(DepositRequest $deposit)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        if ($deposit->status === 'pending') {
            $deposit->update(['status' => 'approved']);
            $deposit->user->increment('wallet_balance', $deposit->amount);

            // Send approved deposit email
            Mail::to($deposit->user->email)->send(new \App\Mail\DepositApprovedMail($deposit));
        }

        return back()->with('success', 'Deposit approved and wallet balance updated.');
    }

    public function rejectDeposit(DepositRequest $deposit)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        if ($deposit->status === 'pending') {
            $deposit->update(['status' => 'rejected']);
        }

        return back()->with('success', 'Deposit rejected.');
    }

    public function investmentPlans()
    {
        $plans = InvestmentPlan::where('is_active', true)->get();
        return view('user.investment_plans', compact('plans'));
    }

    public function buyPlan(Request $request, InvestmentPlan $plan)
    {
        $user = Auth::user();
        
        // Check wallet balance
        if ($user->wallet_balance < $plan->price) {
            return back()->with('error', 'Insufficient balance. Please deposit funds to continue.')
                         ->with('plan_id', $plan->id);
        }

        // Deduct from wallet and create investment
        $user->decrement('wallet_balance', $plan->price);
        
        $expectedReturn = $plan->price * ($plan->roi_percentage / 100);
        
        UserInvestment::create([
            'user_id' => $user->id,
            'investment_plan_id' => $plan->id,
            'amount' => $plan->price,
            'expected_return' => $expectedReturn,
            'status' => 'active',
        ]);

        return back()->with('success', 'Investment successful. Your plan is now active.');
    }

    public function analytics()
    {
        $user = auth()->user();
        
        // Get user's investments and plans
        $investments = Investment::where('user_id', $user->id)->with('cryptoCurrency')->get();
        $userInvestmentPlans = UserInvestment::where('user_id', $user->id)->with('investmentPlan')->get();
        
        // Calculate daily profits (simplified - assuming linear growth)
        $dailyProfits = [];
        for ($i = 30; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $profit = 0;
            
            foreach ($investments as $investment) {
                $daysHeld = $investment->created_at->diffInDays($date);
                if ($daysHeld > 0) {
                    $currentValue = $investment->amount * $investment->cryptoCurrency->current_price;
                    $cost = $investment->amount * $investment->purchase_price;
                    $profit += ($currentValue - $cost) * ($daysHeld / 365); // approximate daily
                }
            }
            
            foreach ($userInvestmentPlans as $plan) {
                $daysElapsed = $plan->created_at->diffInDays($date);
                if ($daysElapsed > 0) {
                    $progress = min($daysElapsed / ($plan->investmentPlan->duration_months * 30), 1);
                    $profit += $plan->expected_return * $progress * ($daysElapsed / ($plan->investmentPlan->duration_months * 30));
                }
            }
            
            $dailyProfits[] = [
                'date' => $date->format('M d'),
                'profit' => $profit
            ];
        }
        
        return view('user.analytics', compact('dailyProfits'));
    }
}
