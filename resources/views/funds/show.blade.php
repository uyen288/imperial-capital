<x-layout title="{{ $fund->name }} - Imperial Capital">

    {{-- Fund Header --}}
    <section class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-6 py-12 lg:px-10">
            <div class="flex">
                <div class="w-full flex-1">
                    <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[var(--color-red)]">Đầu tư giá trị
                    </p>
                    <h1 class="text-[70px] font-bold text-gray-900" style="font-family: var(--font-display);">
                        {{ $fund->name }}
                    </h1>
                    <p class="max-w-3xl text-gray-500">
                        Imperial Capital tập trung vào các doanh nghiệp vốn hoá nhỏ bị thị trường định giá sai do thiếu
                        thanh
                        khoản hoặc bị bỏ quên, tái cấu trúc với biên an toàn lớn, đồng thời có catalyst rõ ràng giúp thu
                        hẹp
                        khoảng cách giữa giá thị trường và giá trị nội tại trong 6-18 tháng.
                    </p>
                </div>
                <div class="self-end mb-5">
                    @php
                        $latestDoc = $fund->documents->sortByDesc('publish_date')->first();
                    @endphp

                    @if($latestDoc)
                        <a href="{{ asset('storage/' . $latestDoc->files) }}" target="_blank"
                            class="inline-block text-[11px] uppercase tracking-widest text-[var(--color-red)] font-bold no-underline border-b border-[var(--color-red)] pb-1 text-right transition duration-300 ease-in-out hover:-translate-y-1">
                            Tải xuống {{ $latestDoc->title }} →
                        </a>
                    @endif
                </div>
            </div>

            {{-- Stats Bar --}}
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4">
                <x-stat-card label="Lợi nhuận từ đầu năm" :date="'Tại ngày ' . $fund->updated_at?->format('d/m/Y') ?? '-'">
                    <span
                        class="text-3xl font-bold {{ ($fund->ytd_return ?? 0) > 0 ? 'text-emerald-600' : 'text-gray-800' }}">
                        {{ $fund->ytd_return !== null ? ($fund->ytd_return >= 0 ? '+' : '') . $fund->ytd_return . '%' : '—' }}
                    </span>
                </x-stat-card>
                <x-stat-card label="Lợi nhuận 5 năm" :date="'Tại ngày ' . $fund->updated_at?->format('d/m/Y') ?? '-'">
                    <span
                        class="text-3xl font-bold {{ ($fund->five_year_return ?? 0) > 0 ? 'text-emerald-600' : 'text-gray-800' }}">
                        {{ $fund->five_year_return !== null ? ($fund->five_year_return >= 0 ? '+' : '') . $fund->five_year_return . '%' : '—' }}
                    </span>
                </x-stat-card>
                <x-stat-card label="NAV/CCQ" :date="'Tại ngày ' . $fund->updated_at?->format('d/m/Y') ?? '-'">
                    <span
                        class="text-3xl font-bold text-gray-900">{{ $fund->nav ? number_format($fund->nav, 2) : '—' }}</span>
                </x-stat-card>
                <x-stat-card label="Ngày thành lập" :date="'-'">
                    <span class="text-3xl font-bold text-gray-900">
                        {{ ($fund->inception_date ?? $fund->founded_date)?->format('d/m/Y') ?? '—' }}
                    </span>
                </x-stat-card>
            </div>
        </div>
    </section>

    {{-- Tab Navigation --}}
    <nav class="sticky top-20 z-30 border-b border-gray-200 bg-white/90 backdrop-blur-sm">
        <div class="mx-auto flex max-w-7xl gap-8 px-6 lg:px-10">
            <a href="#overview"
                class="tab-link border-b-2 border-[var(--color-red)] py-4 text-sm font-normal uppercase tracking-[0.15em] text-[var(--color-red)]">Tổng
                quan</a>
            <a href="#performance"
                class="tab-link border-b-2 border-transparent py-4 text-sm font-normal uppercase tracking-[0.15em] text-gray-500 hover:text-gray-900">Hiệu
                suất</a>
            <a href="#portfolio"
                class="tab-link border-b-2 border-transparent py-4 text-sm font-normal uppercase tracking-[0.15em] text-gray-500 hover:text-gray-900">Danh
                mục</a>
            <a href="#documents"
                class="tab-link border-b-2 border-transparent py-4 text-sm font-normal uppercase tracking-[0.15em] text-gray-500 hover:text-gray-900">Tài
                liệu</a>
        </div>
    </nav>

    <div class="mx-auto max-w-7xl px-6 py-12 lg:px-10">

        {{-- Overview Section --}}
        <section id="overview" class="scroll-mt-40 pb-16">
            <h2 class="text-[40px] font-bold text-gray-900" style="font-family: var(--font-display);">Tổng quan</h2>
            <div class="mt-6 grid grid-cols-1 gap-8 lg:grid-cols-[6fr_4fr]">
                <div class="space-y-6">
                    @if($fund->fund_objective ?? '')
                        <div>
                            <h3 class="font-semibold uppercase tracking-wider text-gray-400">Mục tiêu quỹ</h3>
                            <p class="mt-2 leading-relaxed text-gray-700">
                                {{ $fund->fund_objective ?? '' }}
                            </p>
                        </div>
                    @endif
                    @if($fund->investment_strategy ?? '')
                        <div>
                            <h3 class="font-semibold uppercase tracking-wider text-gray-400">Chiến lược đầu tư</h3>
                            <p class="mt-2 leading-relaxed text-gray-700">
                                {{ $fund->investment_strategy ?? '' }}
                            </p>
                        </div>
                    @endif
                    <section class="manager-section">
                        <h3 class="font-semibold uppercase tracking-wider text-gray-400">Đội ngũ quản lý</h3>

                        <div class="mt-10 flex flex-col gap-8">

                            <div class="flex items-center gap-5 border-b border-gray-200 last:border-b-0 pb-5">
                                <img src="/storage/images/ql.jpg" class="h-20 w-20 rounded-full object-cover">

                                <div class="flex-1">
                                    <div class="mb-1.5 flex items-center gap-3">
                                        <h3 class="m-0 text-lg font-bold text-[var(--color-accent)]">Hồ Tấn Đạt</h3>
                                        <span class="text-xs uppercase text-[var(--gray-600)]">Quản lý quỹ</span>
                                    </div>
                                    <p class="text-[#444]">15 năm kinh nghiệm trong đầu tư và quản lý tài sản
                                    </p>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
                <div>
                    <div class="border border-gray-300 p-6">
                        <h3 class="mb-4 font-semibold uppercase tracking-wider text-gray-800">Thông tin chung</h3>
                        <dl class="space-y-3 text-[14px]">
                            @if($fund->name)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Tên quỹ</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->name }}</dd>
                                </div>
                            @endif
                            @if($fund->inception_date)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Ngày thành lập</dt>
                                    <dd class="font-medium text-gray-900">
                                        {{ $fund->inception_date?->format('d/m/Y') ?? '-' }}
                                    </dd>
                                </div>
                            @endif
                            @if($fund->fund_type)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Loại quỹ</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->fund_type }}</dd>
                                </div>
                            @endif
                            @if($fund->asset_class)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Loại tài sản</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->asset_class }}</dd>
                                </div>
                            @endif
                            @if($fund->strategy)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Chiến lược</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->strategy }}</dd>
                                </div>
                            @endif
                            @if($fund->suggested_investment_time)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Đề xuất thời gian đầu tư</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->suggested_investment_time }}</dd>
                                </div>
                            @endif
                            @if($fund->subscription_fee)
                                <div class="flex justify-between border-b border-gray-300 py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Phí mua</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->subscription_fee }}</dd>
                                </div>
                            @endif
                            @if($fund->management_fee)
                                <div class="flex justify-between py-3">
                                    <dt class="text-gray-400 uppercase font-semibold">Phí quản lý</dt>
                                    <dd class="font-medium text-gray-900">{{ $fund->management_fee }}</dd>
                                </div>
                            @endif
                        </dl>

                        <div class="text-center my-5">
                            <a href="{{ route('funds.nav-history', $fund->slug) }}"
                                class="text-[12px] uppercase text-[var(--color-red)] hover:underline">
                                Xem lịch sử NAV →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Performance Section --}}
        <section id="performance" class="scroll-mt-40 border-t border-gray-200 py-16">
            <h2 class="text-[40px] font-bold text-gray-900 text-center" style="font-family: var(--font-display);">
                Tăng trưởng tích
                lũy (%)
            </h2>
            {{-- Sub-header --}}
            <div class="px-6 py-3 flex items-center justify-center gap-5">
                <span class="text-sm text-gray-500">
                    Đơn vị tiền tệ: VNĐ
                </span>
                <span class="text-sm text-gray-500">
                    Tại ngày {{ $fund->updated_at?->format('d/m/Y') ?? '-'  }}
                </span>
            </div>

            @if($fund->performances->count())

                @php
                    $latest = $fund->performances->sortByDesc('date')->first();
                    $sorted = $fund->performances->sortBy('date');

                    // Benchmark data kỳ gần nhất, keyed by benchmark_id
                    $latestBenchmarkMap = $latest->benchmarkPerformances->keyBy('benchmark_id');

                    // Chuẩn bị chart datasets
                    $benchmarkColors = ['#2b6cbbff', '#008e4e', '#cc0000', '#d9ab06ff'];
                    $chartDatasets = [];
                    // Dataset fund
                    $chartDatasets[] = [
                        'label' => $fund->name,
                        'data' => $sorted->map(fn($p) => $p->one_month !== null ? (float) $p->one_month : null)->values(),
                        'borderColor' => '#0a0a0a',
                        'bgColor' => '#0a0a0a',
                        'dashed' => false,
                    ];
                    // Datasets benchmark động
                    foreach ($fund->benchmarks as $bi => $bm) {
                        $chartDatasets[] = [
                            'label' => $bm->name,
                            'data' => $sorted->map(function ($p) use ($bm) {
                                $bp = $p->benchmarkPerformances->firstWhere('benchmark_id', $bm->id);
                                return $bp && $bp->one_month !== null ? (float) $bp->one_month : null;
                            })->values(),
                            'borderColor' => $benchmarkColors[$bi % count($benchmarkColors)],
                            'bgColor' => $benchmarkColors[$bi % count($benchmarkColors)],
                            'dashed' => true,
                        ];
                    }
                @endphp

                {{-- ── Benchmark Comparison Table (latest period) ──────── --}}
                <div class="mt-8 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="px-6 py-3 text-left font-medium text-gray-400 w-40"></th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500">NAV</th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500">1 Tháng</th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500">3 Tháng</th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500">1 Năm</th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500">3 Năm</th>
                                    <th class="px-6 py-3 text-right font-medium text-gray-500">YTD</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                {{-- Fund row --}}
                                <tr class="hover:bg-gray-50/60 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-gray-900">{{ $fund->name }}</td>
                                    <td class="px-6 py-4 font-normal text-right text-gray-700">
                                        {{ $latest->nav !== null ? number_format((float) $latest->nav, 2, ',', '.') : '-' }}
                                    </td>
                                    @foreach(['one_month', 'three_month', 'one_year', 'three_year', 'ytd'] as $col)
                                        @php $v = $latest->$col; @endphp
                                        <td
                                            class="px-6 py-4 text-right font-medium {{ $v === null ? 'text-gray-400' : (floatval($v) >= 0 ? 'text-emerald-600' : 'text-[var(--color-red)]') }}">
                                            @if($v === null) -
                                            @else {{ floatval($v) >= 0 ? '+' : '' }}{{ number_format(floatval($v), 2) }}%
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>

                                {{-- Dynamic benchmark rows --}}
                                @foreach($fund->benchmarks as $bm)
                                    @php $bp = $latestBenchmarkMap->get($bm->id); @endphp
                                    <tr class="hover:bg-gray-50/60 transition-colors">
                                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $bm->name }}</td>
                                        <td class="px-6 py-4 font-normal text-right text-gray-700">
                                            {{ $bp && $bp->nav !== null ? number_format((float) $bp->nav, 2, ',', '.') : '-' }}
                                        </td>
                                        @foreach(['one_month', 'three_month', 'one_year', 'three_year', 'ytd'] as $col)
                                            @php $v = $bp ? $bp->$col : null; @endphp
                                            <td
                                                class="px-6 py-4 text-right font-medium {{ $v === null ? 'text-gray-400' : (floatval($v) >= 0 ? 'text-emerald-600' : 'text-[var(--color-red)]') }}">
                                                @if($v === null) -
                                                @else {{ floatval($v) >= 0 ? '+' : '' }}{{ number_format(floatval($v), 2) }}%
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- ── Line Chart (dynamic datasets) ── --}}
                <div class="mt-20 p-6">
                    <div class="relative h-80">
                        <canvas id="performanceChart"
                            data-labels="{{ $sorted->map(fn($p) => $p->date->format('m/Y'))->values()->toJson() }}"
                            data-datasets="{{ collect($chartDatasets)->toJson() }}">
                        </canvas>
                    </div>
                </div>

            @else
                <div
                    class="mt-8 flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center">
                    <svg class="h-10 w-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>

                    <p class="mt-3 text-sm font-medium text-gray-400">Chưa có dữ liệu hiệu suất</p>
                    <p class="mt-1 text-xs text-gray-300">Dữ liệu sẽ tự động hiển thị khi được cập nhật</p>
                </div>
            @endif
        </section>

        {{-- Portfolio Section --}}
        <section id="portfolio" class="scroll-mt-40 border-t border-gray-200 py-16">

            {{-- ── Donut Chart + Legend ──────────────────────────────── --}}
            <div class="p-8">
                {{-- Title + Tabs --}}
                <div class="flex flex-col items-center gap-4 text-center">
                    <h2 class="text-[40px] font-bold tracking-tight text-gray-900"
                        style="font-family: var(--font-display);">Danh Mục Đầu Tư</h2>
                    <p class="text-[10px] uppercase tracking-[0.12em] text-gray-400">
                        Cập nhật lần cuối: {{ $fund->updated_at?->format('d/m/Y') ?? '-' }}
                    </p>

                    {{-- Tabs --}}
                    <div class="mt-2 inline-flex overflow-hidden border border-gray-200">
                        <button
                            class="portfolio-tab bg-gray-900 px-6 py-2 text-[11px] font-medium uppercase tracking-[0.12em] text-white transition"
                            data-tab="sector">
                            {{ $fund->slug === 'imperial-capital' ? 'Ngành' : 'Crypto' }}
                        </button>
                        <button
                            class="portfolio-tab bg-transparent px-6 py-2 text-[11px] font-medium uppercase tracking-[0.12em] text-gray-500 transition hover:bg-gray-50"
                            data-tab="asset">
                            {{ $fund->slug === 'imperial-capital' ? 'Loại Tài Sản' : 'Ngành' }}
                        </button>
                    </div>
                </div>

                {{-- Donut + Legend layout --}}
                <div class="mt-10 flex flex-col items-center justify-center gap-12 lg:flex-row">
                    {{-- Donut --}}
                    <div class="relative h-56 w-56 flex-shrink-0">
                        <svg viewBox="0 0 200 200" id="portfolioDonut" class="h-full w-full"
                            style="transform: rotate(-90deg)" data-sector="{{ $sectorData->toJson() }}"
                            data-asset="{{ $assetData->toJson() }}"></svg>
                        <div class="pointer-events-none absolute inset-0 flex flex-col items-center justify-center">
                            <span id="donutValue" class="text-3xl font-semibold text-gray-900">100%</span>
                            <span id="donutLabel" class="mt-0.5 text-[13px] text-gray-400">Tổng</span>
                        </div>
                    </div>

                    {{-- Legend --}}
                    <div id="portfolioLegend" class="w-full max-w-xs"></div>
                </div>
            </div>

            {{-- ── Top Holdings Table ───────────────────────────────── --}}
            @if($fund->portfolios->count())
                <div class="mt-12">
                    <div class="flex items-baseline justify-between">
                        <h3 class="text-[30px] font-bold tracking-tight text-gray-900 ps-5"
                            style="font-family: var(--font-display);">Các khoản đầu tư hàng đầu</h3>
                        <span class="text-[10px] uppercase tracking-[0.1em] text-gray-400">
                            Cập nhật lần cuối: {{ $fund->updated_at?->format('d/m/Y') ?? '-' }}
                        </span>
                    </div>

                    <div class="mt-4 overflow-hidden">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th
                                        class="px-6 py-3 text-left text-[10px] font-normal uppercase tracking-[0.12em] text-gray-400">
                                        Công ty
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-[10px] font-normal uppercase tracking-[0.12em] text-gray-400">
                                        Ngành
                                    </th>
                                    <th
                                        class="px-6 py-3 text-right text-[10px] font-normal uppercase tracking-[0.12em] text-gray-400">
                                        Tỷ trọng
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($fund->portfolios->sortByDesc('weight')->where('company_name', '<>', null) as $holding)
                                    <tr class="transition hover:bg-gray-50/60">
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $holding->company_name }}</div>
                                            <div class="mt-0.5 text-[10px] tracking-[0.06em] text-gray-400">
                                                {{ $holding->ticker }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span
                                                class="text-[11px] uppercase tracking-[0.06em] text-gray-400">{{ $holding->sector ?? '-' }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-right text-[15px] font-medium text-gray-900">
                                            {{ number_format((float) $holding->weight, 2) }}%
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </section>

        {{-- Documents Section --}}
        <section id="documents" class="scroll-mt-40 border-t border-gray-200 py-16">

            <h2 class="text-[40px] font-bold text-gray-900" style="font-family: var(--font-display);">Tài liệu</h2>

            {{-- Tabs --}}
            <div class="mt-8 flex flex-wrap border-b border-gray-200">
                <button
                    class="doc-tab border-b border-[var(--color-red)] bg-white px-5 py-2 text-sm font-medium text-[var(--color-red)] transition hover:border-red-500 hover:text-[var(--color-red)]"
                    data-tab="all">
                    Tất cả
                </button>

                <button
                    class="doc-tab bg-white px-5 py-2 text-sm font-medium text-gray-600 transition hover:border-red-500 hover:text-[var(--color-red)]"
                    data-tab="factsheet">
                    Factsheet
                </button>

                <button
                    class="doc-tab bg-white px-5 py-2 text-sm font-medium text-gray-600 transition hover:border-red-500 hover:text-[var(--color-red)]"
                    data-tab="prospectus">
                    Bản cáo bạch & Điều lệ
                </button>

                <button
                    class="doc-tab bg-white px-5 py-2 text-sm font-medium text-gray-600 transition hover:border-red-500 hover:text-[var(--color-red)]"
                    data-tab="monthly">
                    Báo cáo tháng
                </button>
            </div>

            {{-- List --}}
            <div id="docsList" class="mt-8 space-y-3">

                @forelse($fund->documents->sortByDesc('publish_date') as $doc)

                    <div class="doc-item flex items-center justify-between border-b border-gray-200 last:border-b-0 bg-white p-5"
                        data-category="{{ strtolower($doc->category) }}">

                        <div>

                            <h3 class="text-sm font-semibold text-gray-900">
                                {{ $doc->title }}
                            </h3>

                            <p class="mt-1 text-xs text-gray-500">
                                {{ $doc->publish_date->format('d/m/Y') }}
                                •
                                {{ strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) }}
                            </p>

                        </div>

                        <a href="{{ asset('storage/' . $doc->file) }}" target="_blank"
                            class="border border-gray-300 text-[var(--color-red)] px-4 py-2 text-sm font-medium transition hover:bg-[var(--color-red)] hover:text-white">

                            Tải xuống

                        </a>

                    </div>

                @empty

                    <div class="py-12 text-center text-sm text-gray-400">
                        Chưa có tài liệu.
                    </div>

                @endforelse

                <div id="emptyState"
                    class="{{ $fund->documents->count() ? 'hidden' : '' }} py-12 text-center text-sm text-gray-400">
                    Chưa có tài liệu.
                </div>

            </div>

        </section>

    </div>

    <x-slot:scripts>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>

        <script>
            // ── Tab smooth scroll + active state ─────────────────────
            document.querySelectorAll('.tab-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }

                    document.querySelectorAll('.tab-link').forEach(l => {
                        l.classList.remove('border-[var(--color-red)]', 'text-[var(--color-red)]');
                        l.classList.add('border-transparent', 'text-gray-500');
                    });

                    this.classList.add('border-[var(--color-red)]', 'text-[var(--color-red)]');
                    this.classList.remove('border-transparent', 'text-gray-500');
                });
            });

            // ── Performance Chart (dynamic benchmarks) ───────────────────
            (function () {
                const canvas = document.getElementById('performanceChart');
                if (!canvas) return;

                const labels = JSON.parse(canvas.dataset.labels || '[]');
                const rawSets = JSON.parse(canvas.dataset.datasets || '[]');

                const datasets = rawSets.map((d) => ({
                    label: d.label,
                    data: d.data,
                    borderColor: d.borderColor,
                    backgroundColor: d.bgColor,
                    borderWidth: 2,
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    tension: 0.35,
                }));

                new Chart(canvas.getContext('2d'), {
                    type: 'line',
                    data: { labels, datasets },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        interaction: { mode: 'index', intersect: false },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                align: 'start',
                                labels: {
                                    usePointStyle: true,
                                    pointStyle: 'line',
                                    boxWidth: 25,
                                    boxHeight: 25,
                                    padding: 24,
                                    color: '#374151',
                                    font: { family: "'Inter', sans-serif", size: 13, weight: '600' }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: (ctx) => `${ctx.dataset.label}: ${ctx.parsed.y !== null ? ctx.parsed.y + '%' : '-'}`
                                }
                            }
                        },
                        scales: {
                            x: { grid: { color: 'rgba(0,0,0,0.05)' }, ticks: { color: '#6b7280' } },
                            y: {
                                grid: { color: 'rgba(0,0,0,0.05)' },
                                ticks: { color: '#6b7280', callback: (v) => v + '%' }
                            }
                        }
                    }
                });
            })();

            // ── Documents Tab Logic ────────────────────────────────────────
            (function () {

                const tabs = document.querySelectorAll('.doc-tab');
                const items = document.querySelectorAll('.doc-item');
                const emptyState = document.getElementById('emptyState');

                tabs.forEach(tab => {

                    tab.addEventListener('click', () => {

                        tabs.forEach(btn => {
                            btn.classList.remove(
                                'text-[var(--color-red)]',
                                'border-b',
                                'border-[var(--color-red)]'
                            );

                            btn.classList.add(
                                'text-gray-600'
                            );
                        });

                        tab.classList.remove(
                            'text-gray-600'
                        );

                        tab.classList.add(
                            'text-[var(--color-red)]',
                            'border-b',
                            'border-[var(--color-red)]'
                        );

                        const category = tab.dataset.tab;

                        let visibleCount = 0;

                        items.forEach(item => {

                            const hidden =
                                category !== 'all' &&
                                item.dataset.category !== category;

                            item.classList.toggle('hidden', hidden);

                            if (!hidden) visibleCount++;


                        });

                        emptyState.classList.toggle('hidden', visibleCount > 0);

                    });

                });

            })();

            // ── Portfolio Donut Chart Logic ─────────────────────────────────
            (function () {
                const donut = document.getElementById('portfolioDonut');
                const legend = document.getElementById('portfolioLegend');
                const centerValue = document.getElementById('donutValue');
                const centerLabel = document.getElementById('donutLabel');
                const tabs = document.querySelectorAll('.portfolio-tab');

                if (!donut || !legend) return;

                const data = {
                    sector: JSON.parse(donut.dataset.sector || '[]'),
                    asset: JSON.parse(donut.dataset.asset || '[]')
                };

                // Palette logic
                const colors = ['#dc2626', '#1f2937', '#6b7280', '#9ca3af', '#d1d5db', '#e5e7eb', '#f3f4f6', '#f3f4f6', '#f3f4f6', '#f3f4f6', '#f3f4f6', '#f3f4f6'];

                let activeSegment = null;
                let currentType = 'sector';

                function activateSegment(circle, item) {
                    if (activeSegment && activeSegment !== circle) {
                        activeSegment.style.strokeWidth = '15';
                        activeSegment.style.transform = 'scale(1)';
                    }
                    activeSegment = circle;
                    circle.style.strokeWidth = '20';
                    circle.style.transform = 'scale(1.05)';
                    centerValue.innerText = item.value + '%';
                    centerLabel.innerText = item.name;
                }

                function clearHover() {
                    if (activeSegment) {
                        activeSegment.style.strokeWidth = '15';
                        activeSegment.style.transform = 'scale(1)';
                        activeSegment = null;
                    }
                    centerValue.innerText = '100%';
                    centerLabel.innerText = 'Tổng';
                }

                donut.addEventListener('mousemove', (e) => {
                    const circle = e.target.closest('.segment');
                    if (!circle) return;
                    const index = Number(circle.dataset.index);
                    const item = data[currentType][index];
                    activateSegment(circle, item);
                });

                donut.addEventListener('mouseleave', clearHover);

                function render(type) {
                    currentType = type;
                    donut.innerHTML = '';
                    legend.innerHTML = '';
                    const radius = 80;
                    const C = 2 * Math.PI * radius;
                    let offset = 0;

                    const items = data[type];
                    items.forEach((item, i) => {
                        const color = colors[i % colors.length];
                        const dash = (item.value / 100) * C;

                        // Create circle
                        const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                        circle.dataset.index = i;
                        circle.setAttribute('cx', 100);
                        circle.setAttribute('cy', 100);
                        circle.setAttribute('r', radius);
                        circle.setAttribute('fill', 'none');
                        circle.setAttribute('stroke', color);
                        circle.setAttribute('stroke-width', 15);
                        circle.setAttribute('stroke-dasharray', `${dash} ${C}`);
                        circle.setAttribute('stroke-dashoffset', -offset);
                        circle.style.transition = 'all 0.25s ease';
                        circle.style.transformOrigin = '50% 50%';
                        circle.style.cursor = 'pointer';
                        circle.classList.add('segment');
                        donut.appendChild(circle);

                        offset += dash;

                        // Create Legend Item
                        const row = document.createElement('div');
                        row.className = 'flex items-center justify-between py-3 border-b border-gray-100 cursor-pointer group transition';
                        row.innerHTML = `
                            <div class="flex items-center gap-3">
                                <span class="block h-2 w-2 rounded-full" style="background-color: ${color}"></span>
                                <span class="text-[13px] text-gray-700 group-hover:text-[var(--color-red)] transition">${item.name}</span>
                            </div>
                            <span class="text-[13px] font-medium text-gray-900">${item.value}%</span>
                        `;
                        row.addEventListener('mouseenter', () => activateSegment(circle, Object.assign({}, item, { color })));
                        row.addEventListener('mouseleave', clearHover);
                        legend.appendChild(row);
                    });
                }

                // Initial render
                render('sector');

                // Tab logic
                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        tabs.forEach(t => {
                            t.classList.remove('bg-gray-900', 'text-white');
                            t.classList.add('bg-transparent', 'text-gray-500');
                        });
                        tab.classList.remove('bg-transparent', 'text-gray-500');
                        tab.classList.add('bg-gray-900', 'text-white');
                        render(tab.dataset.tab);
                    });
                });
            })();
        </script>
    </x-slot:scripts>

</x-layout>