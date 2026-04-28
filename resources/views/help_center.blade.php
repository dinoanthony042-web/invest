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
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">Help Center</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">Find answers to your questions</p>
        </div>
    </section>

    <!-- Search & FAQs -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <!-- Search Bar -->
            <div class="mb-16 max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" placeholder="Search help articles..." class="w-full bg-gray-700 text-white rounded-lg px-6 py-4 border border-gray-600 focus:border-yellow-400 focus:outline-none">
                    <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-yellow-400 text-black px-6 py-2 rounded-lg font-bold hover:bg-yellow-300 transition-all">Search</button>
                </div>
            </div>

            <!-- FAQs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Getting Started -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Getting Started</h3>
                    <div class="space-y-4">
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> How to create an account
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> KYC verification process
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Making your first deposit
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Two-factor authentication setup
                        </a>
                    </div>
                </div>

                <!-- Investments -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Investments</h3>
                    <div class="space-y-4">
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Choosing the right plan
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> How ROI is calculated
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Maturity periods explained
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Reinvestment options
                        </a>
                    </div>
                </div>

                <!-- Withdrawals -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Withdrawals</h3>
                    <div class="space-y-4">
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Withdrawal process guide
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Processing times
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Network fees explained
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Withdrawal limits
                        </a>
                    </div>
                </div>

                <!-- Security -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Security & Support</h3>
                    <div class="space-y-4">
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Protecting your account
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> If your account is compromised
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Privacy and data protection
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Contact support team
                        </a>
                    </div>
                </div>

                <!-- Referral Program -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Referral Program</h3>
                    <div class="space-y-4">
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> How to earn referral bonuses
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Referral commission rates
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Getting your referral link
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Tracking referrals
                        </a>
                    </div>
                </div>

                <!-- Technical Issues -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Technical Issues</h3>
                    <div class="space-y-4">
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> App doesn't load
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Payment not going through
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> Browsers compatibility
                        </a>
                        <a href="#" class="text-white hover:text-yellow-400 transition-colors flex items-center">
                            <span class="text-yellow-400 mr-2">→</span> System status page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Support CTA -->
    <section class="py-16 bg-gradient-to-r from-yellow-400 to-amber-400">
        <div class="container mx-auto px-4 text-center text-black">
            <h2 class="text-4xl font-bold mb-4">Can't find what you're looking for?</h2>
            <p class="text-lg mb-8">Our support team is available 24/7</p>
            <a href="/contact-us" class="inline-block bg-black text-yellow-400 px-10 py-4 rounded-lg font-bold hover:bg-gray-800 transition-all">Contact Support</a>
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
