@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-2xl shadow-2xl border border-yellow-400/20 overflow-hidden">
            <div class="p-8 text-center border-b border-yellow-400/20">
                <div class="mb-6">
                    <img src="{{ asset('mylogo1.png') }}" alt="Bridgefield Capital Group" class="w-16 h-16 rounded-lg mx-auto">
                </div>
                <h2 class="text-2xl font-bold text-yellow-400 mb-2">Register for Bridgefield Capital Group</h2>
                <p class="text-gray-400">Join our investment platform</p>
            </div>

            <div class="p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-yellow-400 mb-2">Full Name</label>
                        <input id="name" type="text" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('name') border-red-400 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-yellow-400 mb-2">Email Address</label>
                        <input id="email" type="email" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('email') border-red-400 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-yellow-400 mb-2">Password</label>
                        <input id="password" type="password" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('password') border-red-400 @enderror" name="password" required autocomplete="new-password" placeholder="Create a password">
                        @error('password')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-400">At least 8 characters</p>
                    </div>

                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-yellow-400 mb-2">Confirm Password</label>
                        <input id="password-confirm" type="password" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-4 rounded-lg transition-colors min-h-[44px] flex items-center justify-center">
                            Register
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="text-gray-400">Already have an account? <a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-300 transition-colors">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection