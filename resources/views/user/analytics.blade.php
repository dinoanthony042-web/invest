@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-white">
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
                <a href="{{ route('deposit') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">💰</span> Deposits
                </a>
                <a href="{{ route('investment.plans') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors">
                    <span class="mr-3">📈</span> Invest
                </a>
                <a href="{{ route('analytics') }}" class="flex items-center px-4 py-3 text-sm font-medium text-white bg-yellow-400/20 rounded-lg border border-yellow-400/30">
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

    <!-- OVERLAY -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="closeSidebar()"></div>

    <!-- MAIN CONTENT -->
    <div class="lg:ml-64">
        <!-- HEADER -->
        <header class="bg-black/50 backdrop-blur-lg border-b border-yellow-400/20 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-xl sm:text-2xl font-bold text-white">Portfolio Analytics</h1>
                        <p class="text-xs sm:text-sm text-gray-400">Detailed analysis of your investment performance</p>
                    </div>
                </div>
                
                @include('components.user-profile-dropdown')
            </div>
        </header>

        <!-- CONTENT -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 space-y-6 sm:space-y-8">
            <!-- DAILY PROFITS CHART -->
            <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-4 sm:p-6">
                <h2 class="text-lg sm:text-xl font-bold text-white mb-4">Daily Profit Trends</h2>
                <div class="h-48 sm:h-64">
                    <canvas id="profitChart"></canvas>
                </div>
            </div>

            <!-- ANALYTICS CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-0">
                        <div>
                            <p class="text-sm text-gray-400">Total Investments</p>
                            <p class="text-2xl font-bold text-white">{{ count($dailyProfits) }}</p>
                        </div>
                        <svg class="w-6 sm:w-8 h-6 sm:h-8 text-yellow-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-0">
                        <div>
                            <p class="text-sm text-gray-400">Avg Daily Profit</p>
                            <p class="text-2xl font-bold text-green-400">${{ number_format(array_sum(array_column($dailyProfits, 'profit')) / count($dailyProfits), 2) }}</p>
                        </div>
                        <svg class="w-6 sm:w-8 h-6 sm:h-8 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-0">
                        <div>
                            <p class="text-sm text-gray-400">Best Day</p>
                            <p class="text-2xl font-bold text-white">${{ number_format(max(array_column($dailyProfits, 'profit')), 2) }}</p>
                        </div>
                        <svg class="w-6 sm:w-8 h-6 sm:h-8 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-0">
                        <div>
                            <p class="text-sm text-gray-400">Worst Day</p>
                            <p class="text-2xl font-bold text-red-400">${{ number_format(min(array_column($dailyProfits, 'profit')), 2) }}</p>
                        </div>
                        <svg class="w-6 sm:w-8 h-6 sm:h-8 text-red-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </main>

        <!-- FOOTER -->
        <footer class="bg-black/50 backdrop-blur-lg border-t border-yellow-400/20 mt-12 sm:mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-6">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <div class="w-7 h-7 sm:w-8 sm:h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-black font-bold text-xs sm:text-sm">V</span>
                        </div>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

// Chart.js for profit trends
const ctx = document.getElementById('profitChart').getContext('2d');
const profitChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json(array_column($dailyProfits, 'date')),
        datasets: [{
            label: 'Daily Profit ($)',
            data: @json(array_column($dailyProfits, 'profit')),
            borderColor: '#fbbf24',
            backgroundColor: 'rgba(251, 191, 36, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                },
                ticks: {
                    color: '#9ca3af'
                }
            },
            x: {
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                },
                ticks: {
                    color: '#9ca3af'
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: '#ffffff'
                }
            }
        }
    }
});
</script>
@endsection