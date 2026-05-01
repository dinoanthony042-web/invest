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

                    <div class="grid gap-6 lg:grid-cols-2">
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-yellow-400 mb-2">Phone Number</label>
                            <input id="phone_number" type="text" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('phone_number') border-red-400 @enderror" name="phone_number" value="{{ old('phone_number') }}" autocomplete="tel" placeholder="+1 234 567 8901">
                            @error('phone_number')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-yellow-400 mb-2">Country</label>
                            <select id="country" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('country') border-red-400 @enderror" name="country" required>
                                <option value="">Select a country</option>
                                <option value="United States" {{ old('country') === 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="United Kingdom" {{ old('country') === 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="Canada" {{ old('country') === 'Canada' ? 'selected' : '' }}>Canada</option>
                                <option value="Australia" {{ old('country') === 'Australia' ? 'selected' : '' }}>Australia</option>
                                <option value="Germany" {{ old('country') === 'Germany' ? 'selected' : '' }}>Germany</option>
                                <option value="France" {{ old('country') === 'France' ? 'selected' : '' }}>France</option>
                                <option value="Italy" {{ old('country') === 'Italy' ? 'selected' : '' }}>Italy</option>
                                <option value="Spain" {{ old('country') === 'Spain' ? 'selected' : '' }}>Spain</option>
                                <option value="Netherlands" {{ old('country') === 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                <option value="Switzerland" {{ old('country') === 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                <option value="Sweden" {{ old('country') === 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                <option value="Norway" {{ old('country') === 'Norway' ? 'selected' : '' }}>Norway</option>
                                <option value="Denmark" {{ old('country') === 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                <option value="Belgium" {{ old('country') === 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                <option value="Austria" {{ old('country') === 'Austria' ? 'selected' : '' }}>Austria</option>
                                <option value="Japan" {{ old('country') === 'Japan' ? 'selected' : '' }}>Japan</option>
                                <option value="South Korea" {{ old('country') === 'South Korea' ? 'selected' : '' }}>South Korea</option>
                                <option value="Singapore" {{ old('country') === 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                <option value="Hong Kong" {{ old('country') === 'Hong Kong' ? 'selected' : '' }}>Hong Kong</option>
                                <option value="India" {{ old('country') === 'India' ? 'selected' : '' }}>India</option>
                                <option value="China" {{ old('country') === 'China' ? 'selected' : '' }}>China</option>
                                <option value="Brazil" {{ old('country') === 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                <option value="Mexico" {{ old('country') === 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                <option value="Argentina" {{ old('country') === 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                <option value="Chile" {{ old('country') === 'Chile' ? 'selected' : '' }}>Chile</option>
                                <option value="South Africa" {{ old('country') === 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                <option value="UAE" {{ old('country') === 'UAE' ? 'selected' : '' }}>UAE</option>
                                <option value="Saudi Arabia" {{ old('country') === 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                <option value="Thailand" {{ old('country') === 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                <option value="Malaysia" {{ old('country') === 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                <option value="Philippines" {{ old('country') === 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                <option value="Indonesia" {{ old('country') === 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                <option value="Vietnam" {{ old('country') === 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                            </select>
                            @error('country')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-3">
                        <div>
                            <label for="city" class="block text-sm font-medium text-yellow-400 mb-2">City</label>
                            <input id="city" type="text" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('city') border-red-400 @enderror" name="city" value="{{ old('city') }}" placeholder="City">
                            @error('city')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="state" class="block text-sm font-medium text-yellow-400 mb-2">State</label>
                            <input id="state" type="text" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('state') border-red-400 @enderror" name="state" value="{{ old('state') }}" placeholder="State">
                            @error('state')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-yellow-400 mb-2">Postal Code</label>
                            <input id="postal_code" type="text" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('postal_code') border-red-400 @enderror" name="postal_code" value="{{ old('postal_code') }}" placeholder="Postal Code">
                            @error('postal_code')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-yellow-400 mb-2">Address</label>
                        <textarea id="address" class="w-full px-4 py-3 bg-gray-900 border border-yellow-400/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/20 @error('address') border-red-400 @enderror" name="address" rows="3" placeholder="Street, City, State, Postal Code">{{ old('address') }}</textarea>
                        @error('address')
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