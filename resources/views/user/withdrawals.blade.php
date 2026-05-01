@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">
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
                <a href="{{ route('transactions') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">🧾</span> Transactions
                </a>
                <a href="{{ route('withdrawals') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-yellow-400/20 rounded-lg border border-yellow-400/30">
                    <span class="mr-3">💸</span> Withdrawals
                </a>
                <a href="{{ route('deposit') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💰</span> Deposits
                </a>
                <a href="{{ route('investment.plans') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📈</span> Invest
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

    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" onclick="closeSidebar()"></div>

    <div class="lg:ml-64">
        <header class="bg-black/50 backdrop-blur-lg border-b border-yellow-400/20 sticky top-0 z-30">
            <div class="px-4 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <button id="sidebar-toggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-800 transition-colors" onclick="toggleSidebar()">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1 class="text-xl font-bold text-yellow-400">Withdrawals</h1>
                    </div>
                    @include('components.user-profile-dropdown')
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(session('withdrawal_success'))
                <div class="mb-6 rounded-3xl border border-green-500/20 bg-green-500/10 p-4 text-green-200">
                    {{ session('withdrawal_success') }}
                </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-gray-800 rounded-3xl border border-yellow-400/20 p-6 shadow-lg">
                    <h2 class="text-lg font-semibold text-yellow-400 mb-4">Withdrawals</h2>
                    <p class="text-gray-400 text-sm">Request a withdrawal after investment maturity.</p>
                </div>
                <div class="bg-gray-800 rounded-3xl border border-yellow-400/20 p-6 shadow-lg">
                    <h3 class="text-sm uppercase tracking-wide text-yellow-400 font-semibold mb-3">Mature investments</h3>
                    <p class="text-gray-300 text-sm">{{ $maturedInvestments->count() }} ready</p>
                </div>
                <div class="bg-gray-800 rounded-3xl border border-yellow-400/20 p-6 shadow-lg">
                    <h3 class="text-sm uppercase tracking-wide text-yellow-400 font-semibold mb-3">Pending requests</h3>
                    <p class="text-gray-300 text-sm">{{ $activeRequests->count() }} total</p>
                </div>
            </div>

            <section class="bg-gray-900 rounded-3xl border border-yellow-400/20 p-6 mb-8">
                <h2 class="text-xl font-semibold text-yellow-400 mb-4">Ready to Withdraw</h2>
                <div class="space-y-4">
                    @forelse($maturedInvestments as $investment)
                        <div class="rounded-3xl bg-gray-800 p-4 border border-yellow-400/10">
                            <div class="flex justify-between items-center mb-3">
                                <div>
                                    <p class="text-white font-semibold">{{ $investment->investmentPlan->name }}</p>
                                    <p class="text-gray-400 text-sm">Invested on {{ $investment->created_at->format('M d, Y') }}</p>
                                </div>
                                <span class="inline-flex items-center rounded-full bg-yellow-400/10 px-3 py-1 text-yellow-200 text-xs font-semibold">Matured</span>
                            </div>
                            <p class="text-gray-300 text-sm">Amount: ${{ number_format($investment->amount, 2) }}</p>
                            <p class="text-gray-300 text-sm">Expected return: ${{ number_format($investment->expected_return, 2) }}</p>
                            <form method="POST" action="{{ route('withdrawals.request', $investment) }}" class="mt-4">
                                @csrf
                                <button type="submit" class="rounded-3xl bg-yellow-500 px-5 py-2 text-sm font-semibold text-black hover:bg-yellow-400 transition">Request withdrawal</button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-500">You have no matured investments ready for withdrawal.</p>
                    @endforelse
                </div>
            </section>

            <section class="bg-gray-900 rounded-3xl border border-yellow-400/20 p-6">
                <h2 class="text-xl font-semibold text-yellow-400 mb-4">Withdrawal Requests</h2>
                <div class="space-y-4">
                    @forelse($activeRequests as $request)
                        <div class="rounded-3xl bg-gray-800 p-4 border border-yellow-400/10">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-white font-semibold">{{ $request->investment->investmentPlan->name ?? 'Investment' }}</span>
                                <span class="text-sm text-gray-400">{{ $request->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-400 text-sm">Amount: ${{ number_format($request->amount, 2) }}</p>
                            <p class="text-sm {{ $request->status === 'approved' ? 'text-green-400' : ($request->status === 'pending' ? 'text-yellow-400' : 'text-red-400') }}">Status: {{ ucfirst($request->status) }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">No withdrawal requests yet.</p>
                    @endforelse
                </div>
            </section>
        </main>
    </div>
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

document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth < 1024) {
            closeSidebar();
        }
    });
});
</script>
@endsection