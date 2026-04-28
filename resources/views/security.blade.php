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
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-white">Security</h1>
            <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto">Your safety is our priority</p>
        </div>
    </section>

    <!-- Content -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                <!-- Infrastructure Security -->
                <div>
                    <h2 class="text-3xl font-bold text-yellow-400 mb-8">Infrastructure Security</h2>
                    <div class="space-y-6">
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Cold Storage Wallets</h4>
                            <p class="text-gray-300">95% of customer funds stored in offline cold storage, protected from online threats</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Multi-Signature Technology</h4>
                            <p class="text-gray-300">Funds require multiple approvals to move, preventing unauthorized transfers</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Hardware Security Modules</h4>
                            <p class="text-gray-300">Military-grade HSM devices protect cryptographic keys</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">24/7 Monitoring</h4>
                            <p class="text-gray-300">Continuous monitoring and alerts for suspicious activity</p>
                        </div>
                    </div>
                </div>

                <!-- Account Security -->
                <div>
                    <h2 class="text-3xl font-bold text-yellow-400 mb-8">Account Protection</h2>
                    <div class="space-y-6">
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Two-Factor Authentication (2FA)</h4>
                            <p class="text-gray-300">SMS, email, or authenticator app-based verification required for logins</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Biometric Security</h4>
                            <p class="text-gray-300">Face ID and fingerprint authentication on mobile devices</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Encryption</h4>
                            <p class="text-gray-300">End-to-end encryption for all sensitive data and communications</p>
                        </div>
                        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-6 border border-yellow-400/20">
                            <h4 class="text-xl font-bold text-white mb-2">Session Management</h4>
                            <p class="text-gray-300">Automatic logout and session timeouts for inactivity protection</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Compliance & Insurance -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-gradient-to-br from-yellow-400/20 to-amber-400/20 rounded-2xl p-8 border border-yellow-400/30">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Insurance Coverage</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">•</span>
                            <span><strong>Cyber Insurance:</strong> Up to $100M coverage against breaches</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">•</span>
                            <span><strong>Crime Insurance:</strong> Protection against theft and fraud</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">•</span>
                            <span><strong>Fund Protection:</strong> Customer asset insurance program</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">•</span>
                            <span><strong>Professional Indemnity:</strong> Protection against errors</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-6">Best Practices for Users</h3>
                    <ul class="space-y-4 text-gray-300">
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">✓</span>
                            <span>Use strong, unique passwords</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">✓</span>
                            <span>Enable 2FA on your account</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">✓</span>
                            <span>Never share your seed phrase</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-400 mr-3 text-xl">✓</span>
                            <span>Update software regularly</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Certifications -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-3xl p-12 border border-yellow-400/30 text-center">
                <h3 class="text-3xl font-bold text-yellow-400 mb-8">Security Certifications</h3>
                <div class="flex flex-wrap justify-center gap-6">
                    <div class="bg-gray-700 rounded-lg p-4 w-32">
                        <p class="text-yellow-400 font-bold">ISO 27001</p>
                        <p class="text-gray-300 text-sm">Information Security</p>
                    </div>
                    <div class="bg-gray-700 rounded-lg p-4 w-32">
                        <p class="text-yellow-400 font-bold">SOC 2 Type II</p>
                        <p class="text-gray-300 text-sm">Service Organization</p>
                    </div>
                    <div class="bg-gray-700 rounded-lg p-4 w-32">
                        <p class="text-yellow-400 font-bold">PCI-DSS</p>
                        <p class="text-gray-300 text-sm">Payment Standards</p>
                    </div>
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
