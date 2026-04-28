@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">

    <!-- Off-Canvas Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0">
        <div class="flex items-center justify-center h-16 bg-gray-800 border-b border-yellow-400/20">
            <img src="{{ asset('mylogo1.png') }}" alt="BridgeField Capital Group" class="w-10 h-10 rounded-lg mr-3">
            <span class="text-lg font-bold text-yellow-400">BridgeField</span>
        </div>
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="{{ route('deposit') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-yellow-400/20 rounded-lg border border-yellow-400/30">
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
                        <h1 class="text-xl font-bold text-yellow-400">Deposit Funds</h1>
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
                <li class="text-gray-400">/</li>
                <li class="text-white">Deposit</li>
            </ol>
        </nav>

        <!-- MAIN DEPOSIT CONTENT -->
        <main class="px-4 py-8">

        <!-- PAGE HEADER -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-2 bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                Deposit Funds
            </h1>
            <p class="text-gray-400 text-lg">Add funds to your BridgeField Capital Group account securely</p>
        </div>

        <!-- DEPOSIT AMOUNT INPUT -->
        <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-6 mb-8">
            <h2 class="text-2xl font-bold text-yellow-400 mb-6">Enter Deposit Amount</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="deposit-amount" class="block text-sm font-medium text-gray-400 mb-2">Deposit Amount (USD)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 font-medium">$</span>
                    <input type="number" id="deposit-amount" min="10" step="0.01" placeholder="100.00" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-8 py-4 text-white font-mono text-lg focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 transition-all" oninput="validateAmount(this)">
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Minimum deposit: $10.00 USD</p>
                </div>

                <div class="flex items-end">
                    <button onclick="setDepositAmount()" disabled class="w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-semibold py-4 px-6 rounded-lg hover:from-yellow-500 hover:to-orange-600 transition-all transform hover:scale-105 shadow-lg opacity-50 cursor-not-allowed">
                        Continue to Network Selection
                    </button>
                </div>
            </div>

            <div id="amount-display" class="mt-6 p-4 bg-yellow-400/10 border border-yellow-400/20 rounded-lg hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-sm text-gray-400">Selected Amount:</span>
                        <span id="selected-amount" class="text-xl font-bold text-yellow-400 ml-2">$0.00</span>
                    </div>
                    <button onclick="resetAmount()" class="text-sm text-gray-400 hover:text-white transition-colors">
                        Change Amount
                    </button>
                </div>
            </div>
        </div>

        <div id="network-selection" class="grid grid-cols-1 lg:grid-cols-3 gap-8 hidden">

            <form id="deposit-request-form" method="POST" action="{{ route('deposit.submit') }}" class="lg:col-span-2 space-y-6">
                @csrf
                <input type="hidden" id="deposit-amount-hidden" name="amount" value="">
                <input type="hidden" id="deposit-network-hidden" name="network" value="">
                <input type="hidden" id="deposit-wallet-hidden" name="wallet_address" value="">

                <!-- WALLET SELECTION -->

                <!-- SELECT NETWORK -->
                <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-6">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-6">Select Network</h2>

                    <!-- NETWORK TABS -->
                    <div class="flex flex-wrap gap-2 mb-6">
                        <button type="button" onclick="selectNetwork('btc')" id="btc-tab" class="network-tab active px-4 py-2 bg-yellow-400 text-black rounded-lg font-medium transition-all">
                            ₿ Bitcoin (BTC)
                        </button>
                        <button type="button" onclick="selectNetwork('eth')" id="eth-tab" class="network-tab px-4 py-2 bg-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-600 transition-all">
                            ⟠ Ethereum (ERC20)
                        </button>
                        <button type="button" onclick="selectNetwork('usdt-trc20')" id="usdt-trc20-tab" class="network-tab px-4 py-2 bg-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-600 transition-all">
                            💰 USDT (TRC20)
                        </button>
                        <button type="button" onclick="selectNetwork('usdt-erc20')" id="usdt-erc20-tab" class="network-tab px-4 py-2 bg-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-600 transition-all">
                            💰 USDT (ERC20)
                        </button>
                        <button type="button" onclick="selectNetwork('bnb')" id="bnb-tab" class="network-tab px-4 py-2 bg-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-600 transition-all">
                            🟡 BNB Smart Chain (BEP20)
                        </button>
                    </div>

                    <!-- WALLET CARDS -->
                    <div id="btc-wallet" class="wallet-card">
                        <div class="bg-gradient-to-br from-orange-500/10 to-yellow-500/10 rounded-xl border border-orange-500/20 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-yellow-500 rounded-xl flex items-center justify-center">
                                        <span class="text-black font-bold text-xl">₿</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Bitcoin (BTC) Wallet</h3>
                                        <p class="text-gray-400">Native Bitcoin network</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-yellow-400 font-medium">Deposit Amount:</span>
                                        <span id="btc-amount-display" class="text-lg font-bold text-yellow-400">$0.00</span>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Please send exactly this amount</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-400 mb-2">Wallet Address</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" readonly value="bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh" class="flex-1 bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white font-mono text-sm" id="btc-address">
                                        <button type="button" onclick="copyToClipboard('btc-address')" class="px-4 py-3 bg-yellow-400 text-black rounded-lg font-medium hover:bg-yellow-500 transition-colors" id="btc-copy-btn">
                                            📋 Copy
                                        </button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-900/50 rounded-lg p-4">
                                        <div class="text-center">
                                            <div class="w-32 h-32 mx-auto bg-white rounded-lg flex items-center justify-center mb-2">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjEyOCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiBmaWxsPSIjZmZmZmZmIi8+Cjx0ZXh0IHg9IjY0IiB5PSI2NCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjMDAwMDAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iMC4zNWVtIj5CUkNPREVfSFRNTDwvdGV4dD4KPC9zdmc+" alt="QR Code" class="w-full h-full object-contain">
                                            </div>
                                            <p class="text-xs text-gray-400">Scan QR Code</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="bg-gray-900/50 rounded-lg p-4">
                                            <h4 class="font-semibold text-yellow-400 mb-2">Minimum Deposit</h4>
                                            <p class="text-white font-mono">0.0001 BTC</p>
                                            <p class="text-xs text-gray-400">≈ $2.50 USD</p>
                                        </div>

                                        <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4">
                                            <div class="flex items-start space-x-2">
                                                <span class="text-red-400 text-lg">⚠️</span>
                                                <div>
                                                    <h4 class="font-semibold text-red-400 mb-1">Important Warning</h4>
                                                    <p class="text-sm text-gray-300">Send only BTC to this address. Sending any other asset may result in permanent loss of funds.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="eth-wallet" class="wallet-card hidden">
                        <div class="bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-xl border border-blue-500/20 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center">
                                        <span class="text-black font-bold text-xl">⟠</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Ethereum (ERC20) Wallet</h3>
                                        <p class="text-gray-400">Ethereum network for ERC20 tokens</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-yellow-400 font-medium">Deposit Amount:</span>
                                        <span id="eth-amount-display" class="text-lg font-bold text-yellow-400">$0.00</span>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Please send exactly this amount</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-400 mb-2">Wallet Address</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" readonly value="0x742d35Cc6634C0532925a3b844Bc454e4438f44e" class="flex-1 bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white font-mono text-sm" id="eth-address">
                                        <button type="button" onclick="copyToClipboard('eth-address')" class="px-4 py-3 bg-yellow-400 text-black rounded-lg font-medium hover:bg-yellow-500 transition-colors" id="eth-copy-btn">
                                            📋 Copy
                                        </button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-900/50 rounded-lg p-4">
                                        <div class="text-center">
                                            <div class="w-32 h-32 mx-auto bg-white rounded-lg flex items-center justify-center mb-2">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjEyOCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiBmaWxsPSIjZmZmZmZmIi8+Cjx0ZXh0IHg9IjY0IiB5PSI2NCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjMDAwMDAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iMC4zNWVtIj5FVEhfUVJDMjA8L3RleHQ+Cjwvc3ZnPg==" alt="QR Code" class="w-full h-full object-contain">
                                            </div>
                                            <p class="text-xs text-gray-400">Scan QR Code</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="bg-gray-900/50 rounded-lg p-4">
                                            <h4 class="font-semibold text-yellow-400 mb-2">Minimum Deposit</h4>
                                            <p class="text-white font-mono">0.001 ETH</p>
                                            <p class="text-xs text-gray-400">≈ $2.00 USD</p>
                                        </div>

                                        <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4">
                                            <div class="flex items-start space-x-2">
                                                <span class="text-red-400 text-lg">⚠️</span>
                                                <div>
                                                    <h4 class="font-semibold text-red-400 mb-1">Important Warning</h4>
                                                    <p class="text-sm text-gray-300">Send only ERC20 tokens to this address. Sending native ETH or other assets may result in permanent loss of funds.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="usdt-trc20-wallet" class="wallet-card hidden">
                        <div class="bg-gradient-to-br from-green-500/10 to-teal-500/10 rounded-xl border border-green-500/20 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center">
                                        <span class="text-black font-bold text-lg">₮</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white">USDT (TRC20) Wallet</h3>
                                        <p class="text-gray-400">Tron network for fast transactions</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-yellow-400 font-medium">Deposit Amount:</span>
                                        <span id="usdt-trc20-amount-display" class="text-lg font-bold text-yellow-400">$0.00</span>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Please send exactly this amount</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-400 mb-2">Wallet Address</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" readonly value="TJjhx8x8x8x8x8x8x8x8x8x8x8x8x8x8x8x8x8x8" class="flex-1 bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white font-mono text-sm" id="usdt-trc20-address">
                                        <button type="button" onclick="copyToClipboard('usdt-trc20-address')" class="px-4 py-3 bg-yellow-400 text-black rounded-lg font-medium hover:bg-yellow-500 transition-colors" id="usdt-trc20-copy-btn">
                                            📋 Copy
                                        </button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-900/50 rounded-lg p-4">
                                        <div class="text-center">
                                            <div class="w-32 h-32 mx-auto bg-white rounded-lg flex items-center justify-center mb-2">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjEyOCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiBmaWxsPSIjZmZmZmZmIi8+Cjx0ZXh0IHg9IjY0IiB5PSI2NCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjMDAwMDAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iMC4zNWVtIj5VU0RUX1RSQzIwPC90ZXh0Pgo8L3N2Zz4=" alt="QR Code" class="w-full h-full object-contain">
                                            </div>
                                            <p class="text-xs text-gray-400">Scan QR Code</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="bg-gray-900/50 rounded-lg p-4">
                                            <h4 class="font-semibold text-yellow-400 mb-2">Minimum Deposit</h4>
                                            <p class="text-white font-mono">10 USDT</p>
                                            <p class="text-xs text-gray-400">≈ $10.00 USD</p>
                                        </div>

                                        <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4">
                                            <div class="flex items-start space-x-2">
                                                <span class="text-red-400 text-lg">⚠️</span>
                                                <div>
                                                    <h4 class="font-semibold text-red-400 mb-1">Important Warning</h4>
                                                    <p class="text-sm text-gray-300">Send only USDT (TRC20) to this address. Sending other assets may result in permanent loss of funds.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="usdt-erc20-wallet" class="wallet-card hidden">
                        <div class="bg-gradient-to-br from-blue-500/10 to-indigo-500/10 rounded-xl border border-blue-500/20 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center">
                                        <span class="text-black font-bold text-lg">₮</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white">USDT (ERC20) Wallet</h3>
                                        <p class="text-gray-400">Ethereum network for USDT</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-yellow-400 font-medium">Deposit Amount:</span>
                                        <span id="usdt-erc20-amount-display" class="text-lg font-bold text-yellow-400">$0.00</span>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Please send exactly this amount</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-400 mb-2">Wallet Address</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" readonly value="0x8ba1f109551bD432803012645ac136ddd64DBA72" class="flex-1 bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white font-mono text-sm" id="usdt-erc20-address">
                                        <button type="button" onclick="copyToClipboard('usdt-erc20-address')" class="px-4 py-3 bg-yellow-400 text-black rounded-lg font-medium hover:bg-yellow-500 transition-colors" id="usdt-erc20-copy-btn">
                                            📋 Copy
                                        </button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-900/50 rounded-lg p-4">
                                        <div class="text-center">
                                            <div class="w-32 h-32 mx-auto bg-white rounded-lg flex items-center justify-center mb-2">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjEyOCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHg9IjY0IiB5PSI2NCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjMDAwMDAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iMC4zNWVtIj5VU0RUX0VSQzIwPC90ZXh0Pgo8L3N2Zz4=" alt="QR Code" class="w-full h-full object-contain">
                                            </div>
                                            <p class="text-xs text-gray-400">Scan QR Code</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="bg-gray-900/50 rounded-lg p-4">
                                            <h4 class="font-semibold text-yellow-400 mb-2">Minimum Deposit</h4>
                                            <p class="text-white font-mono">10 USDT</p>
                                            <p class="text-xs text-gray-400">≈ $10.00 USD</p>
                                        </div>

                                        <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4">
                                            <div class="flex items-start space-x-2">
                                                <span class="text-red-400 text-lg">⚠️</span>
                                                <div>
                                                    <h4 class="font-semibold text-red-400 mb-1">Important Warning</h4>
                                                    <p class="text-sm text-gray-300">Send only USDT (ERC20) to this address. Sending other assets may result in permanent loss of funds.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bnb-wallet" class="wallet-card hidden">
                        <div class="bg-gradient-to-br from-yellow-500/10 to-amber-500/10 rounded-xl border border-yellow-500/20 p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center">
                                        <span class="text-black font-bold text-xl">🟡</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white">BNB Smart Chain (BEP20) Wallet</h3>
                                        <p class="text-gray-400">Binance Smart Chain network</p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-yellow-400 font-medium">Deposit Amount:</span>
                                        <span id="bnb-amount-display" class="text-lg font-bold text-yellow-400">$0.00</span>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Please send exactly this amount</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-400 mb-2">Wallet Address</label>
                                    <div class="flex items-center space-x-2">
                                        <input type="text" readonly value="0x9c1e2f3a4b5c6d7e8f9a0b1c2d3e4f5a6b7c8d9e" class="flex-1 bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white font-mono text-sm" id="bnb-address">
                                        <button type="button" onclick="copyToClipboard('bnb-address')" class="px-4 py-3 bg-yellow-400 text-black rounded-lg font-medium hover:bg-yellow-500 transition-colors" id="bnb-copy-btn">
                                            📋 Copy
                                        </button>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-gray-900/50 rounded-lg p-4">
                                        <div class="text-center">
                                            <div class="w-32 h-32 mx-auto bg-white rounded-lg flex items-center justify-center mb-2">
                                                <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTI4IiBoZWlnaHQ9IjEyOCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHg9IjY0IiB5PSI2NCIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmb250LXNpemU9IjEyIiBmaWxsPSIjMDAwMDAwIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iMC4zNWVtIj5CTkJfQkVQMjA8L3RleHQ+Cjwvc3ZnPg==" alt="QR Code" class="w-full h-full object-contain">
                                            </div>
                                            <p class="text-xs text-gray-400">Scan QR Code</p>
                                        </div>
                                    </div>

                                    <div class="space-y-3">
                                        <div class="bg-gray-900/50 rounded-lg p-4">
                                            <h4 class="font-semibold text-yellow-400 mb-2">Minimum Deposit</h4>
                                            <p class="text-white font-mono">0.01 BNB</p>
                                            <p class="text-xs text-gray-400">≈ $3.00 USD</p>
                                        </div>

                                        <div class="bg-red-900/20 border border-red-500/20 rounded-lg p-4">
                                            <div class="flex items-start space-x-2">
                                                <span class="text-red-400 text-lg">⚠️</span>
                                                <div>
                                                    <h4 class="font-semibold text-red-400 mb-1">Important Warning</h4>
                                                    <p class="text-sm text-gray-300">Send only BEP20 tokens to this address. Sending native BNB or other assets may result in permanent loss of funds.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" id="confirm-deposit-btn" onclick="submitDepositRequest()" disabled class="w-full md:w-auto bg-green-500 text-black font-semibold py-4 px-8 rounded-xl hover:bg-green-400 transition-all opacity-50 cursor-not-allowed">
                            I have sent payment
                        </button>
                    </div>
                </form>

                <!-- DEPOSIT STATUS -->
                <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-6">
                    <h3 class="text-xl font-bold text-yellow-400 mb-4">Deposit Status</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                                <span class="text-white">Awaiting deposit confirmation</span>
                            </div>
                            <span class="text-sm text-gray-400">Processing...</span>
                        </div>
                        <p class="text-sm text-gray-400">
                            All deposits require manual admin approval. Processing typically takes 5-15 minutes during business hours.
                        </p>
                    </div>
                </div>

            </div>

            <!-- TRANSACTION INSTRUCTIONS -->
            <div class="space-y-6">

                <!-- STEP BY STEP GUIDE -->
                <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-yellow-400 mb-6">How to Deposit</h3>

                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 step-circle bg-yellow-400 text-black rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                                1
                            </div>
                            <div>
                                <h4 class="step-text font-semibold text-white mb-1">Enter Deposit Amount</h4>
                                <p class="text-sm text-gray-400">Specify how much you want to deposit in USD (minimum $10.00).</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 step-circle bg-gray-600 text-white rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                                2
                            </div>
                            <div>
                                <h4 class="step-text font-semibold text-gray-400 mb-1">Select Network</h4>
                                <p class="text-sm text-gray-400">Choose your preferred blockchain network from the available options.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 step-circle bg-gray-600 text-white rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                                3
                            </div>
                            <div>
                                <h4 class="step-text font-semibold text-gray-400 mb-1">Copy Wallet Address</h4>
                                <p class="text-sm text-gray-400">Click the copy button to copy the wallet address to your clipboard.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 step-circle bg-gray-600 text-white rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                                4
                            </div>
                            <div>
                                <h4 class="step-text font-semibold text-gray-400 mb-1">Send Funds</h4>
                                <p class="text-sm text-gray-400">Send the exact amount from your external wallet. Double-check the address.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-8 h-8 step-circle bg-gray-600 text-white rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0">
                                5
                            </div>
                            <div>
                                <h4 class="step-text font-semibold text-gray-400 mb-1">Wait for Confirmation</h4>
                                <p class="text-sm text-gray-400">Admin will manually confirm your deposit. This usually takes 5-15 minutes.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SUPPORT -->
                <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-6">
                    <h3 class="text-xl font-bold text-yellow-400 mb-4">Need Help?</h3>
                    <div class="space-y-3">
                        <p class="text-sm text-gray-400">
                            Having trouble with your deposit? Our support team is here to help.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button class="flex-1 bg-gray-700 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-600 transition-colors">
                                💬 Live Chat
                            </button>
                            <button class="flex-1 bg-gray-700 text-white font-semibold py-3 px-4 rounded-xl hover:bg-gray-600 transition-colors">
                                📧 Email Support
                            </button>
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

