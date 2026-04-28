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
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">Contact Us</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">Get in touch with our team</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-4xl font-bold text-white mb-12">Reach Out Today</h2>
                    
                    <div class="mb-12 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                        <div class="flex items-start mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">Email</h3>
                                <p class="text-gray-300">support@vaultx.com</p>
                                <p class="text-gray-400 text-sm mt-1">Response within 2-4 hours</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-12 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                        <div class="flex items-start mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">Live Chat</h3>
                                <p class="text-gray-300">Available 24/7</p>
                                <p class="text-gray-400 text-sm mt-1">Instant support for urgent matters</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-12 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                        <div class="flex items-start mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-300 to-amber-400 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-6 h-6 text-black" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">Help Center</h3>
                                <p class="text-gray-300">Browse FAQs & guides</p>
                                <p class="text-gray-400 text-sm mt-1">Find answers instantly</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-400/20 to-amber-400/20 rounded-2xl p-8 border border-yellow-400/30">
                        <h3 class="text-xl font-bold text-yellow-400 mb-4">Business Hours</h3>
                        <p class="text-gray-300">Monday - Friday: 9:00 AM - 8:00 PM UTC</p>
                        <p class="text-gray-300">Saturday - Sunday: 10:00 AM - 6:00 PM UTC</p>
                        <p class="text-yellow-400 font-semibold mt-4">24/7 Emergency Support Available</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-10 border border-yellow-400/30">
                    <h2 class="text-3xl font-bold text-white mb-8">Send us a Message</h2>
                    
                    <form class="space-y-6" action="#" method="POST">
                        @csrf
                        <div>
                            <label class="block text-gray-300 font-medium mb-2">Full Name</label>
                            <input type="text" name="name" required class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors" placeholder="Your name">
                        </div>

                        <div>
                            <label class="block text-gray-300 font-medium mb-2">Email Address</label>
                            <input type="email" name="email" required class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors" placeholder="your@email.com">
                        </div>

                        <div>
                            <label class="block text-gray-300 font-medium mb-2">Subject</label>
                            <select name="subject" class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors">
                                <option value="">Select subject</option>
                                <option value="account">Account Support</option>
                                <option value="investment">Investment Inquiry</option>
                                <option value="withdrawal">Withdrawal Issue</option>
                                <option value="security">Security Concern</option>
                                <option value="referral">Referral Program</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-300 font-medium mb-2">Message</label>
                            <textarea name="message" required rows="5" class="w-full bg-gray-700 text-white rounded-lg px-4 py-3 border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors" placeholder="Tell us how we can help..."></textarea>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" name="terms" required class="mt-1 mr-3">
                            <label class="text-gray-300 text-sm">I agree to the Terms of Service and Privacy Policy</label>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-amber-400 text-black font-bold py-3 rounded-lg hover:from-yellow-300 hover:to-amber-300 transition-all transform hover:scale-105">Send Message</button>
                    </form>

                    <p class="text-center text-gray-400 text-sm mt-6">We typically respond within 2-4 business hours</p>
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
