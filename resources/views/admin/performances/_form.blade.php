{{-- Shared form partial for Performance create/edit --}}

{{-- ── Basic Info ─────────────────────────────────── --}}
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

    {{-- Fund --}}
    <div class="lg:col-span-2">
        <label for="fund_id" class="mb-1 block text-sm font-medium text-gray-700">Fund <span class="text-red-500">*</span></label>
        <select name="fund_id" id="fund_id"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                required>
            <option value="">Chọn quỹ</option>
            @foreach($funds as $fund)
                <option value="{{ $fund->id }}"
                    data-benchmarks="{{ $fund->benchmarks->toJson() }}"
                    {{ old('fund_id', $performance->fund_id ?? '') == $fund->id ? 'selected' : '' }}>
                    {{ $fund->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Date --}}
    <div class="lg:col-span-2">
        <label for="date" class="mb-1 block text-sm font-medium text-gray-700">Ngày <span class="text-red-500">*</span></label>
        <input type="date" name="date" id="date"
               value="{{ old('date', isset($performance->date) ? $performance->date->format('Y-m-d') : '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
               required>
    </div>

</div>

@php
    $metrics = [
        ['field' => 'nav',         'label' => 'NAV',         'type' => 'number', 'step' => '0.01'],
        ['field' => 'one_month',   'label' => '1 Tháng (%)', 'type' => 'number', 'step' => '0.01'],
        ['field' => 'three_month', 'label' => '3 Tháng (%)', 'type' => 'number', 'step' => '0.01'],
        ['field' => 'one_year',    'label' => '1 Năm (%)',   'type' => 'number', 'step' => '0.01'],
        ['field' => 'three_year',  'label' => '3 Năm (%)',   'type' => 'number', 'step' => '0.01'],
        ['field' => 'ytd',         'label' => 'YTD (%)',     'type' => 'number', 'step' => '0.01'],
    ];
@endphp

{{-- ── Fund Performance ──────────────────────────── --}}
<div class="mt-8">
    <h3 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-500 border-b border-gray-100 pb-2">
        {{ $performance->fund->name ?? 'Quỹ' }}
    </h3>
    <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
        @foreach($metrics as $m)
            @php
                $name  = $m['field'];
                $value = old($name, isset($performance) ? ($performance->{$name} ?? '') : '');
            @endphp
            <div>
                <label for="{{ $name }}" class="mb-1 block text-xs font-medium text-gray-600">
                    {{ $m['label'] }}
                </label>
                <input type="{{ $m['type'] }}" step="{{ $m['step'] }}"
                       name="{{ $name }}" id="{{ $name }}"
                       value="{{ $value }}"
                       class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 bg-white">
            </div>
        @endforeach
    </div>
</div>

{{-- ── Benchmark Sections (dynamic per fund) ─────── --}}
<div id="benchmarkSections">
    {{-- Nếu đang edit, render benchmark sections từ server --}}
    @if(isset($performance) && isset($existingBenchmarkData))
        @foreach($performance->fund->benchmarks as $bm)
            @php $bp = $existingBenchmarkData[$bm->id] ?? null; @endphp
            <div class="mt-8 benchmark-section" data-benchmark-id="{{ $bm->id }}">
                <h3 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-500 border-b border-gray-100 pb-2">
                    {{ $bm->name }}
                </h3>
                <input type="hidden" name="benchmarks[{{ $bm->id }}][benchmark_id]" value="{{ $bm->id }}">
                <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                    @foreach($metrics as $m)
                        @php
                            $bName  = "benchmarks[{$bm->id}][{$m['field']}]";
                            $bValue = old("benchmarks.{$bm->id}.{$m['field']}", $bp ? ($bp->{$m['field']} ?? '') : '');
                        @endphp
                        <div>
                            <label class="mb-1 block text-xs font-medium text-gray-600">{{ $m['label'] }}</label>
                            <input type="{{ $m['type'] }}" step="{{ $m['step'] }}"
                                   name="{{ $bName }}"
                                   value="{{ $bValue }}"
                                   class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 bg-white">
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    @endif
</div>

{{-- Submit --}}
<div class="mt-8 flex items-center gap-3">
    <button type="submit"
            class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-800">
        {{ isset($performance) ? 'Cập nhật' : 'Tạo mới' }}
    </button>

    <a href="{{ route('admin.performances.index') }}"
       class="rounded-lg px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100">
        Hủy
    </a>
</div>

{{-- ── JS: Khi chọn quỹ khác → render benchmark fields ── --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const fundSelect  = document.getElementById('fund_id');
    const container   = document.getElementById('benchmarkSections');
    const metrics     = @json($metrics);

    function renderBenchmarks(benchmarks) {
        container.innerHTML = '';
        if (!benchmarks || !benchmarks.length) return;

        benchmarks.forEach(bm => {
            const section = document.createElement('div');
            section.className = 'mt-8 benchmark-section';
            section.dataset.benchmarkId = bm.id;

            let fieldsHtml = '';
            metrics.forEach(m => {
                fieldsHtml += `
                    <div>
                        <label class="mb-1 block text-xs font-medium text-gray-600">${m.label}</label>
                        <input type="${m.type}" step="${m.step}"
                               name="benchmarks[${bm.id}][${m.field}]"
                               class="w-full rounded-lg border border-gray-200 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500 bg-white">
                    </div>
                `;
            });

            section.innerHTML = `
                <h3 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-500 border-b border-gray-100 pb-2">
                    ${bm.name}
                </h3>
                <input type="hidden" name="benchmarks[${bm.id}][benchmark_id]" value="${bm.id}">
                <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                    ${fieldsHtml}
                </div>
            `;
            container.appendChild(section);
        });
    }

    fundSelect.addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        if (!selected || !selected.value) {
            container.innerHTML = '';
            return;
        }
        try {
            const benchmarks = JSON.parse(selected.dataset.benchmarks || '[]');
            renderBenchmarks(benchmarks);
        } catch (e) {
            container.innerHTML = '';
        }
    });

    // Khi create mới: nếu đã có quỹ được chọn sẵn (old input) thì render luôn
    @unless(isset($performance))
        if (fundSelect.value) {
            fundSelect.dispatchEvent(new Event('change'));
        }
    @endunless
});
</script>
