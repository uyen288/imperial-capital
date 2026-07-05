<x-layout title="{{ $fund->name }} - Imperial Capital">

    {{-- Fund Header --}}
    <section class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12 lg:px-10">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-red-600">Fund Detail</p>
            <h1 class="mt-2 text-3xl font-bold text-gray-900">{{ $fund->name }}</h1>
            @if($fund->short_description)
                <p class="mt-3 max-w-2xl text-sm text-gray-500">{{ $fund->short_description }}</p>
            @endif

            {{-- Stats Bar --}}
            <div class="mt-8 grid grid-cols-2 gap-6 sm:grid-cols-4">
                <x-stat-card label="NAV" :date="$fund->updated_at?->format('d/m/Y') ?? '-'">
                    <span class="text-2xl font-bold text-gray-900">{{ $fund->nav ? number_format($fund->nav, 2) : '—' }}</span>
                </x-stat-card>
                <x-stat-card label="YTD Return" :date="$fund->updated_at?->format('d/m/Y') ?? '-'">
                    <span class="text-2xl font-bold {{ ($fund->ytd_return ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $fund->ytd_return !== null ? ($fund->ytd_return >= 0 ? '+' : '') . $fund->ytd_return . '%' : '—' }}
                    </span>
                </x-stat-card>
                <x-stat-card label="5-Year Return" :date="$fund->updated_at?->format('d/m/Y') ?? '-'">
                    <span class="text-2xl font-bold {{ ($fund->five_year_return ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">
                        {{ $fund->five_year_return !== null ? ($fund->five_year_return >= 0 ? '+' : '') . $fund->five_year_return . '%' : '—' }}
                    </span>
                </x-stat-card>
                <x-stat-card label="Inception" :date="' '">
                    <span class="text-2xl font-bold text-gray-900">
                        {{ ($fund->inception_date ?? $fund->founded_date)?->format('d/m/Y') ?? '—' }}
                    </span>
                </x-stat-card>
            </div>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <nav class="sticky top-20 z-30 border-b border-gray-200 bg-white/90 backdrop-blur-sm">
        <div class="mx-auto flex max-w-7xl gap-8 px-6 lg:px-10">
            <a href="#overview" class="tab-link border-b-2 border-red-600 py-4 text-xs font-semibold uppercase tracking-[0.15em] text-red-700">Overview</a>
            <a href="#performance" class="tab-link border-b-2 border-transparent py-4 text-xs font-semibold uppercase tracking-[0.15em] text-gray-500 hover:text-gray-900">Performance</a>
            <a href="#portfolio" class="tab-link border-b-2 border-transparent py-4 text-xs font-semibold uppercase tracking-[0.15em] text-gray-500 hover:text-gray-900">Portfolio</a>
            <a href="#documents" class="tab-link border-b-2 border-transparent py-4 text-xs font-semibold uppercase tracking-[0.15em] text-gray-500 hover:text-gray-900">Documents</a>
        </div>
    </nav>

    <div class="mx-auto max-w-7xl px-6 py-12 lg:px-10">

        {{-- Overview Section --}}
        <section id="overview" class="scroll-mt-40 pb-16">
            <h2 class="text-xl font-bold text-gray-900">Overview</h2>
            <div class="mt-6 grid grid-cols-1 gap-8 lg:grid-cols-2">
                <div class="space-y-6">
                    @if($fund->objective ?? $fund->fund_objective)
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Objective</h3>
                            <p class="mt-2 text-sm leading-relaxed text-gray-700">{{ $fund->objective ?? $fund->fund_objective }}</p>
                        </div>
                    @endif
                    @if($fund->strategy ?? $fund->investment_strategy)
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Strategy</h3>
                            <p class="mt-2 text-sm leading-relaxed text-gray-700">{{ $fund->strategy ?? $fund->investment_strategy }}</p>
                        </div>
                    @endif
                    @if($fund->description)
                        <div>
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Description</h3>
                            <p class="mt-2 text-sm leading-relaxed text-gray-700">{{ $fund->description }}</p>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-6">
                        <h3 class="mb-4 text-sm font-semibold uppercase tracking-wider text-gray-400">Fund Details</h3>
                        <dl class="space-y-3 text-sm">
                            @if($fund->fund_type)
                                <div class="flex justify-between"><dt class="text-gray-500">Fund Type</dt><dd class="font-medium text-gray-900">{{ $fund->fund_type }}</dd></div>
                            @endif
                            @if($fund->asset_class)
                                <div class="flex justify-between"><dt class="text-gray-500">Asset Class</dt><dd class="font-medium text-gray-900">{{ $fund->asset_class }}</dd></div>
                            @endif
                            @if($fund->subscription_fee)
                                <div class="flex justify-between"><dt class="text-gray-500">Subscription Fee</dt><dd class="font-medium text-gray-900">{{ $fund->subscription_fee }}</dd></div>
                            @endif
                            @if($fund->management_fee)
                                <div class="flex justify-between"><dt class="text-gray-500">Management Fee</dt><dd class="font-medium text-gray-900">{{ $fund->management_fee }}</dd></div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </section>

        {{-- Performance Section --}}
        <section id="performance" class="scroll-mt-40 border-t border-gray-200 py-16">
            <h2 class="text-xl font-bold text-gray-900">Performance</h2>
            @if($fund->performances->count())
                <div class="mt-6 overflow-hidden rounded-xl border border-gray-200">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-500">Date</th>
                                <th class="px-6 py-3 font-medium text-gray-500">NAV</th>
                                <th class="px-6 py-3 font-medium text-gray-500">1M</th>
                                <th class="px-6 py-3 font-medium text-gray-500">3M</th>
                                <th class="px-6 py-3 font-medium text-gray-500">1Y</th>
                                <th class="px-6 py-3 font-medium text-gray-500">3Y</th>
                                <th class="px-6 py-3 font-medium text-gray-500">YTD</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($fund->performances as $p)
                                <tr>
                                    <td class="px-6 py-3 font-medium text-gray-900">{{ $p->date->format('d/m/Y') }}</td>
                                    <td class="px-6 py-3">{{ $p->nav ? number_format($p->nav, 2) : '-' }}</td>
                                    <td class="px-6 py-3 {{ ($p->one_month ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $p->one_month !== null ? $p->one_month . '%' : '-' }}</td>
                                    <td class="px-6 py-3 {{ ($p->three_month ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $p->three_month !== null ? $p->three_month . '%' : '-' }}</td>
                                    <td class="px-6 py-3 {{ ($p->one_year ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $p->one_year !== null ? $p->one_year . '%' : '-' }}</td>
                                    <td class="px-6 py-3 {{ ($p->three_year ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $p->three_year !== null ? $p->three_year . '%' : '-' }}</td>
                                    <td class="px-6 py-3 {{ ($p->ytd ?? 0) >= 0 ? 'text-emerald-600' : 'text-red-600' }}">{{ $p->ytd !== null ? $p->ytd . '%' : '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mt-4 text-sm text-gray-400">No performance data available.</p>
            @endif
        </section>

        {{-- Portfolio Section --}}
        <section id="portfolio" class="scroll-mt-40 border-t border-gray-200 py-16">
            <h2 class="text-xl font-bold text-gray-900">Portfolio Holdings</h2>
            @if($fund->portfolios->count())
                <div class="mt-6 overflow-hidden rounded-xl border border-gray-200">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-500">Company</th>
                                <th class="px-6 py-3 font-medium text-gray-500">Ticker</th>
                                <th class="px-6 py-3 font-medium text-gray-500">Sector</th>
                                <th class="px-6 py-3 font-medium text-gray-500">Weight</th>
                                <th class="px-6 py-3 font-medium text-gray-500">Asset Type</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($fund->portfolios as $holding)
                                <tr>
                                    <td class="px-6 py-3 font-medium text-gray-900">{{ $holding->company_name }}</td>
                                    <td class="px-6 py-3"><span class="rounded bg-gray-100 px-2 py-0.5 font-mono text-xs font-medium">{{ $holding->ticker }}</span></td>
                                    <td class="px-6 py-3 text-gray-500">{{ $holding->sector ?? '-' }}</td>
                                    <td class="px-6 py-3 font-medium">{{ $holding->weight !== null ? $holding->weight . '%' : '-' }}</td>
                                    <td class="px-6 py-3 text-gray-500">{{ $holding->asset_type ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="mt-4 text-sm text-gray-400">No portfolio data available.</p>
            @endif
        </section>

        {{-- Documents Section --}}
        <section id="documents" class="scroll-mt-40 border-t border-gray-200 py-16">
            <h2 class="text-xl font-bold text-gray-900">Documents</h2>
            @if($fund->documents->count())
                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($fund->documents as $doc)
                        <a href="{{ asset('storage/' . $doc->file) }}" target="_blank"
                           class="group flex items-start gap-4 rounded-xl border border-gray-200 p-5 transition hover:border-red-200 hover:shadow-md">
                            <div class="rounded-lg bg-red-50 p-2.5">
                                <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-sm font-semibold text-gray-900 group-hover:text-red-700">{{ $doc->title }}</h3>
                                <p class="mt-1 text-xs text-gray-400">{{ $doc->category }} · {{ $doc->publish_date->format('d/m/Y') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="mt-4 text-sm text-gray-400">No documents available.</p>
            @endif
        </section>

    </div>

    <x-slot:scripts>
        <script>
            // Tab smooth scroll + active state
            document.querySelectorAll('.tab-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) target.scrollIntoView({ behavior: 'smooth' });

                    document.querySelectorAll('.tab-link').forEach(l => {
                        l.classList.remove('border-red-600', 'text-red-700');
                        l.classList.add('border-transparent', 'text-gray-500');
                    });
                    this.classList.add('border-red-600', 'text-red-700');
                    this.classList.remove('border-transparent', 'text-gray-500');
                });
            });
        </script>
    </x-slot:scripts>

</x-layout>
