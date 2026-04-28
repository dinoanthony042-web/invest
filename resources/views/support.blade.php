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
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">Support Center</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">We're here to help you succeed</p>
        </div>
    </section>

    <!-- Support Options -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-20">
                <!-- Help Center -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Help Center</h3>
                    <p class="text-gray-300 mb-8">Browse our comprehensive knowledge base with guides and FAQs.</p>
                    <div class="space-y-3 mb-8">
                        <a href="#" class="text-yellow-400 hover:text-yellow-300 flex items-center">
                            <span class="mr-2">→</span> Getting Started Guide
                        </a>
                        <a href="#" class="text-yellow-400 hover:text-yellow-300 flex items-center">
                            <span class="mr-2">→</span> Investment Plans Explained
                        </a>
                        <a href="#" class="text-yellow-400 hover:text-yellow-300 flex items-center">
                            <span class="mr-2">→</span> How to Withdraw Funds
                        </a>
                        <a href="#" class="text-yellow-400 hover:text-yellow-300 flex items-center">
                            <span class="mr-2">→</span> Frequently Asked Questions
                        </a>
                    </div>
                    <a href="/help-center" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Visit Help Center</a>
                </div>

                <!-- Contact Us -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Contact Us</h3>
                    <p class="text-gray-300 mb-8">Reach out to our support team for personalized assistance.</p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">✉</span>
                            <div>
                                <p class="text-gray-300">Email Support</p>
                                <a href="mailto:support@vaultx.com" class="text-yellow-400 hover:text-yellow-300 font-semibold">support@vaultx.com</a>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">⏰</span>
                            <div>
                                <p class="text-gray-300">Response Time</p>
                                <p class="text-yellow-400 font-semibold">2-4 hours (24/7 support)</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">📱</span>
                            <div>
                                <p class="text-gray-300">Live Chat</p>
                                <p class="text-yellow-400 font-semibold">Available 24/7</p>
                            </div>
                        </div>
                    </div>
                    <a href="/contact-us" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Send Message</a>
                </div>

                <!-- Security -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Security</h3>
                    <p class="text-gray-300 mb-8">Learn about our security measures and best practices.</p>
                    <ul class="space-y-3 text-gray-300 mb-8">
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Cold storage wallets</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Multi-signature verification</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> 2FA protection</li>
                        <li class="flex items-center"><span class="text-yellow-400 mr-3">✓</span> Insurance coverage</li>
                    </ul>
                    <a href="/security" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">Read Security Policy</a>
                </div>

                <!-- Status Page -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">System Status</h3>
                    <p class="text-gray-300 mb-8">Check real-time status of our platform and services.</p>
                    <div class="bg-green-900/30 border border-green-400/50 rounded-lg p-4 mb-8">
                        <p class="text-green-400 font-semibold">● All Systems Operational</p>
                        <p class="text-gray-300 text-sm mt-2">Last updated: 2 minutes ago</p>
                    </div>
                    <a href="/status" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-300 transition-all">View Status Page</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-gradient-to-r from-yellow-400 to-amber-400">
        <div class="container mx-auto px-4 text-center text-black">
            <h2 class="text-4xl font-bold mb-4">Still need help?</h2>
            <p class="text-lg mb-8">Our dedicated support team is ready to assist you</p>
            <a href="/contact-us" class="inline-block bg-black text-yellow-400 px-10 py-4 rounded-lg font-bold hover:bg-gray-800 transition-all">Contact Support Team</a>
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