// Deposit functionality
let selectedAmount = 0;
let selectedNetwork = '';

function validateAmount(input) {
    const amount = parseFloat(input.value);
    const button = document.querySelector('button[onclick="setDepositAmount()"]');
    
    if (amount >= 10) {
        button.disabled = false;
        button.classList.remove('opacity-50', 'cursor-not-allowed');
        button.classList.add('hover:scale-105');
    } else {
        button.disabled = true;
        button.classList.add('opacity-50', 'cursor-not-allowed');
        button.classList.remove('hover:scale-105');
    }
}

function setDepositAmount() {
    const input = document.getElementById('deposit-amount');
    selectedAmount = parseFloat(input.value);
    
    document.getElementById('selected-amount').textContent = '$' + selectedAmount.toFixed(2);
    document.getElementById('amount-display').classList.remove('hidden');
    document.getElementById('network-selection').classList.remove('hidden');
    
    // Update all amount displays
    document.getElementById('btc-amount-display').textContent = '$' + selectedAmount.toFixed(2);
    document.getElementById('eth-amount-display').textContent = '$' + selectedAmount.toFixed(2);
    document.getElementById('usdt-trc20-amount-display').textContent = '$' + selectedAmount.toFixed(2);
    document.getElementById('usdt-erc20-amount-display').textContent = '$' + selectedAmount.toFixed(2);
    document.getElementById('bnb-amount-display').textContent = '$' + selectedAmount.toFixed(2);
    
    // Scroll to network selection
    document.getElementById('network-selection').scrollIntoView({ behavior: 'smooth' });
}

