<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('mylogo1.png') }}">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-white">

<header class="w-full text-sm mb-6">
    <nav class="flex justify-between items-center p-6 bg-black/95 backdrop-blur-sm border-b border-yellow-400/20 shadow-lg">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" class="w-12 h-12 rounded">
            <span class="text-2xl font-extrabold text-yellow-400">Bridgefield Capital Group</span>
        </div>
        <div class="hidden md:flex space-x-8">
            <a href="/features" class="text-yellow-400 hover:text-yellow-300 transition-colors duration-300 font-medium">Features</a>
            <a href="/plans" class="text-yellow-400 hover:text-yellow-300 transition-colors duration-300 font-medium">Plans</a>
            <a href="/about" class="text-yellow-400 hover:text-yellow-300 transition-colors duration-300 font-medium">About</a>
        </div>
        <a href="/login"
   class="inline-block bg-yellow-400 text-black px-6 py-3 rounded-lg font-semibold 
          hover:bg-yellow-300 hover:scale-105 transition-all duration-300 
          shadow-md hover:shadow-lg">
    Login / Sign Up
</a>
    </nav>
</header>

<main>

<section class="bg-gradient-to-b from-slate-950 via-slate-900 to-black py-28">
    <div class="max-w-5xl mx-auto px-6 text-center">
        
        <h1 class="text-5xl md:text-6xl font-bold tracking-tight text-white leading-tight mb-6">Professional digital asset investing built for trusted outcomes.</h1>
        <p class="mx-auto max-w-3xl text-lg text-gray-400 leading-relaxed">BridgeField Capital Group brings structure, discipline, and transparency to digital investing. We design every service around security, governance, and measurable performance so investors can move with confidence.</p>
    </div>
</section>

<section class="py-24 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-6 grid gap-16 lg:grid-cols-2">
        <div class="space-y-6">
            <h2 class="text-3xl font-semibold text-white">Our Purpose</h2>
            <p class="text-gray-300 leading-relaxed text-lg">BridgeField Capital Group exists to close the gap between emerging digital markets and proven investment standards. We help investors access crypto opportunities without sacrificing the controls, transparency, and risk management that matter most.</p>
            <p class="text-gray-300 leading-relaxed text-lg">Our platform is built for those who expect more than volatility: they expect a dependable process, clear accountability, and a framework that supports long-term capital growth.</p>
        </div>

        <div class="space-y-6">
            <div class="rounded-3xl border border-gray-700 bg-slate-950/70 p-8 shadow-xl">
                <h3 class="text-xl font-semibold text-white mb-4">Secure infrastructure</h3>
                <p class="text-gray-300 leading-relaxed">We combine best-in-class custody, encryption, and monitoring systems to protect user assets and reduce operational risk.</p>
            </div>
            <div class="rounded-3xl border border-gray-700 bg-slate-950/70 p-8 shadow-xl">
                <h3 class="text-xl font-semibold text-white mb-4">Clear governance</h3>
                <p class="text-gray-300 leading-relaxed">Structured policies and transparent reporting ensure investors understand how funds are managed and how decisions are made.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid gap-8 lg:grid-cols-3 text-gray-300">
            <div class="rounded-3xl border border-gray-700 bg-slate-950/70 p-8 shadow-xl">
                <h3 class="text-xl font-semibold text-white mb-3">Capital protection</h3>
                <p class="leading-relaxed">Every strategy is evaluated against risk thresholds designed to preserve capital during market stress.</p>
            </div>
            <div class="rounded-3xl border border-gray-700 bg-slate-950/70 p-8 shadow-xl">
                <h3 class="text-xl font-semibold text-white mb-3">Measured performance</h3>
                <p class="leading-relaxed">We balance growth potential with downside management, emphasizing consistency over speculative returns.</p>
            </div>
            <div class="rounded-3xl border border-gray-700 bg-slate-950/70 p-8 shadow-xl">
                <h3 class="text-xl font-semibold text-white mb-3">Transparent communication</h3>
                <p class="leading-relaxed">Investors receive clear updates, defined fees, and straightforward insights into portfolio decisions.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 border-t border-gray-800">
    <div class="max-w-4xl mx-auto px-6 text-gray-500 text-sm leading-relaxed">
        <p><strong>Risk Disclosure:</strong> Investing in digital assets involves risk, including possible loss of capital. BridgeField Capital Group does not guarantee returns. Past performance is not a reliable indicator of future results. Investors should evaluate their objectives and consult qualified advisors before investing.</p>
    </div>
</section>

</main>

<footer class="bg-black text-yellow-400 py-16">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <div class="flex items-center space-x-2">
                            <img src="{{ asset('mylogo1.png') }}" alt="BridgeField Capital Group" class="w-12 h-12 rounded">
                            <div class="text-xl font-bold text-yellow-400">BridgeField Capital Group</div>
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed">The premier crypto investment platform offering secure, transparent, and profitable investment opportunities for everyone.</p>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4 text-yellow-400">Products</h4>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="/" class="hover:text-yellow-300 transition-colors">Home</a></li>
                            <li><a href="/features" class="hover:text-yellow-300 transition-colors">Features</a></li>
                            <li><a href="/plans" class="hover:text-yellow-300 transition-colors">Plans</a></li>
                            <li><a href="/about" class="hover:text-yellow-300 transition-colors">About</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4 text-yellow-400">Support</h4>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Help Center</a></li>
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Contact Us</a></li>
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Security</a></li>
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Status</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold mb-4 text-yellow-400">Legal</h4>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Terms of Service</a></li>
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Compliance</a></li>
                            <li><a href="#" class="hover:text-yellow-300 transition-colors">Risk Disclosure</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-8 text-center">
                    <p class="text-gray-400 text-sm">&copy; 2026 BridgeField Capital Group. All rights reserved. | Regulated and compliant with international standards.</p>
        </div>
    </div>
</footer>

</body>
</html>
