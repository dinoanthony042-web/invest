<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            // Calculate total portfolio value
            $totalValue = 0;
            foreach ($investments as $investment) {
                $totalValue += $investment->amount * $investment->cryptoCurrency->current_price;
            }

            // Calculate profit/loss
            $totalCost = 0;
            foreach ($investments as $investment) {
                $totalCost += $investment->amount * $investment->purchase_price;
            }
            $profit = $totalValue - $totalCost;

            $cryptos = CryptoCurrency::all();
            
            // Get active investment plans
            $userInvestmentPlans = $user->userInvestments()->with('investmentPlan')->where('status', 'active')->get();

            return view('user.dashboard', compact('investments', 'totalValue', 'profit', 'cryptos', 'userInvestmentPlans'));
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
}
