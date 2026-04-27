@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white font-sans">
    <div class="px-6 py-5 flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-yellow-400/20 bg-black/80">
        <div>
            <h1 class="text-3xl font-bold text-yellow-400">Deposit Requests</h1>
            <p class="text-sm text-gray-400">Review, approve, or reject pending deposit requests from users.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg bg-gray-800 border border-yellow-400/20 text-yellow-400 hover:bg-yellow-400 hover:text-black transition">Admin Home</a>
            <a href="{{ route('admin.deposits') }}" class="px-4 py-2 rounded-lg bg-yellow-400 text-black font-semibold transition">Refresh List</a>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-8">
        @if(session('success'))
            <div class="mb-6 rounded-2xl border border-green-500/20 bg-green-500/10 p-4 text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 rounded-3xl border border-yellow-400/20 shadow-lg overflow-hidden">
            <div class="p-6 border-b border-yellow-400/20">
                <h2 class="text-xl font-bold text-white">All Deposit Requests</h2>
                <p class="text-sm text-gray-400 mt-1">Sorted by newest first. Pending requests can be approved or rejected instantly.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-900/80">
                        <tr class="text-gray-400 uppercase tracking-wide text-xs">
                            <th class="px-6 py-4">User</th>
                            <th class="px-6 py-4 text-right">Amount</th>
                            <th class="px-6 py-4">Network</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deposits as $deposit)
                        <tr class="border-b border-gray-700 hover:bg-gray-900/60 transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-semibold text-white">{{ $deposit->user->name }}</p>
                                <p class="text-gray-400 text-xs">{{ $deposit->user->email }}</p>
                            </td>
                            <td class="px-6 py-4 text-right text-white font-semibold">${{ number_format($deposit->amount, 2) }}</td>
                            <td class="px-6 py-4 uppercase text-gray-300">{{ $deposit->network }}</td>
                            <td class="px-6 py-4 text-gray-400">{{ $deposit->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4">
                                @if($deposit->status === 'pending')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-400/10 text-yellow-300 font-semibold">Pending</span>
                                @elseif($deposit->status === 'approved')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-500/10 text-green-300 font-semibold">Approved</span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-500/10 text-red-300 font-semibold">Rejected</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                @if($deposit->status === 'pending')
                                    <form action="{{ route('admin.deposit.approve', $deposit) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3 py-2 rounded-lg bg-green-500 text-black font-semibold hover:bg-green-400 transition">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.deposit.reject', $deposit) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-3 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-400 transition">Reject</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs">No actions</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">No deposit requests available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection
