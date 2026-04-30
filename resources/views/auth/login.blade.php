@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-2xl shadow-2xl border border-yellow-400/20 overflow-hidden">
            <div class="p-8 text-center border-b border-yellow-400/20">
                <div class="mb-6">
                    <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" class="w-16 h-16 rounded-lg mx-auto">
                </div>
                <h2 class="text-2xl font-bold text-yellow-400 mb-2">Login to Bridgefield Capital Group</h2>
                <p class="text-gray-400">Access your investment dashboard</p>
            </div>

            <div class="p-8">
                @if (session('verified'))
                    <div class="bg-green-600 text-white px-4 py-3 rounded mb-4 text-center">
                        Your email has been verified successfully! Please log in to continue.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-yellow-400 mb-2">Email Address</label>
                        <input id="email" type="email" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('email') border-red-400 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-yellow-400 mb-2">Password</label>
                        <input id="password" type="password" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('password') border-red-400 @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        @error('password')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-4 rounded-lg transition-colors min-h-[44px] flex items-center justify-center">
                            Login
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="text-gray-400">Don't have an account? <a href="{{ route('register') }}" class="text-yellow-400 hover:text-yellow-300 transition-colors">Register here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection