<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Admin - ' . config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $head ?? '' }}
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="fixed inset-y-0 left-0 z-40 w-64 border-r border-gray-200 bg-white">

            {{-- Logo --}}
            <div class="flex h-16 items-center border-b border-gray-200 px-6">
                <a href="{{ route('admin.dashboard') }}"
                   class="text-sm font-semibold uppercase tracking-[0.2em] text-gray-900 transition hover:text-red-700">
                    Imperial Capital
                </a>
            </div>

            {{-- Navigation --}}
            <nav class="mt-6 space-y-1 px-3">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                          {{ request()->routeIs('admin.dashboard') ? 'bg-red-50 text-red-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.funds.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                          {{ request()->routeIs('admin.funds.*') ? 'bg-red-50 text-red-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Funds
                </a>

                <a href="{{ route('admin.performances.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                          {{ request()->routeIs('admin.performances.*') ? 'bg-red-50 text-red-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                    Performances
                </a>

                <a href="{{ route('admin.portfolios.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                          {{ request()->routeIs('admin.portfolios.*') ? 'bg-red-50 text-red-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Portfolios
                </a>

                <a href="{{ route('admin.documents.index') }}"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                          {{ request()->routeIs('admin.documents.*') ? 'bg-red-50 text-red-700' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Documents
                </a>
            </nav>

            {{-- Bottom --}}
            <div class="absolute bottom-0 left-0 right-0 border-t border-gray-200 p-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" target="_blank"
                       class="text-xs font-medium text-gray-500 transition hover:text-red-700">
                        ← View Site
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-xs font-medium text-gray-500 transition hover:text-red-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

        </aside>

        {{-- Main Content --}}
        <main class="ml-64 flex-1">

            {{-- Top Bar --}}
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-gray-200 bg-white/80 px-8 backdrop-blur-sm">
                <h1 class="text-lg font-semibold text-gray-900">
                    {{ $heading ?? 'Dashboard' }}
                </h1>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                </div>
            </header>

            {{-- Content --}}
            <div class="p-8">
                <x-toast />

                {{ $slot }}
            </div>

        </main>

    </div>

    {{ $scripts ?? '' }}

</body>
</html>
