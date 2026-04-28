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
            <h1 class="text-5xl font-bold text-white mb-12">Compliance & Certifications</h1>
            
            <!-- Certifications Section -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-yellow-400 mb-8">Our Regulatory Certifications</h2>
                <p class="text-gray-300 mb-12 text-lg">BridgeField Capital Group is certified and regulated by leading financial and cryptocurrency regulatory bodies worldwide. We maintain the highest standards of compliance and security.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- FinCEN -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20 hover:border-yellow-400/50 transition-all transform hover:scale-105">
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">FinCEN Registered</h3>
                                <p class="text-gray-400 text-sm">US Financial Crimes Enforcement Network</p>
                            </div>
                        </div>
                        <p class="text-gray-300">Registered as a Money Services Business with full compliance to AML/KYC regulations</p>
                    </div>

                    <!-- FCA -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20 hover:border-yellow-400/50 transition-all transform hover:scale-105">
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-red-400 to-red-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">FCA Authorized</h3>
                                <p class="text-gray-400 text-sm">UK Financial Conduct Authority</p>
                            </div>
                        </div>
                        <p class="text-gray-300">Authorized digital asset exchange with comprehensive consumer protection</p>
                    </div>

                    <!-- FATF -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20 hover:border-yellow-400/50 transition-all transform hover:scale-105">
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">FATF Compliant</h3>
                                <p class="text-gray-400 text-sm">Financial Action Task Force</p>
                            </div>
                        </div>
                        <p class="text-gray-300">Full compliance with FATF 40 Recommendations on combating money laundering</p>
                    </div>

                    <!-- BitLicense -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20 hover:border-yellow-400/50 transition-all transform hover:scale-105">
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">NY BitLicense</h3>
                                <p class="text-gray-400 text-sm">New York State Department of Financial Services</p>
                            </div>
                        </div>
                        <p class="text-gray-300">Licensed cryptocurrency exchange operator in New York State</p>
                    </div>

                    <!-- ISO 27001 -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20 hover:border-yellow-400/50 transition-all transform hover:scale-105">
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-amber-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">ISO 27001 Certified</h3>
                                <p class="text-gray-400 text-sm">International Information Security Standard</p>
                            </div>
                        </div>
                        <p class="text-gray-300">Enterprise-grade information security management system</p>
                    </div>

                    <!-- SOC 2 -->
                    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20 hover:border-yellow-400/50 transition-all transform hover:scale-105">
                        <div class="flex items-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-white">SOC 2 Type II</h3>
                                <p class="text-gray-400 text-sm">Service Organization Control</p>
                            </div>
                        </div>
                        <p class="text-gray-300">Independently audited security, availability, and confidentiality controls</p>
                    </div>
                </div>
            </div>

            <!-- Compliance Standards -->
            <div class="bg-gradient-to-br from-yellow-400/20 to-amber-400/20 rounded-3xl p-12 border border-yellow-400/30 mb-16">
                <h2 class="text-3xl font-bold text-yellow-400 mb-8">Compliance Standards</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <span class="text-yellow-400 text-2xl mr-4">✓</span>
                        <div>
                            <h4 class="text-white font-bold mb-2">AML/KYC Compliance</h4>
                            <p class="text-gray-300">Strict anti-money laundering and know-your-customer procedures</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="text-yellow-400 text-2xl mr-4">✓</span>
                        <div>
                            <h4 class="text-white font-bold mb-2">GDPR Compliant</h4>
                            <p class="text-gray-300">Full compliance with EU General Data Protection Regulation</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="text-yellow-400 text-2xl mr-4">✓</span>
                        <div>
                            <h4 class="text-white font-bold mb-2">CCPA Compliant</h4>
                            <p class="text-gray-300">California Consumer Privacy Act requirements met</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <span class="text-yellow-400 text-2xl mr-4">✓</span>
                        <div>
                            <h4 class="text-white font-bold mb-2">CTF/AML Act</h4>
                            <p class="text-gray-300">Australian Counter-Terrorism Financing Act compliance</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Audit & Testing -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                <h2 class="text-2xl font-bold text-yellow-400 mb-6">Regular Audits & Testing</h2>
                <ul class="space-y-4 text-gray-300">
                    <li class="flex items-start">
                        <span class="text-yellow-400 mr-3 mt-1">•</span>
                        <span><strong>Annual Security Audits:</strong> Third-party penetration testing and security assessments</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 mr-3 mt-1">•</span>
                        <span><strong>Quarterly Compliance Reviews:</strong> Regular compliance checks against regulatory requirements</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 mr-3 mt-1">•</span>
                        <span><strong>Continuous Monitoring:</strong> Real-time transaction monitoring for suspicious activity</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-yellow-400 mr-3 mt-1">•</span>
                        <span><strong>Risk Management:</strong> Comprehensive risk assessment and mitigation strategies</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-yellow-400 py-12 border-t border-yellow-400/20">
        <div class="container mx-auto px-4 text-center text-gray-400">
            <p>&copy; 2026 BridgeField Capital Group. All rights reserved. | Certified Compliant Platform</p>
        </div>
    </footer>
</div>
@endsection
