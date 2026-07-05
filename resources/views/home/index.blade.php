<x-layout title="Imperial Capital - Home">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-24 text-white">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.15&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6 text-center lg:px-10">
            <p class="mb-4 text-xs font-semibold uppercase tracking-[0.3em] text-red-400">
                Asset Management
            </p>
            <h1 class="text-4xl font-bold tracking-tight lg:text-6xl">
                Imperial Capital
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-gray-300">
                Delivering superior risk-adjusted returns through disciplined investment strategies and rigorous fundamental analysis.
            </p>
        </div>
    </section>

    {{-- Funds Section --}}
    <section class="mx-auto max-w-7xl px-6 py-20 lg:px-10">

        <div class="mb-12 text-center">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-red-600">Our Funds</p>
            <h2 class="mt-2 text-3xl font-bold text-gray-900">Investment Solutions</h2>
        </div>

        @if($funds->count())
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($funds->where('status', true) as $fund)
                    <a href="{{ route('funds.show', $fund) }}"
                       class="group rounded-2xl border border-gray-200 bg-white p-8 transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-xl">

                        {{-- Fund Name --}}
                        <h3 class="text-lg font-bold text-gray-900 transition group-hover:text-red-700">
                            {{ $fund->name }}
                        </h3>

                        @if($fund->short_description)
                            <p class="mt-3 line-clamp-2 text-sm leading-relaxed text-gray-500">
                                {{ $fund->short_description }}
                            </p>
                        @endif

                        {{-- Stats --}}
                        <div class="mt-6 grid grid-cols-2 gap-4 border-t border-gray-100 pt-6">
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">NAV</p>
                                <p class="mt-1 text-xl font-bold text-gray-900">
                                    {{ $fund->nav ? number_format($fund->nav, 2) : '—' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">YTD Return</p>
                                <p class="mt-1 text-xl font-bold {{ ($fund->ytd_return ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                                    {{ $fund->ytd_return !== null ? ($fund->ytd_return >= 0 ? '+' : '') . $fund->ytd_return . '%' : '—' }}
                                </p>
                            </div>
                        </div>

                        {{-- Footer --}}
                        <div class="mt-6 flex items-center justify-between">
                            @if($fund->fund_type)
                                <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                    {{ $fund->fund_type }}
                                </span>
                            @else
                                <span></span>
                            @endif

                            <span class="text-xs font-semibold uppercase tracking-widest text-red-600 transition group-hover:translate-x-1">
                                View Details →
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="py-20 text-center">
                <p class="text-gray-400">No funds available at this time.</p>
            </div>
        @endif

    </section>

</x-layout>