function resetAmount() {
    selectedAmount = 0;
    document.getElementById('deposit-amount').value = '';
    document.getElementById('amount-display').classList.add('hidden');
    document.getElementById('network-selection').classList.add('hidden');
    
    const button = document.querySelector('button[onclick="setDepositAmount()"]');
    button.disabled = true;
    button.classList.add('opacity-50', 'cursor-not-allowed');
    button.classList.remove('hover:scale-105');
}

function selectNetwork(network) {
    selectedNetwork = network;
    
    // Update tabs
    document.querySelectorAll('.network-tab').forEach(tab => {
        tab.classList.remove('active', 'bg-yellow-400', 'text-black');
        tab.classList.add('bg-gray-700', 'text-gray-300');
    });
    
    document.getElementById(network + '-tab').classList.add('active', 'bg-yellow-400', 'text-black');
    document.getElementById(network + '-tab').classList.remove('bg-gray-700', 'text-gray-300');
    
    // Show selected wallet
    document.querySelectorAll('.wallet-card').forEach(card => {
        card.classList.add('hidden');
    });
    
    document.getElementById(network + '-wallet').classList.remove('hidden');
    
    // Enable confirm button
    const confirmBtn = document.getElementById('confirm-deposit-btn');
    confirmBtn.disabled = false;
    confirmBtn.classList.remove('opacity-50', 'cursor-not-allowed');
}

