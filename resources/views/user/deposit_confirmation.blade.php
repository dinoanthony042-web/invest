@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">
    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="bg-gray-900/80 border border-yellow-400/20 rounded-3xl p-8 shadow-2xl">
            <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6 mb-8">
                <div>
                    <h1 class="text-4xl font-bold text-yellow-400">Your deposit is awaiting confirmation</h1>
                    <p class="mt-3 text-gray-300 text-lg">We have received your request and your payment will be reviewed by our team.</p>
                </div>
                <div class="rounded-3xl bg-yellow-400/10 border border-yellow-400/20 px-5 py-4">
                    <p class="text-sm text-gray-300">Current status</p>
                    <p class="text-xl font-bold text-yellow-300 uppercase">Pending</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-4">
                    <div class="rounded-3xl bg-gray-800 border border-yellow-400/20 p-6">
                        <h2 class="font-semibold text-yellow-400 mb-4">Deposit Summary</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="bg-gray-900 rounded-3xl p-4">
                                <p class="text-sm text-gray-400">Amount</p>
                                <p class="text-2xl font-bold text-white">${{ number_format($deposit->amount, 2) }}</p>
                            </div>
                            <div class="bg-gray-900 rounded-3xl p-4">
                                <p class="text-sm text-gray-400">Network</p>
                                <p class="text-2xl font-bold text-white uppercase">{{ $deposit->network }}</p>
                            </div>
                            <div class="bg-gray-900 rounded-3xl p-4">
                                <p class="text-sm text-gray-400">Date</p>
                                <p class="text-2xl font-bold text-white">{{ $deposit->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl bg-gray-800 border border-yellow-400/20 p-6">
                        <h2 class="font-semibold text-yellow-400 mb-4">Next steps</h2>
                        <ol class="space-y-4 text-gray-300">
                            <li class="flex items-start gap-3">
                                <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-yellow-500 text-black font-bold">1</span>
                                <span>Your deposit request has been submitted successfully.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-yellow-500 text-black font-bold">2</span>
                                <span>Our team will verify the payment and mark it approved once confirmed.</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-full bg-yellow-500 text-black font-bold">3</span>
                                <span>Approved deposits are automatically credited to your wallet balance.</span>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="rounded-3xl bg-gray-800 border border-yellow-400/20 p-6">
                        <h2 class="font-semibold text-yellow-400 mb-4">Payment Details</h2>
                        <div class="space-y-3 text-gray-300">
                            <div>
                                <p class="text-sm text-gray-400">Wallet Address</p>
                                <p class="font-semibold text-white break-all">{{ $deposit->wallet_address }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Status</p>
                                <p class="font-semibold text-yellow-300 uppercase">{{ $deposit->status }}</p>
                            </div>
                        </div>
                    </div>
    <a href="{{ route('dashboard') }}"
   class="block rounded-3xl bg-gradient-to-r from-yellow-400 to-orange-500 px-6 py-4 text-center font-semibold text-gray-900 hover:from-yellow-500 hover:to-orange-600 transition shadow-lg">
   Back to Dashboard
</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
