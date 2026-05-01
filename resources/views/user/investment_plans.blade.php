@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">

    <!-- Off-Canvas Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 transform -translate-x-full transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="flex items-center justify-center h-16 bg-gray-800 border-b border-yellow-400/20">
            <img src="{{ asset('mylogo1.png') }}" alt="BridgeField Capital Group" class="w-10 h-10 rounded-lg mr-3">
            <span class="text-lg font-bold text-yellow-400">BridgeField</span>
        </div>
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📊</span> Dashboard
                </a>
                <a href="{{ route('investment.plans') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-yellow-400/20 rounded-lg border border-yellow-400/30">
                    <span class="mr-3">📈</span> Invest
                </a>
                <a href="{{ route('transactions') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">🧾</span> Transactions
                </a>
                <a href="{{ route('withdrawals') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💸</span> Withdrawals
                </a>
                <a href="{{ route('deposit') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💰</span> Deposits
                </a>
                <a href="{{ route('analytics') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📊</span> Analytics
                </a>
                <a href="{{ route('settings') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
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
                        <h1 class="text-xl font-bold text-yellow-400">Investment Plans</h1>
                    </div>

                    @include('components.user-profile-dropdown')
                </div>
            </div>
        </header>

        <!-- Breadcrumb -->
        <nav class="px-4 sm:px-6 py-2 sm:py-3 bg-gray-900/50 border-b border-gray-700">
            <ol class="flex items-center space-x-2 text-xs sm:text-sm">
                <li><a href="{{ route('dashboard') }}" class="text-yellow-400 hover:text-yellow-300">Dashboard</a></li>
                <li class="text-gray-400">/</li>
                <li class="text-white">Investment Plans</li>
            </ol>
        </nav>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">

        <!-- PAGE HEADER -->
        <div class="mb-8 sm:mb-12">
            <h1 class="text-3xl sm:text-4xl font-bold mb-2 bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                Investment Plans
            </h1>
            <p class="text-gray-400 text-base sm:text-lg">Choose from our carefully designed investment plans to grow your wealth</p>
        </div>

        <!-- WALLET STATUS -->
        <div class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-orange-500 rounded-3xl p-6 sm:p-8 mb-8 text-black shadow-2xl border-2 border-yellow-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                <div class="flex-1">
                    <p class="text-sm sm:text-base font-semibold opacity-80 uppercase tracking-wider">💼 Available Balance</p>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-2 drop-shadow-lg">
                        ${{ number_format(Auth::user()->wallet_balance ?? 0, 2) }}
                    </h2>
                    <p class="text-xs sm:text-sm mt-2 opacity-70 font-medium">Ready to invest</p>
                </div>
                <a href="{{ route('deposit') }}" class="w-full sm:w-auto px-6 sm:px-8 py-4 bg-black text-yellow-400 rounded-2xl font-bold text-base sm:text-lg hover:bg-gray-900 transition-all transform hover:scale-105 shadow-lg border-2 border-black">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
            @foreach($plans as $plan)
            <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 p-6 sm:p-8 shadow-lg hover:shadow-2xl hover:border-yellow-400/40 transition-all transform hover:scale-105">
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
                            <p class="font-semibold text-white">{{ $plan->duration_text }}</p>
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
                <button onclick="confirmPurchase({{ $plan->id }}, '{{ $plan->name }}', {{ $plan->price }}, {{ $plan->roi_percentage }}, {{ json_encode($plan->duration_text) }})" class="w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-semibold py-4 px-6 rounded-xl hover:from-yellow-500 hover:to-orange-600 transition-all transform hover:scale-105 shadow-lg">
                    🚀 Buy This Plan
                </button>

                <p class="text-xs text-gray-400 text-center mt-4">
                    💡 Your wallet will be charged immediately upon purchase
                </p>
            </div>
            @endforeach
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-black/50 backdrop-blur-lg border-t border-yellow-400/20 mt-12 sm:mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-6">
                <div class="text-center sm:text-left">
                    <p class="text-xs sm:text-sm text-gray-400">© 2026 BridgeField Capital Group. All rights reserved.</p>
                    <p class="text-xs text-gray-500">Professional Crypto Investment Platform</p>
                    </div>
                </div>

                    <div class="flex flex-wrap justify-center sm:justify-end space-x-4 sm:space-x-6 text-xs sm:text-sm text-gray-400 gap-2 sm:gap-4">
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
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    } else {
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

// Confirmation Modal Functions
function confirmPurchase(planId, planName, planPrice, roiPercentage, durationText) {
    const modal = document.getElementById('confirmModal');
    document.getElementById('planName').textContent = planName;
    document.getElementById('planPrice').textContent = '$' + parseFloat(planPrice).toFixed(2);
    document.getElementById('planROI').textContent = roiPercentage.toFixed(1) + '%';
    document.getElementById('planDuration').textContent = durationText;
    document.getElementById('expectedReturn').textContent = '$' + (parseFloat(planPrice) * parseFloat(roiPercentage) / 100).toFixed(2);
    document.getElementById('confirmBtn').onclick = function() {
        submitPurchase(planId);
    };
    modal.classList.remove('hidden');
}

function closePurchaseModal() {
    const modal = document.getElementById('confirmModal');
    modal.classList.add('hidden');
}

function submitPurchase(planId) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/plans/' + planId + '/buy';
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    form.innerHTML = '<input type="hidden" name="_token" value="' + token + '">';
    document.body.appendChild(form);
    form.submit();
}

// Close modal when clicking overlay
document.addEventListener('click', function(event) {
    const modal = document.getElementById('confirmModal');
    if (event.target === modal) {
        closePurchaseModal();
    }
});
</script>

<!-- CONFIRMATION MODAL -->
<div id="confirmModal" class="hidden fixed inset-0 bg-black/80 z-50 flex items-center justify-center p-4">
    <div class="bg-gray-800 rounded-2xl border border-yellow-400/20 max-w-md w-full p-8 shadow-2xl">
        <h2 class="text-2xl font-bold text-yellow-400 mb-4">Confirm Purchase</h2>
        
        <div class="bg-gray-900/50 rounded-xl p-6 mb-6 space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-gray-400">Plan</span>
                <span class="font-bold text-white" id="planName">-</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-400">Investment Amount</span>
                <span class="font-bold text-white" id="planPrice">-</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-400">ROI</span>
                <span class="font-bold text-yellow-400" id="planROI">-</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-400">Duration</span>
                <span class="font-bold text-white" id="planDuration">-</span>
            </div>
            <div class="border-t border-gray-700 pt-4 flex justify-between items-center">
                <span class="text-gray-400">Expected Return</span>
                <span class="font-bold text-green-400 text-lg" id="expectedReturn">-</span>
            </div>
        </div>

        <p class="text-sm text-gray-300 mb-6 bg-yellow-400/10 border border-yellow-400/20 rounded-lg p-3">
            ⚠️ This action will deduct the investment amount from your wallet balance. You cannot cancel this transaction once confirmed.
        </p>

        <div class="flex gap-3">
            <button onclick="closePurchaseModal()" class="flex-1 px-4 py-3 bg-gray-700 text-white font-semibold rounded-lg hover:bg-gray-600 transition-colors">
                Cancel
            </button>
            <button id="confirmBtn" class="flex-1 px-4 py-3 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-semibold rounded-lg hover:from-yellow-500 hover:to-orange-600 transition-all">
                Confirm Purchase
            </button>
        </div>
    </div>
</div>
@endsection
