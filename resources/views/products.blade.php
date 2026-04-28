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
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">Our Products</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto mb-8">Comprehensive suite of crypto investment solutions tailored to your needs</p>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                <!-- Investment Plans -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30 hover:border-yellow-400/60 transition-all duration-300 transform hover:scale-105">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.2 3.2.8-1.3-5.5-3.4z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Investment Plans</h3>
                    <p class="text-gray-300 mb-6">Choose from multiple investment tiers with fixed-term plans, guaranteed ROI, and flexible maturity periods.</p>
                    <ul class="space-y-3 text-gray-200 mb-8">
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Beginner: 5% - 10% ROI</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Advanced: 12% - 18% ROI</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Premium: 20% - 30% ROI</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Elite: 35% - 50% ROI</li>
                    </ul>
                    <a href="{{ route('plans.guest') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Explore Plans</a>
                </div>

                <!-- Portfolio Dashboard -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30 hover:border-yellow-400/60 transition-all duration-300 transform hover:scale-105">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 13h2v8H3zm4-8h2v16H7zm4-2h2v18h-2zm4 4h2v14h-2zm4-2h2v16h-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Portfolio Dashboard</h3>
                    <p class="text-gray-300 mb-6">Real-time tracking of your investments with detailed analytics and performance metrics.</p>
                    <ul class="space-y-3 text-gray-200 mb-8">
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Live balance tracking</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Profit & loss analytics</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Transaction history</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Performance charts</li>
                    </ul>
                    <a href="{{ auth()->check() ? route('investment.plans') : route('login') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Access Dashboard</a>
                </div>

                <!-- Referral Program -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30 hover:border-yellow-400/60 transition-all duration-300 transform hover:scale-105">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Referral Program</h3>
                    <p class="text-gray-300 mb-6">Earn generous commissions by referring friends and family to our platform.</p>
                    <ul class="space-y-3 text-gray-200 mb-8">
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> 10% commission on deposits</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Unlimited earning potential</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Instant withdrawal payouts</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Unique referral tracking</li>
                    </ul>
                    <a href="{{ auth()->check() ? '#' : route('login') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Join Program</a>
                </div>

                <!-- Security Features -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30 hover:border-yellow-400/60 transition-all duration-300 transform hover:scale-105">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Advanced Security</h3>
                    <p class="text-gray-300 mb-6">Military-grade encryption protecting your assets with industry-leading security protocols.</p>
                    <ul class="space-y-3 text-gray-200 mb-8">
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Cold storage wallets</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Multi-signature verification</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> 2FA & biometric login</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> 24/7 monitoring</li>
                    </ul>
                    <a href="/security" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Learn More</a>
                </div>
            </div>

            <!-- Features Summary -->
            <div class="bg-gradient-to-r from-yellow-400 to-amber-400 rounded-3xl p-12 text-center text-black">
                <h2 class="text-4xl font-bold mb-4">Ready to Start Investing?</h2>
                <p class="text-lg mb-8 max-w-2xl mx-auto">Join thousands of investors earning consistent returns through our secure platform</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('plans.guest') }}" class="inline-block bg-black text-yellow-400 px-10 py-4 rounded-lg font-bold hover:bg-gray-800 transition-all">View All Plans</a>
                    <a href="/contact-us" class="inline-block border-2 border-black bg-transparent text-black px-10 py-4 rounded-lg font-bold hover:bg-black hover:text-yellow-400 transition-all">Contact Sales</a>
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
@endsection
