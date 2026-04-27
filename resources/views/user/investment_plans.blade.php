@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">

    <!-- PROFESSIONAL HEADER -->
    <header class="bg-black/50 backdrop-blur-lg border-b border-yellow-400/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-black font-bold text-lg">V</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                            VaultX Pro
                        </h1>
                        <p class="text-xs text-gray-400">Professional Crypto Investment Platform</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">Premium Investor</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-sm font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- NAVIGATION -->
            <nav class="mt-6">
                <div class="flex space-x-1 bg-gray-800/50 rounded-xl p-1 backdrop-blur-sm">
                    <a href="{{ route('dashboard') }}" class="flex-1 px-4 py-2 text-sm font-medium text-gray-400 hover:text-white rounded-lg transition-colors">
                        📊 Dashboard
                    </a>
                    <a href="{{ route('investment.plans') }}" class="flex-1 px-4 py-2 text-sm font-medium bg-yellow-400 text-black rounded-lg transition-colors">
                        💼 Investment Plans
                    </a>
                    <a href="{{ route('deposit') }}" class="flex-1 px-4 py-2 text-sm font-medium text-gray-400 hover:text-white rounded-lg transition-colors">
                        💰 Deposit
                    </a>
                    <a href="#" class="flex-1 px-4 py-2 text-sm font-medium text-gray-400 hover:text-white rounded-lg transition-colors">
                        📈 Invest
                    </a>
                    <a href="#" class="flex-1 px-4 py-2 text-sm font-medium text-gray-400 hover:text-white rounded-lg transition-colors">
                        ⚙️ Settings
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-6 py-8">

        <!-- PAGE HEADER -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold mb-2 bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                Investment Plans
            </h1>
            <p class="text-gray-400 text-lg">Choose from our carefully designed investment plans to grow your wealth</p>
        </div>

        <!-- WALLET STATUS -->
        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl p-6 mb-8 text-black shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-medium opacity-90">Available Balance</p>
                    <h2 class="text-4xl font-bold">${{ number_format(Auth::user()->wallet_balance ?? 0, 2) }}</h2>
                </div>
                <a href="{{ route('deposit') }}" class="px-6 py-3 bg-black text-yellow-400 rounded-lg font-semibold hover:bg-gray-900 transition-colors">
                    💰 Deposit More Funds
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-500/20 bg-green-500/10 p-4 text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded-2xl border border-red-500/20 bg-red-500/10 p-4 text-red-200 flex justify-between items-center">
                <span>{{ session('error') }}</span>
                <a href="{{ route('deposit') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors ml-4">
                    Deposit Funds
                </a>
            </div>
        @endif

        <!-- INVESTMENT PLANS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($plans as $plan)
            <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-8 shadow-lg hover:shadow-2xl hover:border-yellow-400/40 transition-all transform hover:scale-105">
                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-2">{{ $plan->name }}</h3>
                    <p class="text-gray-400 text-sm">{{ $plan->description }}</p>
                </div>

                <!-- PRICING -->
                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-xl p-6 mb-6">
                    <div class="flex items-baseline mb-2">
                        <span class="text-4xl font-bold text-white">${{ number_format($plan->price, 2) }}</span>
                        <span class="text-gray-400 ml-2">investment</span>
                    </div>
                </div>

                <!-- FEATURES -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                        <div>
                            <p class="text-sm text-gray-400">ROI</p>
                            <p class="font-semibold text-yellow-400">{{ number_format($plan->roi_percentage, 1) }}%</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                        <div>
                            <p class="text-sm text-gray-400">Duration</p>
                            <p class="font-semibold text-white">{{ $plan->duration_months }} Months</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
                        <div>
                            <p class="text-sm text-gray-400">Expected Return</p>
                            <p class="font-semibold text-green-400">${{ number_format($plan->price * ($plan->roi_percentage / 100), 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- ACTION BUTTON -->
                <form method="POST" action="{{ route('plans.buy', $plan) }}">
                    @csrf
                    <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-semibold py-4 px-6 rounded-xl hover:from-yellow-500 hover:to-orange-600 transition-all transform hover:scale-105 shadow-lg">
                        🚀 Buy This Plan
                    </button>
                </form>

                <p class="text-xs text-gray-400 text-center mt-4">
                    💡 Your wallet will be charged immediately upon purchase
                </p>
            </div>
            @endforeach
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-black/50 backdrop-blur-lg border-t border-yellow-400/20 mt-16">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-black font-bold">V</span>
                    </div>
                    <div>
                        <p class="text-sm text-gray-400">© 2026 VaultX Pro. All rights reserved.</p>
                        <p class="text-xs text-gray-500">Professional Crypto Investment Platform</p>
                    </div>
                </div>

                <div class="flex space-x-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-yellow-400 transition-colors">Privacy</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors">Terms</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors">Support</a>
                </div>
            </div>
        </div>
    </footer>

</div>
@endsection
