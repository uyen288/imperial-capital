{{-- Shared form partial for Portfolio create/edit --}}
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

    {{-- Fund --}}
    <div class="lg:col-span-2">
        <label for="fund_id" class="mb-1 block text-sm font-medium text-gray-700">Fund <span
                class="text-red-500">*</span></label>
        <select name="fund_id" id="fund_id"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
            required>
            <option value="">Select a fund</option>
            @foreach($funds as $fund)
                <option value="{{ $fund->id }}" {{ old('fund_id', $portfolio->fund_id ?? '') == $fund->id ? 'selected' : '' }}>
                    {{ $fund->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Company Name --}}
    <div>
        <label for="company_name" class="mb-1 block text-sm font-medium text-gray-700">Company Name</label>
        <input type="text" name="company_name" id="company_name"
            value="{{ old('company_name', $portfolio->company_name ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Ticker --}}
    <div>
        <label for="ticker" class="mb-1 block text-sm font-medium text-gray-700">Ticker <span
                class="text-red-500">*</span></label>
        <input type="text" name="ticker" id="ticker" value="{{ old('ticker', $portfolio->ticker ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
            required>
    </div>

    {{-- Sector --}}
    <div>
        <label for="sector" class="mb-1 block text-sm font-medium text-gray-700">Sector</label>
        <input type="text" name="sector" id="sector" value="{{ old('sector', $portfolio->sector ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Weight --}}
    <div>
        <label for="weight" class="mb-1 block text-sm font-medium text-gray-700">Weight (%)</label>
        <input type="number" step="0.01" min="0" max="100" name="weight" id="weight"
            value="{{ old('weight', $portfolio->weight ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Asset Type --}}
    <div>
        <label for="asset_type" class="mb-1 block text-sm font-medium text-gray-700">Asset Type</label>
        <input type="text" name="asset_type" id="asset_type"
            value="{{ old('asset_type', $portfolio->asset_type ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
            placeholder="e.g. Equity, Bond, Cash">
    </div>

</div>

{{-- Submit --}}
<div class="mt-8 flex items-center gap-3">
    <button type="submit"
        class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-800">
        {{ isset($portfolio) ? 'Update Holding' : 'Create Holding' }}
    </button>

    <a href="{{ route('admin.portfolios.index') }}"
        class="rounded-lg px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100">
        Cancel
    </a>
</div>