<x-layout title="Imperial Capital - Home">

    {{-- Hero Section --}}
    <section class="relative overflow-hidden pt-10 text-black">

        <div class="relative mx-auto max-w-7xl px-6 text-center lg:px-10">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[var(--color-red)]">
                WELCOME TO
            </p>
            <h1 class="text-[70px] font-bold tracking-tight" style="font-family: var(--font-display);">
                Imperial Capital
            </h1>
            <p class="mx-auto mt-4 max-w-4xl text-lg leading-relaxed text-gray-500">
                Imperial Capital tập trung vào các doanh nghiệp vốn hoá nhỏ bị thị trường định giá sai do thiếu thanh
                khoản hoặc bị bỏ quên, tái cấu trúc với biên an toàn lớn, đồng thời có
                catalyst rõ ràng giúp thu hẹp khoảng cách giữa giá thị trường và giá trị nội tại trong 6-18 tháng.
            </p>
        </div>
    </section>

    {{-- Funds Section --}}
    <section class="mx-auto max-w-7xl py-10 lg:px-10">

        @if($funds->count())
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($funds->where('status', true) as $fund)
                    <a href="{{ route('funds.show', $fund) }}"
                        class="group rounded-2xl border border-gray-200 bg-white p-8 transition-all duration-300 hover:-translate-y-1 hover:border-red-400">

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
                                <p
                                    class="mt-1 text-xl font-bold {{ ($fund->ytd_return ?? 0) >= 0 ? 'text-emerald-600' : 'text-[var(--color-red)]' }}">
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

                            <span
                                class="text-xs font-semibold uppercase tracking-widest text-[var(--color-red)] transition group-hover:translate-x-1">
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