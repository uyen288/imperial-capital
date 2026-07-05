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
    $sections = [
        [
            'key'   => '',          // fund itself (no prefix)
            'label' => $performance->fund->name ?? 'Quỹ',
            'color' => 'gray',
        ],
        [
            'key'   => 'vn_index_',
            'label' => 'VN-Index',
            'color' => 'sky',
        ],
        [
            'key'   => 'dcds_',
            'label' => 'Dragon Capital – DCDS',
            'color' => 'emerald',
        ],
        [
            'key'   => 'vesaf_',
            'label' => 'Vina – VESAF',
            'color' => 'rose',
        ],
    ];

    $metrics = [
        ['field' => 'nav',         'label' => 'NAV',         'type' => 'number', 'step' => '0.01'],
        ['field' => 'one_month',   'label' => '1 Tháng (%)', 'type' => 'number', 'step' => '0.01'],
        ['field' => 'three_month', 'label' => '3 Tháng (%)', 'type' => 'number', 'step' => '0.01'],
        ['field' => 'one_year',    'label' => '1 Năm (%)',   'type' => 'number', 'step' => '0.01'],
        ['field' => 'three_year',  'label' => '3 Năm (%)',   'type' => 'number', 'step' => '0.01'],
        ['field' => 'ytd',         'label' => 'YTD (%)',     'type' => 'number', 'step' => '0.01'],
    ];
@endphp

@foreach($sections as $section)
    <div class="mt-8">
        <h3 class="mb-3 text-sm font-semibold uppercase tracking-wider text-gray-500 border-b border-gray-100 pb-2">
            {{ $section['label'] }}
        </h3>
        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
            @foreach($metrics as $m)
                @php
                    $name  = $section['key'] . $m['field'];
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
@endforeach

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
