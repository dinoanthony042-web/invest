@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-2xl shadow-2xl border border-yellow-400/20 overflow-hidden">
            <div class="p-8 text-center border-b border-yellow-400/20">
                <div class="mb-6">
                    <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" class="w-16 h-16 rounded-lg mx-auto">
                </div>
                <h2 class="text-2xl font-bold text-yellow-400 mb-2">Email Verification</h2>
                <p class="text-gray-400">Verify your account to continue</p>
            </div>

            <div class="p-8">
                <div class="mb-6 text-center">
                    <svg class="mx-auto h-12 w-12 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-white">Verify Your Email Address</h3>
                    <p class="mt-2 text-sm text-gray-400">
                        Before proceeding, please check your email for a verification link.
                    </p>
                    <p class="mt-2 text-sm text-gray-400">
                        If you did not receive the email, we will gladly send you another.
                    </p>
                </div>

                @if (session('resent'))
                    <div class="mb-4 p-4 bg-green-500/10 border border-green-500/20 rounded-lg">
                        <p class="text-sm text-green-400">A fresh verification link has been sent to your email address.</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}" class="mb-6">
                    @csrf

                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-4 rounded-lg transition-colors min-h-[44px] flex items-center justify-center">
                        Resend Verification Email
                    </button>
                </form>

                <div class="text-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-white transition-colors text-sm">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection