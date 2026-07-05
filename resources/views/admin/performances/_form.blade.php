{{-- Shared form partial for Performance create/edit --}}
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

    {{-- Fund --}}
    <div class="lg:col-span-2">
        <label for="fund_id" class="mb-1 block text-sm font-medium text-gray-700">Fund <span class="text-red-500">*</span></label>
        <select name="fund_id" id="fund_id"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                required>
            <option value="">Select a fund</option>
            @foreach($funds as $fund)
                <option value="{{ $fund->id }}"
                    {{ old('fund_id', $performance->fund_id ?? '') == $fund->id ? 'selected' : '' }}>
                    {{ $fund->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Date --}}
    <div>
        <label for="date" class="mb-1 block text-sm font-medium text-gray-700">Date <span class="text-red-500">*</span></label>
        <input type="date" name="date" id="date"
               value="{{ old('date', isset($performance->date) ? $performance->date->format('Y-m-d') : '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
               required>
    </div>

    {{-- NAV --}}
    <div>
        <label for="nav" class="mb-1 block text-sm font-medium text-gray-700">NAV</label>
        <input type="number" step="0.01" name="nav" id="nav"
               value="{{ old('nav', $performance->nav ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- 1 Month --}}
    <div>
        <label for="one_month" class="mb-1 block text-sm font-medium text-gray-700">1 Month (%)</label>
        <input type="number" step="0.01" name="one_month" id="one_month"
               value="{{ old('one_month', $performance->one_month ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- 3 Month --}}
    <div>
        <label for="three_month" class="mb-1 block text-sm font-medium text-gray-700">3 Month (%)</label>
        <input type="number" step="0.01" name="three_month" id="three_month"
               value="{{ old('three_month', $performance->three_month ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- 1 Year --}}
    <div>
        <label for="one_year" class="mb-1 block text-sm font-medium text-gray-700">1 Year (%)</label>
        <input type="number" step="0.01" name="one_year" id="one_year"
               value="{{ old('one_year', $performance->one_year ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- 3 Year --}}
    <div>
        <label for="three_year" class="mb-1 block text-sm font-medium text-gray-700">3 Year (%)</label>
        <input type="number" step="0.01" name="three_year" id="three_year"
               value="{{ old('three_year', $performance->three_year ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- YTD --}}
    <div>
        <label for="ytd" class="mb-1 block text-sm font-medium text-gray-700">YTD (%)</label>
        <input type="number" step="0.01" name="ytd" id="ytd"
               value="{{ old('ytd', $performance->ytd ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

</div>

{{-- Submit --}}
<div class="mt-8 flex items-center gap-3">
    <button type="submit"
            class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-800">
        {{ isset($performance) ? 'Update Record' : 'Create Record' }}
    </button>

    <a href="{{ route('admin.performances.index') }}"
       class="rounded-lg px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100">
        Cancel
    </a>
</div>