function copyToClipboard(elementId) {
    const element = document.getElementById(elementId);
    element.select();
    document.execCommand('copy');
    
    // Visual feedback
    const button = document.getElementById(elementId.replace('-address', '-copy-btn'));
    const originalText = button.textContent;
    button.textContent = '✅ Copied!';
    button.classList.add('bg-green-500');
    button.classList.remove('bg-yellow-400', 'hover:bg-yellow-500');
    
    setTimeout(() => {
        button.textContent = originalText;
        button.classList.remove('bg-green-500');
        button.classList.add('bg-yellow-400', 'hover:bg-yellow-500');
    }, 2000);
}

function submitDepositRequest() {
    if (!selectedAmount || !selectedNetwork) {
        alert('Please select an amount and network first.');
        return;
    }
    
    // Set form values
    document.getElementById('deposit-amount-hidden').value = selectedAmount;
    document.getElementById('deposit-network-hidden').value = selectedNetwork;
    
    // Get wallet address based on network
    const addressElement = document.getElementById(selectedNetwork + '-address');
    document.getElementById('deposit-wallet-hidden').value = addressElement.value;
    
    // Submit form
    document.getElementById('deposit-request-form').submit();
}
let selectedAmount = 0;
let selectedNetwork = null;
let selectedWalletAddress = null;

