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
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">Referral Program</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">Earn unlimited commissions by sharing investment opportunities</p>
        </div>
    </section>

    <!-- Program Details -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-4">Tier 1</h3>
                    <p class="text-3xl font-bold text-white mb-4">10%</p>
                    <p class="text-gray-300 mb-6">Commission on direct referrals</p>
                    <ul class="space-y-2 text-gray-300">
                        <li>✓ Immediate payouts</li>
                        <li>✓ Lifetime earnings</li>
                        <li>✓ No limits</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-yellow-400/20 to-amber-400/20 rounded-2xl p-8 border border-yellow-400/50">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-4">Tier 2</h3>
                    <p class="text-3xl font-bold text-white mb-4">15%</p>
                    <p class="text-gray-300 mb-6">For top referrers (100+ referrals)</p>
                    <ul class="space-y-2 text-gray-300">
                        <li>✓ Higher commissions</li>
                        <li>✓ Dedicated support</li>
                        <li>✓ Exclusive bonuses</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-4">Tier 3</h3>
                    <p class="text-3xl font-bold text-white mb-4">20%</p>
                    <p class="text-gray-300 mb-6">VIP partners (500+ referrals)</p>
                    <ul class="space-y-2 text-gray-300">
                        <li>✓ Premium payouts</li>
                        <li>✓ Personal account manager</li>
                        <li>✓ Custom campaigns</li>
                    </ul>
                </div>
            </div>

            <!-- How It Works -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-12 mb-16 border border-yellow-400/30">
                <h2 class="text-4xl font-bold text-white mb-12 text-center">How It Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 text-black font-bold text-xl">1</div>
                        <h4 class="text-white font-bold mb-2">Share Link</h4>
                        <p class="text-gray-300">Get your unique referral link</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 text-black font-bold text-xl">2</div>
                        <h4 class="text-white font-bold mb-2">They Sign Up</h4>
                        <p class="text-gray-300">Friends join via your link</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 text-black font-bold text-xl">3</div>
                        <h4 class="text-white font-bold mb-2">They Invest</h4>
                        <p class="text-gray-300">They make their first deposit</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4 text-black font-bold text-xl">4</div>
                        <h4 class="text-white font-bold mb-2">You Earn</h4>
                        <p class="text-gray-300">Instant commission added</p>
                    </div>
                </div>
            </div>

            <!-- Benefits -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Why Join Our Program?</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">✓</span>
                            <span><strong>Lifetime Earnings:</strong> Earn on every deposit your referrals make</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">✓</span>
                            <span><strong>No Caps:</strong> Unlimited commission potential</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">✓</span>
                            <span><strong>Instant Payouts:</strong> Weekly withdrawals to your wallet</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 mt-1">✓</span>
                            <span><strong>Marketing Support:</strong> Free materials & campaigns</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-yellow-400/10 to-amber-400/10 rounded-2xl p-8 border border-yellow-400/30">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Real Earnings Example</h3>
                    <div class="space-y-4 text-gray-300">
                        <div class="flex justify-between">
                            <span>10 referrals × $1,000 = $10,000 deposits</span>
                            <span class="text-yellow-400 font-bold">$1,000 (10%)</span>
                        </div>
                        <div class="flex justify-between">
                            <span>50 referrals × $5,000 = $250,000 deposits</span>
                            <span class="text-yellow-400 font-bold">$25,000 (10%)</span>
                        </div>
                        <div class="flex justify-between">
                            <span>100 referrals × $10,000 = $1M deposits</span>
                            <span class="text-yellow-400 font-bold">$150,000 (15%)</span>
                        </div>
                        <hr class="border-gray-700 my-4"/>
                        <div class="flex justify-between text-xl">
                            <span class="font-bold">Potential Monthly Income:</span>
                            <span class="text-yellow-400 font-bold">$10,000+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-yellow-400 to-amber-400">
        <div class="container mx-auto px-4 text-center text-black">
            <h2 class="text-4xl font-bold mb-4">Start Earning Today</h2>
            <p class="text-lg mb-8">Join thousands of successful referral partners</p>
            <a href="{{ auth()->check() ? '#referral-dashboard' : route('login') }}" class="inline-block bg-black text-yellow-400 px-10 py-4 rounded-lg font-bold hover:bg-gray-800 transition-all">Get Your Referral Link</a>
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
