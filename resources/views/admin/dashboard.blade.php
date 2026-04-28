@extends('layouts.app')

@section('content')
<div class="min-h-screen" style="background: #0a0a0a; font-family: Inter, sans-serif; color: #ffffff;">

    @if (session('verified'))
        <div class="bg-green-600 text-white px-4 py-3 rounded mb-4 text-center">
            Your email has been verified successfully!
        </div>
    @endif

    <!-- TOP BAR -->
    <div class="px-6 py-5 flex justify-between items-center border-b bg-black">
        <div>
            <h1 class="text-2xl font-bold text-yellow-400">Admin Dashboard</h1>
            <p class="text-sm text-gray-300">Welcome back, {{ Auth::user()->name }}</p>
        </div>

        @include('components.user-profile-dropdown')

            <!-- OVERVIEW CARDS -->
            <div class="grid grid-cols-3 gap-4 mb-6">

                <div class="bg-gray-800 rounded-xl p-5 shadow-sm border border-yellow-400/20">
                    <p class="text-gray-300 text-sm">Total Users</p>
                    <h3 class="text-2xl font-bold text-yellow-400">{{ $totalUsers }}</h3>
                </div>

                <div class="bg-gray-800 rounded-xl p-5 shadow-sm border border-yellow-400/20">
                    <p class="text-gray-300 text-sm">Total Investments</p>
                    <h3 class="text-2xl font-bold text-yellow-400">{{ $totalInvestments }}</h3>
                </div>

                <div class="bg-gray-800 rounded-xl p-5 shadow-sm border border-yellow-400/20">
                    <p class="text-gray-300 text-sm">Platform Value</p>
                    <h3 class="text-2xl font-bold text-yellow-400">${{ number_format($totalPortfolioValue, 2) }}</h3>
                </div>

            </div>

            <!-- CRYPTO MANAGEMENT -->
            <div class="bg-gray-800 rounded-2xl shadow-sm border border-yellow-400/20 mb-6">
                <div class="p-5 border-b border-yellow-400/20 font-semibold text-yellow-400">
                    Cryptocurrency Management
                </div>

                <div class="p-5">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="text-left py-2 text-gray-300">Symbol</th>
                                    <th class="text-left py-2 text-gray-300">Name</th>
                                    <th class="text-right py-2 text-gray-300">Price</th>
                                    <th class="text-right py-2 text-gray-300">24h Change</th>
                                    <th class="text-right py-2 text-gray-300">Market Cap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cryptos as $crypto)
                                <tr class="border-b border-gray-700">
                                    <td class="py-3 font-medium">{{ $crypto->symbol }}</td>
                                    <td class="py-3">{{ $crypto->name }}</td>
                                    <td class="py-3 text-right">${{ number_format($crypto->current_price, 2) }}</td>
                                    <td class="py-3 text-right {{ $crypto->price_change_24h >= 0 ? 'text-green-400' : 'text-red-400' }}">
                                        {{ $crypto->price_change_24h >= 0 ? '+' : '' }}{{ number_format($crypto->price_change_24h, 2) }}%
                                    </td>
                                    <td class="py-3 text-right">${{ number_format($crypto->market_cap / 1000000000, 2) }}B</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT: ACTIONS PANEL -->
        <div class="col-span-12 lg:col-span-4 space-y-6">

            <!-- ADMIN ACTIONS -->
            <div class="bg-gray-800 rounded-2xl shadow-sm border border-yellow-400/20 p-5 space-y-3">

                <a href="#" class="block text-center py-3 rounded-xl bg-yellow-400 text-black font-semibold hover:bg-yellow-300 transition">
                    Manage Users
                </a>

                <a href="#" class="block text-center py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                    Add Crypto
                </a>

                <a href="{{ route('admin.deposits') }}" class="block text-center py-3 rounded-xl bg-yellow-400 text-black font-semibold hover:bg-yellow-300 transition">
                    Deposit Requests
                </a>

                <a href="#" class="block text-center py-3 rounded-xl bg-green-600 text-white font-semibold hover:bg-green-700 transition">
                    View Reports
                </a>

                <a href="#" class="block text-center py-3 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 transition">
                    System Settings
                </a>

            </div>

            <!-- RECENT USERS -->
            <div class="bg-gray-800 rounded-2xl shadow-sm border border-yellow-400/20">
                <div class="p-5 border-b border-yellow-400/20 font-semibold text-yellow-400">
                    Recent Users
                </div>

                <div class="p-5 space-y-4 text-sm">
                    @foreach($recentUsers as $user)
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-medium text-white">{{ $user->name }}</p>
                            <p class="text-gray-400">{{ $user->email }}</p>
                        </div>
                        <span class="text-yellow-400">{{ $user->created_at->diffForHumans() }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>
@endsection