function setDepositAmount() {
    const amountInput = document.getElementById('deposit-amount');
    const amount = parseFloat(amountInput.value);

    if (!amount || amount < 10) {
        alert('Please enter a valid amount (minimum $10.00)');
        return;
    }

    selectedAmount = amount;
    document.getElementById('deposit-amount-hidden').value = amount;

    // Update display
    document.getElementById('selected-amount').textContent = '$' + amount.toFixed(2);
    document.getElementById('amount-display').classList.remove('hidden');

    // Update all wallet amount displays
    const networks = ['btc', 'eth', 'usdt-trc20', 'usdt-erc20', 'bnb'];
    networks.forEach(network => {
        const displayElement = document.getElementById(network + '-amount-display');
        if (displayElement) {
            displayElement.textContent = '$' + amount.toFixed(2);
        }
    });

    // Show network selection
    document.getElementById('network-selection').classList.remove('hidden');

    // Scroll to network selection
    document.getElementById('network-selection').scrollIntoView({ behavior: 'smooth' });

    // Update instructions - highlight step 2
    updateInstructions(2);
}

function submitDepositRequest() {
    if (!selectedAmount || !selectedNetwork || !selectedWalletAddress) {
        alert('Please select a network and confirm your wallet address before submitting.');
        return;
    }

    document.getElementById('deposit-amount-hidden').value = selectedAmount;
    document.getElementById('deposit-network-hidden').value = selectedNetwork;
    document.getElementById('deposit-wallet-hidden').value = selectedWalletAddress;

    updateInstructions(5);
    document.getElementById('deposit-request-form').submit();
}

