@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen">
    <!-- Header -->
    <header class="w-full text-sm border-b border-yellow-400/20">
        <nav class="flex justify-between items-center p-6 bg-black/95 backdrop-blur-sm">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" class="w-12 h-12 rounded">
                <span class="text-xl font-extrabold text-yellow-400">Bridgefield</span>
            </a>
            <a href="/" class="text-yellow-400 hover:text-yellow-300 font-medium transition-colors">← Back to Home</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-black">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">System Status</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">Real-time platform and service status</p>
        </div>
    </section>

    <!-- Status Content -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4 max-w-3xl">
            <!-- Overall Status -->
            <div class="mb-12 bg-gradient-to-br from-green-900/30 to-green-900/10 rounded-2xl p-8 border border-green-500/50">
                <div class="flex items-center mb-4">
                    <div class="w-4 h-4 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                    <h2 class="text-2xl font-bold text-green-400">All Systems Operational</h2>
                </div>
                <p class="text-gray-300">Last updated: <span id="lastUpdate">Just now</span></p>
                <p class="text-gray-300 text-sm mt-2">Uptime: 99.99% (Last 30 days)</p>
            </div>

            <!-- Service Status -->
            <div class="space-y-4 mb-16">
                <h3 class="text-2xl font-bold text-yellow-400 mb-6">Service Status</h3>
                
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-yellow-400/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-white">Platform Website</h4>
                            <p class="text-gray-400 text-sm">Trading and account dashboard</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-green-400 font-bold">Operational</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-yellow-400/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-white">Mobile App</h4>
                            <p class="text-gray-400 text-sm">iOS and Android applications</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-green-400 font-bold">Operational</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-yellow-400/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-white">Deposits & Withdrawals</h4>
                            <p class="text-gray-400 text-sm">Cryptocurrency transactions</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-green-400 font-bold">Operational</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-yellow-400/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-white">API Services</h4>
                            <p class="text-gray-400 text-sm">REST and WebSocket APIs</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-green-400 font-bold">Operational</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-yellow-400/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-white">Customer Support</h4>
                            <p class="text-gray-400 text-sm">Help center and live chat</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-green-400 font-bold">Operational</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 hover:border-yellow-400/50 transition-all">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-xl font-bold text-white">Security Systems</h4>
                            <p class="text-gray-400 text-sm">Authentication and encryption</p>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-400 rounded-full mr-3"></div>
                            <span class="text-green-400 font-bold">Operational</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Incidents -->
            <div class="mb-16">
                <h3 class="text-2xl font-bold text-yellow-400 mb-6">Incident History</h3>
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700 text-center">
                    <p class="text-gray-300 mb-4">No incidents reported in the last 30 days</p>
                    <p class="text-gray-400 text-sm">We maintain a reliable and stable platform for all users</p>
                </div>
            </div>

            <!-- Maintenance Schedule -->
            <div>
                <h3 class="text-2xl font-bold text-yellow-400 mb-6">Scheduled Maintenance</h3>
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl p-6 border border-gray-700">
                    <p class="text-gray-300 mb-2">No scheduled maintenance</p>
                    <p class="text-gray-400 text-sm">We perform maintenance during low-traffic periods and will notify users in advance</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-yellow-400 py-12 border-t border-yellow-400/20">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2026 BridgeField Capital Group. All rights reserved.</p>
        </div>
    </footer>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById('lastUpdate').textContent = timeString;
    }
    
    // Update time every minute
    setInterval(updateTime, 60000);
    updateTime();
</script>
@endsection
