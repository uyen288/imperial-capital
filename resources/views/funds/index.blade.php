<x-layout title="Funds - Imperial Capital">
    <section class="mx-auto max-w-7xl px-6 py-16 lg:px-10">
        <div class="mb-10">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-red-600">Imperial Capital</p>
            <h1 class="mt-2 text-3xl font-bold text-gray-900">Our Funds</h1>
        </div>

        @if($funds->count())
            <div class="space-y-6">
                @foreach($funds as $fund)
                    <a href="{{ route('funds.show', $fund) }}"
                       class="group flex flex-col gap-6 rounded-2xl border border-gray-200 bg-white p-8 transition hover:border-red-200 hover:shadow-lg md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-gray-900 group-hover:text-red-700">{{ $fund->name }}</h2>
                            @if($fund->short_description)
                                <p class="mt-2 text-sm text-gray-500">{{ $fund->short_description }}</p>
                            @endif
                            <div class="mt-3 flex flex-wrap gap-2">
                                @if($fund->fund_type)
                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">{{ $fund->fund_type }}</span>
                                @endif
                                @if($fund->asset_class)
                                    <span class="rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-600">{{ $fund->asset_class }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex shrink-0 items-center gap-8">
                            <div class="text-center">
                                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">NAV</p>
                                <p class="mt-1 text-2xl font-bold text-gray-900">{{ $fund->nav ? number_format($fund->nav, 2) : '—' }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">YTD</p>
                                <p class="mt-1 text-2xl font-bold {{ ($fund->ytd_return ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                                    {{ $fund->ytd_return !== null ? ($fund->ytd_return >= 0 ? '+' : '') . $fund->ytd_return . '%' : '—' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="py-20 text-center text-gray-400">No funds available.</p>
        @endif
    </section>
</x-layout>