function resetAmount() {
    selectedAmount = 0;
    selectedNetwork = null;
    selectedWalletAddress = null;
    document.getElementById('deposit-amount').value = '';
    document.getElementById('deposit-amount-hidden').value = '';
    document.getElementById('deposit-network-hidden').value = '';
    document.getElementById('deposit-wallet-hidden').value = '';
    document.getElementById('amount-display').classList.add('hidden');
    document.getElementById('network-selection').classList.add('hidden');

    const submitButton = document.getElementById('confirm-deposit-btn');
    submitButton.disabled = true;
    submitButton.classList.add('opacity-50', 'cursor-not-allowed');

    // Reset all wallet amount displays
    const networks = ['btc', 'eth', 'usdt-trc20', 'usdt-erc20', 'bnb'];
    networks.forEach(network => {
        const displayElement = document.getElementById(network + '-amount-display');
        if (displayElement) {
            displayElement.textContent = '$0.00';
        }
    });

    // Reset instructions
    updateInstructions(1);
}

function selectNetwork(network) {
    // Hide all wallet cards
    document.querySelectorAll('.wallet-card').forEach(card => {
        card.classList.add('hidden');
    });

    // Remove active class from all tabs
    document.querySelectorAll('.network-tab').forEach(tab => {
        tab.classList.remove('active');
        tab.classList.remove('bg-yellow-400', 'text-black');
        tab.classList.add('bg-gray-700', 'text-gray-300');
    });

    // Show selected wallet card
    document.getElementById(network + '-wallet').classList.remove('hidden');

    // Add active class to selected tab
    const activeTab = document.getElementById(network + '-tab');
    activeTab.classList.add('active');
    activeTab.classList.remove('bg-gray-700', 'text-gray-300');
    activeTab.classList.add('bg-yellow-400', 'text-black');

    selectedNetwork = network;
    const walletAddresses = {
        btc: document.getElementById('btc-address').value,
        eth: document.getElementById('eth-address').value,
        'usdt-trc20': document.getElementById('usdt-trc20-address').value,
        'usdt-erc20': document.getElementById('usdt-erc20-address').value,
        bnb: document.getElementById('bnb-address').value,
    };

    selectedWalletAddress = walletAddresses[network] || '';
    document.getElementById('deposit-network-hidden').value = selectedNetwork;
    document.getElementById('deposit-wallet-hidden').value = selectedWalletAddress;

    const submitButton = document.getElementById('confirm-deposit-btn');
    submitButton.disabled = false;
    submitButton.classList.remove('opacity-50', 'cursor-not-allowed');

    // Update instructions - highlight step 3
    updateInstructions(3);
}

