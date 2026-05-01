@php $userInitial = strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)); @endphp
<div class="relative">
    <button type="button" data-account-toggle class="flex items-center space-x-2 sm:space-x-3 flex-shrink-0 focus:outline-none">
        <div class="hidden sm:block text-right">
            <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
            <p class="text-xs text-gray-400">{{ Auth::user()->role === 'admin' ? 'Admin' : 'Premium Investor' }}</p>
        </div>
        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
            <span class="text-gray-900 font-bold text-sm">{{ $userInitial }}</span>
        </div>
    </button>

    <div data-account-menu class="hidden absolute right-0 top-full mt-3 w-52 rounded-3xl border border-gray-700 bg-gray-900/95 shadow-2xl p-2 z-50">
        <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm text-gray-200 rounded-2xl hover:bg-yellow-400/10">Dashboard</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-3 text-sm text-gray-200 rounded-2xl hover:bg-yellow-400/10">Logout</a>
    </div>
</div>

<form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
    @csrf
</form>
