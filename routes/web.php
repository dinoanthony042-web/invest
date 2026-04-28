<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/plans', function () {
    return view('plans');
});

Route::get('/about', function () {
    return view('about');
});

// Auth routes
Route::get('/test', function() {
    return 'Test route works';
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Request $request) {
    $request->user()->markEmailAsVerified();
    return redirect('/dashboard')->with('verified', true);
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/analytics', [DashboardController::class, 'analytics'])->name('analytics');
    Route::get('/deposit', [DashboardController::class, 'deposit'])->name('deposit');
    Route::post('/deposit/request', [DashboardController::class, 'submitDepositRequest'])->name('deposit.submit');
    Route::get('/deposit/confirmation/{deposit}', [DashboardController::class, 'depositConfirmation'])->name('deposit.confirmation');
    Route::get('/plans', [DashboardController::class, 'investmentPlans'])->name('investment.plans');
    Route::post('/plans/{plan}/buy', [DashboardController::class, 'buyPlan'])->name('plans.buy');
    Route::get('/admin/deposits', [DashboardController::class, 'adminDepositRequests'])->name('admin.deposits');
    Route::post('/admin/deposits/{deposit}/approve', [DashboardController::class, 'approveDeposit'])->name('admin.deposit.approve');
    Route::post('/admin/deposits/{deposit}/reject', [DashboardController::class, 'rejectDeposit'])->name('admin.deposit.reject');
});
