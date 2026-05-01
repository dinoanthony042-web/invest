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
                <a href="{{ route('deposit') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💰</span> Deposits
                </a>
                <a href="{{ route('investment.plans') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📈</span> Invest
                </a>
                <a href="{{ route('transactions') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">🧾</span> Transactions
                </a>
                <a href="{{ route('withdrawals') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💸</span> Withdrawals
                </a>
                <a href="{{ route('analytics') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📊</span> Analytics
                </a>
                <a href="{{ route('settings') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-yellow-400/20 rounded-lg border border-yellow-400/30">
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
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div>
                        <h1 class="text-xl font-bold text-yellow-400">Account Settings</h1>
                        <p class="text-gray-400">Manage your profile, security, and notification preferences.</p>
                    </div>
                    @include('components.user-profile-dropdown')
                </div>
            </div>
        </header>

        <!-- Breadcrumb -->
        <nav class="px-4 sm:px-6 py-3 bg-gray-900/50 border-b border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ route('dashboard') }}" class="text-yellow-400 hover:text-yellow-300">Dashboard</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-white">Settings</li>
                </ol>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
                <div class="bg-gray-800 rounded-3xl border border-yellow-400/20 p-6 shadow-lg">
                    <h2 class="text-lg font-semibold text-yellow-400 mb-4">Profile Overview</h2>
                    <div class="space-y-4 text-sm text-gray-300">
                        <div>
                            <p class="text-gray-400">Full Name</p>
                            <p class="text-white font-semibold">{{ $user->name }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Email</p>
                            <p class="text-white font-semibold">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Phone Number</p>
                            <p class="text-white font-semibold">{{ $user->phone_number ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Country</p>
                            <p class="text-white font-semibold">{{ $user->country ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">State</p>
                            <p class="text-white font-semibold">{{ $user->state ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">City</p>
                            <p class="text-white font-semibold">{{ $user->city ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Postal Code</p>
                            <p class="text-white font-semibold">{{ $user->postal_code ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Address</p>
                            <p class="text-white font-semibold">{{ $user->address ?? 'Not set' }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400">Wallet Balance</p>
                            <p class="text-white font-semibold">${{ number_format($user->wallet_balance ?? 0, 2) }}</p>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-2 bg-gray-800 rounded-3xl border border-yellow-400/20 p-6 shadow-lg">
                    <h2 class="text-lg font-semibold text-yellow-400 mb-6">Account Settings</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-gray-900 rounded-3xl p-5 border border-yellow-400/10">
                            <h3 class="text-sm uppercase tracking-wide text-yellow-400 font-semibold mb-3">Personal Information</h3>
                            <p class="text-gray-400 text-sm mb-4">Review your profile details and contact information.</p>
                            <div class="space-y-3 text-gray-300 text-sm">
                                <div>
                                    <p class="text-gray-400">Name</p>
                                    <p class="text-white font-medium">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-400">Email</p>
                                    <p class="text-white font-medium">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-400">Phone</p>
                                    <p class="text-white font-medium">{{ $user->phone_number ?? 'Not set' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-400">Country</p>
                                    <p class="text-white font-medium">{{ $user->country ?? 'Not set' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-900 rounded-3xl p-5 border border-yellow-400/10">
                            <h3 class="text-sm uppercase tracking-wide text-yellow-400 font-semibold mb-3">Security</h3>
                            <p class="text-gray-400 text-sm mb-4">Change your password and verify account status.</p>
                            <div class="space-y-3 text-gray-300 text-sm mb-6">
                                <div>
                                    <p class="text-gray-400">Email Verified</p>
                                    <p class="text-white font-medium">{{ method_exists($user, 'hasVerifiedEmail') && $user->hasVerifiedEmail() ? 'Yes' : 'No' }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-400">Two-factor Authentication</p>
                                    <p class="text-white font-medium">Not Enabled</p>
                                </div>
                            </div>

                            <form action="{{ route('settings.password.update') }}" method="POST" class="space-y-4">
                                @csrf

                                @if(session('success'))
                                    <div class="rounded-3xl bg-green-500/10 border border-green-500/20 p-4 text-green-200 text-sm">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-300">Current Password</label>
                                    <input id="current_password" name="current_password" type="password" class="mt-2 w-full rounded-2xl border border-gray-700 bg-gray-900 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/20 @error('current_password') border-red-400 @enderror">
                                    @error('current_password')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-300">New Password</label>
                                    <input id="password" name="password" type="password" class="mt-2 w-full rounded-2xl border border-gray-700 bg-gray-900 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/20 @error('password') border-red-400 @enderror">
                                    @error('password')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm New Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" class="mt-2 w-full rounded-2xl border border-gray-700 bg-gray-900 px-4 py-3 text-white focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/20">
                                </div>

                                <button type="submit" class="w-full rounded-3xl bg-yellow-400 px-5 py-3 font-semibold text-black hover:bg-yellow-500 transition">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

// Close sidebar when clicking on a nav link (mobile)
document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth < 1024) {
            closeSidebar();
        }
    });
});
</script>
@endsection
