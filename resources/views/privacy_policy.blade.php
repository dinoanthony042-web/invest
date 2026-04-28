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

    <!-- Content -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4 max-w-4xl">
            <h1 class="text-5xl font-bold text-white mb-12">Privacy Policy</h1>
            
            <div class="prose prose-invert max-w-none space-y-8 text-gray-300">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">1. Introduction</h2>
                    <p>BridgeField Capital Group ("we" or "us" or "our") operates the platform. This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our service and the choices you have associated with that data.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">2. Information Collection and Use</h2>
                    <p>We collect several different types of information for various purposes to provide and improve our service to you.</p>
                    <h3 class="text-xl font-bold text-yellow-300 mt-4 mb-2">Types of Data Collected:</h3>
                    <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Personal Data:</strong> Name, email address, phone number, mailing address, and investment preferences</li>
                        <li><strong>Payment Data:</strong> Wallet addresses, transaction history, and crypto holdings</li>
                        <li><strong>Technical Data:</strong> IP address, browser type, and usage patterns</li>
                        <li><strong>Identification Data:</strong> Government-issued ID for KYC compliance</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">3. Use of Data</h2>
                    <p>BridgeField Capital Group uses the collected data for various purposes:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-4">
                        <li>To provide and maintain our service</li>
                        <li>To notify you about changes to our service</li>
                        <li>To allow you to participate in interactive features</li>
                        <li>To provide customer support</li>
                        <li>To gather analysis or valuable information so that we can improve our service</li>
                        <li>To monitor the usage of our service</li>
                        <li>To detect, prevent and address technical issues</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">4. Security of Data</h2>
                    <p>The security of your data is important to us but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">5. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul class="list-disc pl-6 space-y-2 mt-4">
                        <li>Access the personal data we hold about you</li>
                        <li>Request correction of inaccurate data</li>
                        <li>Request deletion of your data</li>
                        <li>Opt-out of marketing communications</li>
                        <li>Export your data in machine-readable format</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">6. Compliance with Laws</h2>
                    <p>We comply with all applicable data protection regulations including GDPR, CCPA, and other international privacy laws. We maintain robust KYC/AML procedures to ensure regulatory compliance and prevent illicit activities.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">7. Third-Party Links</h2>
                    <p>Our platform may contain links to third-party sites. We are not responsible for the privacy practices of these external websites. We encourage you to review their privacy policies before providing any personal information.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">8. Changes to This Privacy Policy</h2>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">9. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us at support@vaultx.com</p>
                </div>
            </div>

            <div class="mt-12 text-center">
                <p class="text-gray-400 text-sm">Last Updated: April 2026</p>
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
