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
            <h1 class="text-5xl font-bold text-white mb-12">Terms of Service</h1>
            
            <div class="prose prose-invert max-w-none space-y-8 text-gray-300">
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">1. Agreement to Terms</h2>
                    <p>By accessing and using BridgeField Capital Group's platform, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">2. Use License</h2>
                    <p>Permission is granted to temporarily download one copy of the materials (information or software) on BridgeField Capital Group's platform for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                    <ul class="list-disc pl-6 mt-4 space-y-2">
                        <li>Modifying or copying the materials</li>
                        <li>Using the materials for any commercial purpose or for any public display</li>
                        <li>Attempting to decompile or reverse engineer the software</li>
                        <li>Removing any copyright or other proprietary notations from the materials</li>
                        <li>Transferring the materials to another person or "mirroring" the materials on any other server</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">3. Disclaimer</h2>
                    <p>The materials on BridgeField Capital Group's platform are provided on an 'as is' basis. BridgeField Capital Group makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">4. Limitations</h2>
                    <p>In no event shall BridgeField Capital Group or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on BridgeField Capital Group's platform.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">5. Accuracy of Materials</h2>
                    <p>The materials appearing on BridgeField Capital Group's platform could include technical, typographical, or photographic errors. BridgeField Capital Group does not warrant that any of the materials on our platform are accurate, complete, or current. BridgeField Capital Group may make changes to the materials contained on its platform at any time without notice.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">6. Links</h2>
                    <p>BridgeField Capital Group has not reviewed all of the sites linked to its platform and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by BridgeField Capital Group of the site. Use of any such linked website is at the user's own risk.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">7. Modifications</h2>
                    <p>BridgeField Capital Group may revise these terms of service for our platform at any time without notice. By using this platform, you are agreeing to be bound by the then current version of these terms of service.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">8. Governing Law</h2>
                    <p>These terms and conditions are governed by and construed in accordance with international law, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">9. Investment Risks</h2>
                    <p>Cryptocurrency and blockchain-based investments carry significant risk. Past performance does not guarantee future results. You acknowledge that you understand the risks involved and accept full responsibility for your investment decisions.</p>
                </div>

                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 border border-yellow-400/20">
                    <h2 class="text-2xl font-bold text-yellow-400 mb-4">10. Contact Information</h2>
                    <p>If you have any questions about these Terms of Service, please contact us at support@vaultx.com</p>
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
