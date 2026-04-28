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
            <h1 class="text-5xl font-bold text-white mb-12">Risk Disclosure</h1>
            
            <div class="prose prose-invert max-w-none space-y-8 text-gray-300">
                <div class="bg-gradient-to-br from-red-900/30 to-red-900/10 rounded-2xl p-8 border border-red-500/30 mb-8">
                    <h2 class="text-2xl font-bold text-red-400 mb-4">⚠️ Important Risk Disclosure</h2>
                    <p class="font-semibold text-red-300">Before investing, please carefully read and understand all risks associated with cryptocurrency and blockchain investments. Cryptocurrency investments are highly volatile and speculative.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">1. Market Volatility Risk</h2>
                    <p>Cryptocurrency markets are highly volatile. Bitcoin, Ethereum, and other digital assets can experience dramatic price fluctuations within short periods. You may lose a substantial portion or all of your investment due to sudden market downturns.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">2. Liquidity Risk</h2>
                    <p>During periods of high market stress or volatility, you may not be able to withdraw your funds quickly or at reasonable prices. Market illiquidity could result in losses or delays in accessing your investment.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">3. Regulatory Risk</h2>
                    <p>Cryptocurrency regulations are evolving and vary by jurisdiction. Changes in regulatory policies or enforcement actions could adversely affect the value or utility of cryptocurrencies and impact our operations.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">4. Technology Risk</h2>
                    <p>Blockchain technology is still evolving. Technical vulnerabilities, smart contract bugs, or protocol failures could result in loss of funds. Users should understand that blockchain transactions are generally irreversible.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">5. Cyber Security Risk</h2>
                    <p>Despite our security measures, no platform is 100% secure. Hacking, phishing attacks, or social engineering could result in unauthorized access and loss of funds. Users are responsible for maintaining the security of their credentials.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">6. Operational Risk</h2>
                    <p>Operational errors, system failures, or service interruptions could prevent you from accessing or executing transactions. While we maintain backup systems, complete protection cannot be guaranteed.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">7. Counterparty Risk</h2>
                    <p>Your returns depend on the performance and solvency of BridgeField Capital Group. While we maintain insurance and reserves, counterparty failure could result in total loss of your investment.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">8. No Guaranteed Returns</h2>
                    <p>Past performance does not guarantee future results. The returns we advertise are projections based on historical data. Actual returns may be lower or negative. Market conditions can change rapidly.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">9. Tax Implications</h2>
                    <p>Cryptocurrency transactions have tax implications. You are responsible for understanding and reporting any tax liabilities in your jurisdiction. Consult with a tax professional regarding your specific situation.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">10. Leverage Risk</h2>
                    <p>Some of our investment strategies utilize leveraged positions. Leverage amplifies both gains and losses. Using leverage can result in losses exceeding your initial investment.</p>
                </div>

                <div class="bg-gradient-to-br from-yellow-400/20 to-amber-400/20 rounded-2xl p-8 border border-yellow-400/30">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">Investment Considerations</h2>
                    <ul class="space-y-3 text-gray-300">
                        <li><strong>Invest Only What You Can Afford to Lose:</strong> Only invest money you can afford to lose completely without affecting your financial security.</li>
                        <li><strong>Diversification:</strong> Cryptocurrency should be only a portion of your diversified investment portfolio.</li>
                        <li><strong>Long-term Perspective:</strong> Cryptocurrency is best suited for investors with a long-term investment horizon.</li>
                        <li><strong>Due Diligence:</strong> Conduct thorough research and understand the risks before investing.</li>
                        <li><strong>Professional Advice:</strong> Consider consulting with financial advisors before making significant investment decisions.</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">Disclaimer</h2>
                    <p>This risk disclosure is not exhaustive. By using our platform and investing, you acknowledge that you have read, understood, and accept these risks. You confirm that you are making an informed decision and accept full responsibility for any losses.</p>
                    <p class="mt-4">BridgeField Capital Group and its affiliates are not liable for any losses, damages, or liabilities arising from your use of our platform or any investments made.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">Contact & Support</h2>
                    <p>If you have questions about these risks or need clarification, please contact our support team at support@vaultx.com</p>
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
