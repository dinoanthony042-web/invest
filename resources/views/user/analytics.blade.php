@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-black to-gray-900 text-white">
    <!-- SIDEBAR -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-black/90 backdrop-blur-lg border-r border-yellow-400/20 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-between p-4 border-b border-yellow-400/20">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center">
                    <span class="text-black font-bold text-xl">V</span>
                </div>
                <div>
                    <h1 class="text-lg font-bold text-white">VaultX</h1>
                    <p class="text-xs text-gray-400">Crypto Investment</p>
                </div>
            </div>
            <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-yellow-400/10 transition-colors">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                </svg>
                <span class="text-gray-300">Dashboard</span>
            </a>

            <a href="{{ route('analytics') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg bg-yellow-400/20 text-yellow-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <span>Analytics</span>
            </a>

            <a href="{{ route('deposit') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-yellow-400/10 transition-colors">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span class="text-gray-300">Deposit</span>
            </a>

            <a href="{{ route('investment.plans') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-yellow-400/10 transition-colors">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
                <span class="text-gray-300">Investment Plans</span>
            </a>

            <div class="pt-4 border-t border-gray-700">
                <a href="{{ route('logout') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-500/10 text-red-400 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- OVERLAY -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden" onclick="closeSidebar()"></div>

    <!-- MAIN CONTENT -->
    <div class="lg:ml-64">
        <!-- HEADER -->
        <header class="bg-black/50 backdrop-blur-lg border-b border-yellow-400/20 p-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-400 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Portfolio Analytics</h1>
                        <p class="text-sm text-gray-400">Detailed analysis of your investment performance</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-6 space-y-8">
            <!-- DAILY PROFITS CHART -->
            <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-6">
                <h2 class="text-xl font-bold text-white mb-4">Daily Profit Trends</h2>
                <div class="h-64">
                    <canvas id="profitChart"></canvas>
                </div>
            </div>

            <!-- ANALYTICS CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Total Investments</p>
                            <p class="text-2xl font-bold text-white">{{ count($dailyProfits) }}</p>
                        </div>
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Avg Daily Profit</p>
                            <p class="text-2xl font-bold text-green-400">${{ number_format(array_sum(array_column($dailyProfits, 'profit')) / count($dailyProfits), 2) }}</p>
                        </div>
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Best Day</p>
                            <p class="text-2xl font-bold text-white">${{ number_format(max(array_column($dailyProfits, 'profit')), 2) }}</p>
                        </div>
                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <div class="bg-black/50 backdrop-blur-lg rounded-xl border border-yellow-400/20 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Worst Day</p>
                            <p class="text-2xl font-bold text-red-400">${{ number_format(min(array_column($dailyProfits, 'profit')), 2) }}</p>
                        </div>
                        <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
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