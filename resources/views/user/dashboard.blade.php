@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">

    @if (session('verified'))
        <div class="bg-green-600 text-white px-4 py-3 rounded mb-4 text-center">
            Your email has been verified successfully!
        </div>
    @endif

    <!-- Off-Canvas Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center h-16 bg-gray-800 border-b border-yellow-400/20">
            <img src="{{ asset('mylogo1.png') }}" alt="BridgeField Capital Group" class="w-10 h-10 rounded-lg mr-3">
            <span class="text-lg font-bold text-yellow-400">BridgeField</span>
        </div>
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-yellow-400/20 rounded-lg border border-yellow-400/30">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="{{ route('deposit') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💰</span> Deposits
                </a>
                <a href="{{ route('investment.plans') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📈</span> Invest
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📊</span> Analytics
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">⚙️</span> Settings
                </a>
            </div>
        </nav>
        <div class="absolute bottom-0 w-full p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full flex items-center px-4 py-3 text-sm font-medium text-red-400 hover:text-red-300 hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">🚪</span> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" onclick="closeSidebar()"></div>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Header -->
        <header class="bg-black/50 backdrop-blur-lg border-b border-yellow-400/20 sticky top-0 z-30">
            <div class="px-4 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <!-- Hamburger Menu -->
                        <button id="sidebar-toggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-800 transition-colors" onclick="toggleSidebar()">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <!-- Page Title -->
                        <h1 class="text-xl font-bold text-yellow-400">Dashboard</h1>
                    </div>

                    <!-- User Profile -->
                    <div class="flex items-center space-x-3">
                        <div class="hidden sm:block text-right">
                            <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400">Premium Investor</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Breadcrumb -->
        <nav class="px-4 py-3 bg-gray-900/50 border-b border-gray-700">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('dashboard') }}" class="text-yellow-400 hover:text-yellow-300">Dashboard</a></li>
            </ol>
        </nav>

        <!-- MAIN DASHBOARD CONTENT -->
        <main class="px-4 py-8">

        <!-- PORTFOLIO OVERVIEW HERO -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <!-- MAIN PORTFOLIO CARD -->
            <div class="lg:col-span-2 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20 shadow-2xl">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-2xl lg:text-3xl font-bold mb-2">Portfolio Overview</h2>
                        <p class="text-gray-400">Real-time investment performance</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                        <span class="text-sm text-green-400 font-medium">Live Data</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                    <div>
                        <p class="text-sm text-gray-400 mb-1">Total Portfolio Value</p>
                        <h3 class="text-3xl lg:text-4xl font-bold text-white mb-2">${{ number_format($totalValue, 2) }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-sm {{ $profit >= 0 ? 'text-green-400' : 'text-red-400' }} font-medium">
                                {{ $profit >= 0 ? '+' : '' }}${{ number_format($profit, 2) }}
                            </span>
                            <span class="text-xs text-gray-400">
                                ({{ $totalValue > 0 ? number_format(($profit / ($totalValue - $profit)) * 100, 1) : '0.0' }}%)
                            </span>
                        </div>
                    </div>

                    <div>
                        <p class="text-sm text-gray-400 mb-1">24h Change</p>
                        <h3 class="text-3xl lg:text-4xl font-bold text-green-400 mb-2">+2.4%</h3>
                        <p class="text-xs text-gray-400">Market performance</p>
                    </div>
                </div>

                <!-- MOCK CHART AREA -->
                <div class="bg-gray-900/50 rounded-xl p-6 border border-gray-700">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-semibold text-yellow-400">Portfolio Performance</h4>
                        <div class="flex flex-wrap gap-2">
                            <button class="px-3 py-2 bg-yellow-400/20 text-yellow-400 rounded-lg text-sm min-h-[44px]">1D</button>
                            <button class="px-3 py-2 bg-gray-700 text-gray-300 rounded-lg text-sm hover:bg-gray-600 min-h-[44px]">7D</button>
                            <button class="px-3 py-2 bg-gray-700 text-gray-300 rounded-lg text-sm hover:bg-gray-600 min-h-[44px]">1M</button>
                            <button class="px-3 py-2 bg-gray-700 text-gray-300 rounded-lg text-sm hover:bg-gray-600 min-h-[44px]">1Y</button>
                        </div>
                    </div>
                    <!-- Mock Chart Visualization -->
                    <div class="h-48 lg:h-64 flex items-end justify-between space-x-1">
                        @for($i = 0; $i < 30; $i++)
                        <div class="bg-gradient-to-t from-yellow-400 to-orange-500 rounded-t w-full"
                             style="height: {{ rand(20, 100) }}%"></div>
                        @endfor
                    </div>
                    <div class="flex justify-between mt-4 text-xs text-gray-400">
                        <span>Jan 1</span>
                        <span>Today</span>
                    </div>
                </div>
            </div>

            <!-- QUICK ACTIONS & STATS -->
            <div class="space-y-6">

                <!-- QUICK STATS -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-yellow-400/20">
                    <h3 class="font-bold text-yellow-400 mb-4">Key Metrics</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-400">Active Investments</span>
                            <span class="font-bold text-white">{{ $investments->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-400">Total Assets</span>
                            <span class="font-bold text-white">{{ $cryptos->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-400">Wallet Balance</span>
                            <span class="font-bold text-white">${{ number_format(Auth::user()->wallet_balance ?? 0, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-400">Risk Level</span>
                            <span class="font-bold text-green-400">Low</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-400">Diversification</span>
                            <span class="font-bold text-blue-400">85%</span>
                        </div>
                    </div>
                </div>

                <!-- QUICK ACTIONS -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-yellow-400/20">
                    <h3 class="font-bold text-yellow-400 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('deposit') }}" class="block w-full bg-gray-700 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-600 transition-colors min-h-[44px] flex items-center justify-center">
                            💰 Deposit Funds
                        </a>
                        <a href="{{ route('investment.plans') }}" class="block w-full bg-gray-700 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-600 transition-colors min-h-[44px] flex items-center justify-center">
                            💼 Buy Investment Plans
                        </a>
                        <button class="w-full bg-gray-700 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-600 transition-colors min-h-[44px]">
                            📊 View Analytics
                        </button>
                        <button class="w-full bg-gray-700 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-600 transition-colors min-h-[44px]">
                            ⚙️ Settings
                        </button>
                    </div>
                </div>

                <!-- MARKET SENTIMENT -->
                <div class="bg-gray-800 rounded-2xl p-6 border border-yellow-400/20">
                    <h3 class="font-bold text-yellow-400 mb-4">Market Sentiment</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">Bullish</span>
                            <div class="w-20 bg-gray-700 rounded-full h-2">
                                <div class="bg-green-400 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-sm font-medium text-green-400">75%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-400">Bearish</span>
                            <div class="w-20 bg-gray-700 rounded-full h-2">
                                <div class="bg-red-400 h-2 rounded-full" style="width: 25%"></div>
                            </div>
                            <span class="text-sm font-medium text-red-400">25%</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- DETAILED PORTFOLIO & MARKET DATA -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

            <!-- PORTFOLIO BREAKDOWN -->
            <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 overflow-hidden">
                <div class="p-6 border-b border-yellow-400/20">
                    <h3 class="text-lg lg:text-xl font-bold text-yellow-400">Portfolio Breakdown</h3>
                    <p class="text-sm text-gray-400">Your investment allocation</p>
                </div>

                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($investments as $investment)
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-900/50 rounded-xl gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">{{ substr($investment->cryptoCurrency->symbol, 0, 2) }}</span>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-semibold text-white truncate">{{ $investment->cryptoCurrency->name }}</h4>
                                    <p class="text-sm text-gray-400">{{ $investment->cryptoCurrency->symbol }}</p>
                                </div>
                            </div>

                            <div class="text-right sm:text-right">
                                <p class="font-bold text-white">${{ number_format($investment->amount * $investment->cryptoCurrency->current_price, 2) }}</p>
                                <p class="text-sm {{ ($investment->cryptoCurrency->current_price - $investment->purchase_price) >= 0 ? 'text-green-400' : 'text-red-400' }}">
                                    {{ ($investment->cryptoCurrency->current_price - $investment->purchase_price) >= 0 ? '+' : '' }}{{ number_format((($investment->cryptoCurrency->current_price - $investment->purchase_price) / $investment->purchase_price) * 100, 1) }}%
                                </p>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <p class="text-gray-400">No investments yet</p>
                            <a href="{{ route('investment.plans') }}" class="inline-block mt-4 bg-yellow-400 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500 transition-colors min-h-[44px] flex items-center justify-center">
                                Start Investing
                            </a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- MARKET WATCH -->
            <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 overflow-hidden">
                <div class="p-6 border-b border-yellow-400/20">
                    <h3 class="text-lg lg:text-xl font-bold text-yellow-400">Market Watch</h3>
                    <p class="text-sm text-gray-400">Top performing cryptocurrencies</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px]">
                        <thead class="bg-gray-900/50">
                            <tr>
                                <th class="px-4 lg:px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Asset</th>
                                <th class="px-4 lg:px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Price</th>
                                <th class="px-4 lg:px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">24h</th>
                                <th class="px-4 lg:px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider hidden sm:table-cell">Market Cap</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($cryptos->take(5) as $crypto)
                            <tr class="hover:bg-gray-900/30 transition-colors">
                                <td class="px-4 lg:px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                            <span class="text-white font-bold text-xs">{{ substr($crypto->symbol, 0, 2) }}</span>
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-sm font-medium text-white truncate">{{ $crypto->name }}</div>
                                            <div class="text-sm text-gray-400">{{ $crypto->symbol }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-white">
                                    ${{ number_format($crypto->current_price, 2) }}
                                </td>
                                <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-right">
                                    <span class="text-sm font-medium {{ $crypto->price_change_24h >= 0 ? 'text-green-400' : 'text-red-400' }}">
                                        {{ $crypto->price_change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->price_change_24h, 2) }}%
                                    </span>
                                </td>
                                <td class="px-4 lg:px-6 py-4 whitespace-nowrap text-right text-sm text-gray-400 hidden sm:table-cell">
                                    ${{ number_format($crypto->market_cap / 1000000000, 1) }}B
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ACTIVE INVESTMENT PLANS -->
        @if($userInvestmentPlans->count() > 0)
        <div class="mb-8 bg-gray-800 rounded-2xl border border-yellow-400/20 overflow-hidden">
            <div class="p-6 border-b border-yellow-400/20">
                <h3 class="text-lg lg:text-xl font-bold text-yellow-400">Active Investment Plans</h3>
                <p class="text-sm text-gray-400">Your ongoing investment plans</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($userInvestmentPlans as $userPlan)
                    <div class="bg-gradient-to-br from-yellow-400/10 to-orange-500/10 rounded-xl border border-yellow-400/20 p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div class="min-w-0 flex-1">
                                <h4 class="text-base lg:text-lg font-bold text-yellow-400 truncate">{{ $userPlan->investmentPlan->name }}</h4>
                                <span class="inline-block mt-2 px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">{{ strtoupper($userPlan->status) }}</span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-400">Amount Invested</span>
                                <span class="font-bold text-white">${{ number_format($userPlan->amount, 2) }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-400">Expected Return</span>
                                <span class="font-bold text-green-400">+${{ number_format($userPlan->expected_return, 2) }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-400">ROI</span>
                                <span class="font-bold text-yellow-400">{{ number_format($userPlan->investmentPlan->roi_percentage, 1) }}%</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-400">Duration</span>
                                <span class="font-bold text-white">{{ $userPlan->investmentPlan->duration_months }} months</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-400">Purchased</span>
                                <span class="font-bold text-gray-300 text-sm">{{ $userPlan->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <!-- BOTTOM SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

            <!-- RECENT TRANSACTIONS -->
            <div class="lg:col-span-2 bg-gray-800 rounded-2xl border border-yellow-400/20">
                <div class="p-6 border-b border-yellow-400/20">
                    <h3 class="text-lg lg:text-xl font-bold text-yellow-400">Recent Transactions</h3>
                    <p class="text-sm text-gray-400">Your latest investment activities</p>
                </div>

                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-900/50 rounded-xl gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-green-400 text-lg">💰</span>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-medium text-white">Deposit</p>
                                    <p class="text-sm text-gray-400">Bank Transfer</p>
                                </div>
                            </div>
                            <div class="text-right sm:text-right">
                                <p class="font-bold text-green-400">+$5,000.00</p>
                                <p class="text-sm text-gray-400">2 hours ago</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-900/50 rounded-xl gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-blue-400 text-lg">₿</span>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-medium text-white">Bitcoin Purchase</p>
                                    <p class="text-sm text-gray-400">0.25 BTC @ $64,000</p>
                                </div>
                            </div>
                            <div class="text-right sm:text-right">
                                <p class="font-bold text-blue-400">-$16,000.00</p>
                                <p class="text-sm text-gray-400">1 day ago</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 bg-gray-900/50 rounded-xl gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-purple-400 text-lg">Ξ</span>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-medium text-white">Ethereum Purchase</p>
                                    <p class="text-sm text-gray-400">2.0 ETH @ $3,200</p>
                                </div>
                            </div>
                            <div class="text-right sm:text-right">
                                <p class="font-bold text-purple-400">-$6,400.00</p>
                                <p class="text-sm text-gray-400">3 days ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- NEWS & ALERTS -->
            <div class="bg-gray-800 rounded-2xl border border-yellow-400/20">
                <div class="p-6 border-b border-yellow-400/20">
                    <h3 class="text-lg lg:text-xl font-bold text-yellow-400">Market News</h3>
                    <p class="text-sm text-gray-400">Latest crypto updates</p>
                </div>

                <div class="p-6 space-y-4">
                    <div class="p-4 bg-yellow-400/10 border border-yellow-400/20 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-yellow-400">Bitcoin ETF Approval</p>
                                <p class="text-xs text-gray-400 mt-1">SEC approves spot Bitcoin ETF applications</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-blue-400/10 border border-blue-400/20 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-blue-400 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-blue-400">Ethereum Upgrade</p>
                                <p class="text-xs text-gray-400 mt-1">Dencun upgrade successfully deployed</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-green-400/10 border border-green-400/20 rounded-xl">
                        <div class="flex items-start space-x-3">
                            <div class="w-2 h-2 bg-green-400 rounded-full mt-2 flex-shrink-0"></div>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-green-400">Market Rally</p>
                                <p class="text-xs text-gray-400 mt-1">Crypto market up 5% in 24 hours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="lg:ml-64 bg-black/50 backdrop-blur-lg border-t border-yellow-400/20 mt-16">
        <div class="px-4 py-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="flex items-center space-x-4">
                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                        <span class="text-black font-bold">V</span>
                    </div>
                    <div class="text-center sm:text-left">
                        <p class="text-sm text-gray-400">© 2026 BridgeField Capital Group. All rights reserved.</p>
                        <p class="text-xs text-gray-500">Professional Crypto Investment Platform</p>
                    </div>
                </div>

                <div class="flex flex-wrap justify-center sm:justify-end space-x-6 text-sm text-gray-400 gap-4">
                    <a href="#" class="hover:text-yellow-400 transition-colors">Privacy</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors">Terms</a>
                    <a href="#" class="hover:text-yellow-400 transition-colors">Support</a>
                </div>
            </div>
        </div>
    </footer>

</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    if (sidebar.classList.contains('-translate-x-full')) {
        // Open sidebar
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    } else {
        // Close sidebar
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    }
}

function closeSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
}

// Close sidebar when clicking on a nav link (mobile)
document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth < 1024) { // lg breakpoint
            closeSidebar();
        }
    });
});

// Handle window resize
window.addEventListener('resize', () => {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    if (window.innerWidth >= 1024) {
        // Desktop: ensure sidebar is visible
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.add('hidden');
    } else {
        // Mobile: ensure sidebar is hidden initially
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    }
});
</script>
@endsection