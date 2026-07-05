<x-admin-layout heading="Dashboard">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

        {{-- Funds --}}
        <div class="rounded-xl border border-gray-200 bg-white p-6 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Funds</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['funds'] }}</p>
                </div>
                <div class="rounded-lg bg-red-50 p-3">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.funds.index') }}" class="mt-4 inline-block text-xs font-medium text-red-600 hover:text-red-700">
                Manage Funds →
            </a>
        </div>

        {{-- Performances --}}
        <div class="rounded-xl border border-gray-200 bg-white p-6 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Performance Records</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['performances'] }}</p>
                </div>
                <div class="rounded-lg bg-blue-50 p-3">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.performances.index') }}" class="mt-4 inline-block text-xs font-medium text-blue-600 hover:text-blue-700">
                Manage Performances →
            </a>
        </div>

        {{-- Portfolios --}}
        <div class="rounded-xl border border-gray-200 bg-white p-6 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Portfolio Holdings</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['portfolios'] }}</p>
                </div>
                <div class="rounded-lg bg-emerald-50 p-3">
                    <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.portfolios.index') }}" class="mt-4 inline-block text-xs font-medium text-emerald-600 hover:text-emerald-700">
                Manage Portfolios →
            </a>
        </div>

        {{-- Documents --}}
        <div class="rounded-xl border border-gray-200 bg-white p-6 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Documents</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['documents'] }}</p>
                </div>
                <div class="rounded-lg bg-amber-50 p-3">
                    <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
            <a href="{{ route('admin.documents.index') }}" class="mt-4 inline-block text-xs font-medium text-amber-600 hover:text-amber-700">
                Manage Documents →
            </a>
        </div>

    </div>

</x-admin-layout>