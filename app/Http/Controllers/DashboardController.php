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

            // Build a unified portfolio list
            $portfolioItems = collect();
            foreach ($investments as $investment) {
                $currentValue = $investment->amount * $investment->cryptoCurrency->current_price;
                $cost = $investment->amount * $investment->purchase_price;
                $portfolioItems->push([
                    'type' => 'crypto',
                    'name' => $investment->cryptoCurrency->name,
                    'symbol' => $investment->cryptoCurrency->symbol,
                    'amount' => $investment->amount,
                    'current_value' => $currentValue,
                    'profit' => $currentValue - $cost,
                    'status' => $investment->status ?? 'active',
                    'key' => substr($investment->cryptoCurrency->symbol, 0, 2),
                ]);
            }

            foreach ($userInvestmentPlans as $plan) {
                $daysElapsed = $plan->created_at->diffInDays(now());
                $totalDays = $plan->investmentPlan->duration_days;
                $progress = min($totalDays > 0 ? $daysElapsed / $totalDays : 1, 1);
                $currentValue = $plan->amount + ($plan->expected_return * $progress);
                $portfolioItems->push([
                    'type' => 'plan',
                    'name' => $plan->investmentPlan->name,
                    'symbol' => 'PLAN',
                    'amount' => $plan->amount,
                    'current_value' => $currentValue,
                    'profit' => $currentValue - $plan->amount,
                    'status' => $plan->status,
                    'key' => substr($plan->investmentPlan->name, 0, 2),
                ]);
            }

            // Calculate total portfolio value including investments and plans
            $totalValue = $portfolioItems->sum('current_value');
            $totalCost = $portfolioItems->sum(function ($item) {
                return $item['type'] === 'crypto' ? $item['current_value'] - $item['profit'] : ($item['current_value'] - $item['profit']);
            });
            $profit = $totalValue - $totalCost;

            $cryptos = CryptoCurrency::all();

            // Helper: compute portfolio value at any past timestamp
            $calculatePortfolioValue = function ($date) use ($investments, $userInvestmentPlans) {
                $portfolioValue = 0;

                foreach ($investments as $investment) {
                    $timeHeld = max($investment->created_at->diffInMinutes($date), 0);
                    $totalHeld = max($investment->created_at->diffInMinutes(now()), 1);
                    $progress = min($timeHeld / $totalHeld, 1);
                    $unitPrice = $investment->purchase_price + ($investment->cryptoCurrency->current_price - $investment->purchase_price) * $progress;
                    if ($date >= $investment->created_at) {
                        $portfolioValue += $investment->amount * $unitPrice;
                    }
                }

                foreach ($userInvestmentPlans as $plan) {
                    $daysElapsed = $plan->created_at->diffInDays($date);
                    if ($date >= $plan->created_at) {
                        $planDays = max($plan->investmentPlan->duration_days, 1);
                        $progress = min($daysElapsed / $planDays, 1);
                        $portfolioValue += $plan->amount + ($plan->expected_return * $progress);
                    }
                }

                return $portfolioValue;
            };

            $performanceRanges = [
                '1D' => ['labels' => [], 'values' => []],
                '7D' => ['labels' => [], 'values' => []],
                '30D' => ['labels' => [], 'values' => []],
                '1Y' => ['labels' => [], 'values' => []],
            ];

            for ($i = 23; $i >= 0; $i--) {
                $date = now()->subHours($i);
                $performanceRanges['1D']['labels'][] = $date->format('ga');
                $performanceRanges['1D']['values'][] = $calculatePortfolioValue($date);
            }

            for ($i = 6; $i >= 0; $i--) {
                $date = now()->subDays($i);
                $performanceRanges['7D']['labels'][] = $date->format('M d');
                $performanceRanges['7D']['values'][] = $calculatePortfolioValue($date);
            }

            for ($i = 29; $i >= 0; $i--) {
                $date = now()->subDays($i);
                $performanceRanges['30D']['labels'][] = $date->format('M d');
                $performanceRanges['30D']['values'][] = $calculatePortfolioValue($date);
            }

            for ($i = 11; $i >= 0; $i--) {
                $date = now()->subMonths($i);
                $performanceRanges['1Y']['labels'][] = $date->format('M Y');
                $performanceRanges['1Y']['values'][] = $calculatePortfolioValue($date);
            }

            $minValue = null;
            $maxValue = null;
            foreach ($performanceRanges as $range) {
                foreach ($range['values'] as $value) {
                    if ($minValue === null || $value < $minValue) {
                        $minValue = $value;
                    }
                    if ($maxValue === null || $value > $maxValue) {
                        $maxValue = $value;
                    }
                }
            }

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

            $investmentTransactions = $user->userInvestments()->with('investmentPlan')->latest()->take(5)->get()->map(function ($investment) {
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

            $recentTransactions = $deposits->merge($investmentTransactions)->sortByDesc('date')->take(5);

            // Get crypto news from the new provider, fallback to NewsAPI
            $news = [];
            try {
                $response = Http::get('https://api.thenewsapi.net/crypto', [
                    'apikey' => env('NEWS_API_KEY'),
                ]);

                if ($response->successful()) {
                    $payload = $response->json();
                    if (isset($payload['data'])) {
                        $news = $payload['data'];
                    } elseif (isset($payload['articles'])) {
                        $news = $payload['articles'];
                    }
                }
            } catch (\Exception $e) {
                try {
                    $fallback = Http::get('https://newsapi.org/v2/everything', [
                        'q' => 'cryptocurrency OR bitcoin OR ethereum',
                        'sortBy' => 'publishedAt',
                        'apiKey' => env('NEWS_API_KEY'),
                        'pageSize' => 5,
                    ]);
                    if ($fallback->successful()) {
                        $news = $fallback->json()['articles'] ?? [];
                    }
                } catch (\Exception $e) {
                    // Handle error silently
                }
            }

            return view('user.dashboard', compact('investments', 'totalValue', 'profit', 'cryptos', 'userInvestmentPlans', 'recentTransactions', 'news', 'portfolioItems', 'performanceRanges', 'minValue', 'maxValue'));
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
        \App\Jobs\SendDepositPendingEmail::dispatch($deposit);

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
            \App\Jobs\SendDepositApprovedEmail::dispatch($deposit);
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

    public function settings()
    {
        $user = Auth::user();
        return view('user.settings', compact('user'));
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
                    $progress = min($daysElapsed / $plan->investmentPlan->duration_days, 1);
                    $profit += $plan->expected_return * $progress * ($daysElapsed / $plan->investmentPlan->duration_days);
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