function updateInstructions(activeStep) {
    const steps = document.querySelectorAll('.step-circle');
    const stepTexts = document.querySelectorAll('.step-text');

    steps.forEach((step, index) => {
        const stepNumber = index + 1;
        if (stepNumber === activeStep) {
            step.classList.remove('bg-gray-600');
            step.classList.add('bg-yellow-400');
            step.classList.remove('text-white');
            step.classList.add('text-black');
            stepTexts[index].classList.remove('text-gray-400');
            stepTexts[index].classList.add('text-white');
        } else if (stepNumber < activeStep) {
            step.classList.remove('bg-gray-600', 'bg-yellow-400');
            step.classList.add('bg-green-500');
            step.classList.remove('text-white');
            step.classList.add('text-white');
            stepTexts[index].classList.remove('text-gray-400');
            stepTexts[index].classList.add('text-green-400');
        } else {
            step.classList.remove('bg-yellow-400', 'bg-green-500');
            step.classList.add('bg-gray-600');
            step.classList.remove('text-black');
            step.classList.add('text-white');
            stepTexts[index].classList.remove('text-white', 'text-green-400');
            stepTexts[index].classList.add('text-gray-400');
        }
    });
}

function copyToClipboard(elementId) {
    const element = document.getElementById(elementId);
    const button = document.getElementById(elementId.replace('-address', '-copy-btn'));

    // Copy to clipboard
    navigator.clipboard.writeText(element.value).then(() => {
        // Show success feedback
        const originalText = button.innerHTML;
        button.innerHTML = '✅ Copied!';
        button.classList.remove('bg-yellow-400', 'hover:bg-yellow-500');
        button.classList.add('bg-green-500', 'hover:bg-green-600');

        // Update instructions - highlight step 4
        updateInstructions(4);

        // Reset after 2 seconds
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-500', 'hover:bg-green-600');
            button.classList.add('bg-yellow-400', 'hover:bg-yellow-500');
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy: ', err);
        // Fallback for older browsers
        element.select();
        document.execCommand('copy');
    });
}

function validateAmount(input) {
    const value = parseFloat(input.value);
    const button = document.querySelector('button[onclick="setDepositAmount()"]');

    if (value >= 10) {
        button.disabled = false;
        button.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        button.disabled = true;
        button.classList.add('opacity-50', 'cursor-not-allowed');
    }
}

// Initialize instructions on page load
document.addEventListener('DOMContentLoaded', function() {
    updateInstructions(1);
    validateAmount(document.getElementById('deposit-amount'));
});
</script>

<style>
.network-tab.active {
    @apply bg-yellow-400 text-black;
}

.wallet-card {
    @apply transition-all duration-300;
}

.wallet-card.hidden {
    @apply opacity-0 pointer-events-none;
    transform: translateY(10px);
}

.wallet-card:not(.hidden) {
    @apply opacity-100;
    transform: translateY(0);
}
</style>
@endsection