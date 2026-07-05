{{-- Shared form partial for Fund create/edit --}}
<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

    {{-- Name --}}
    <div>
        <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Name <span
                class="text-red-500">*</span></label>
        <input type="text" name="name" id="name" value="{{ old('name', $fund->name ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
            required>
    </div>

    {{-- Slug (auto-generated, read-only preview) --}}
    <!-- <div>
        <label for="slug_preview" class="mb-1 block text-sm font-medium text-gray-700">Slug <span class="text-xs text-gray-400 font-normal">(tự sinh từ tên)</span></label>
        <div class="flex items-center rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-sm text-gray-500">
            <span id="slug_preview" class="italic">{{ $fund->slug ?? 'slug-se-duoc-tu-sinh' }}</span>
        </div>
        {{-- Hidden input to send slug value --}}
        <input type="hidden" name="slug" id="slug" value="{{ old('slug', $fund->slug ?? '') }}">
    </div> -->

    {{-- Short Name --}}
    <div>
        <label for="short_name" class="mb-1 block text-sm font-medium text-gray-700">Short Name</label>
        <input type="text" name="short_name" id="short_name" value="{{ old('short_name', $fund->short_name ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- NAV --}}
    <div>
        <label for="nav" class="mb-1 block text-sm font-medium text-gray-700">NAV</label>
        <input type="number" step="0.01" name="nav" id="nav" value="{{ old('nav', $fund->nav ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- YTD Return --}}
    <div>
        <label for="ytd_return" class="mb-1 block text-sm font-medium text-gray-700">YTD Return (%)</label>
        <input type="number" step="0.01" name="ytd_return" id="ytd_return"
            value="{{ old('ytd_return', $fund->ytd_return ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Five Year Return --}}
    <div>
        <label for="five_year_return" class="mb-1 block text-sm font-medium text-gray-700">5-Year Return (%)</label>
        <input type="number" step="0.01" name="five_year_return" id="five_year_return"
            value="{{ old('five_year_return', $fund->five_year_return ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Inception Date --}}
    <div>
        <label for="inception_date" class="mb-1 block text-sm font-medium text-gray-700">Inception Date</label>
        <input type="date" name="inception_date" id="inception_date"
            value="{{ old('inception_date', isset($fund->inception_date) ? $fund->inception_date->format('Y-m-d') : '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Asset Class --}}
    <div>
        <label for="asset_class" class="mb-1 block text-sm font-medium text-gray-700">Asset Class</label>
        <input type="text" name="asset_class" id="asset_class"
            value="{{ old('asset_class', $fund->asset_class ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Fund Type --}}
    <div>
        <label for="fund_type" class="mb-1 block text-sm font-medium text-gray-700">Fund Type</label>
        <input type="text" name="fund_type" id="fund_type" value="{{ old('fund_type', $fund->fund_type ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Strategy --}}
    <div>
        <label for="strategy" class="mb-1 block text-sm font-medium text-gray-700">Strategy</label>
        <input type="text" name="strategy" id="strategy" value="{{ old('strategy', $fund->strategy ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Suggested Investment Time --}}
    <div>
        <label for="suggested_investment_time" class="mb-1 block text-sm font-medium text-gray-700">Suggested
            Investment Time</label>
        <input type="text" name="suggested_investment_time" id="suggested_investment_time"
            value="{{ old('suggested_investment_time', $fund->suggested_investment_time ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Subscription Fee --}}
    <div>
        <label for="subscription_fee" class="mb-1 block text-sm font-medium text-gray-700">Subscription Fee</label>
        <input type="text" name="subscription_fee" id="subscription_fee"
            value="{{ old('subscription_fee', $fund->subscription_fee ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Management Fee --}}
    <div>
        <label for="management_fee" class="mb-1 block text-sm font-medium text-gray-700">Management Fee</label>
        <input type="text" name="management_fee" id="management_fee"
            value="{{ old('management_fee', $fund->management_fee ?? '') }}"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">
    </div>

    {{-- Fund Objective --}}
    <div class="lg:col-span-2">
        <label for="fund_objective" class="mb-1 block text-sm font-medium text-gray-700">Fund Objective</label>
        <textarea name="fund_objective" id="fund_objective" rows="3"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">{{ old('fund_objective', $fund->fund_objective ?? '') }}</textarea>
    </div>

    {{-- Investment Strategy --}}
    <div class="lg:col-span-2">
        <label for="investment_strategy" class="mb-1 block text-sm font-medium text-gray-700">Investment
            Strategy</label>
        <textarea name="investment_strategy" id="investment_strategy" rows="3"
            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500">{{ old('investment_strategy', $fund->investment_strategy ?? '') }}</textarea>
    </div>

    {{-- Status --}}
    <div class="lg:col-span-2">
        <label class="flex items-center gap-2">
            <input type="hidden" name="status" value="0">
            <input type="checkbox" name="status" value="1" {{ old('status', $fund->status ?? true) ? 'checked' : '' }}
                class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
            <span class="text-sm font-medium text-gray-700">Active</span>
        </label>
    </div>

</div>

{{-- Submit --}}
<div class="mt-8 flex items-center gap-3">
    <button type="submit"
        class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-800">
        {{ isset($fund) ? 'Update Fund' : 'Create Fund' }}
    </button>

    <a href="{{ route('admin.funds.index') }}"
        class="rounded-lg px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100">
        Cancel
    </a>
</div>