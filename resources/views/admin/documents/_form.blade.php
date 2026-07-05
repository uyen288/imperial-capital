{{-- Shared form partial for Document create/edit --}}
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
                    {{ old('fund_id', $document->fund_id ?? '') == $fund->id ? 'selected' : '' }}>
                    {{ $fund->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Title --}}
    <div>
        <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
        <input type="text" name="title" id="title"
               value="{{ old('title', $document->title ?? '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
               required>
    </div>

    {{-- Category --}}
    <div>
        <label for="category" class="mb-1 block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
        <select name="category" id="category"
                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
                required>
            <option value="">Select a category</option>
            @foreach(['Factsheet', 'Monthly Report', 'Prospectus', 'Charter'] as $category)
                <option value="{{ $category }}"
                    {{ old('category', $document->category ?? '') === $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Publish Date --}}
    <div>
        <label for="publish_date" class="mb-1 block text-sm font-medium text-gray-700">Publish Date <span class="text-red-500">*</span></label>
        <input type="date" name="publish_date" id="publish_date"
               value="{{ old('publish_date', isset($document->publish_date) ? $document->publish_date->format('Y-m-d') : '') }}"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
               required>
    </div>

    {{-- File --}}
    <div>
        <label for="file" class="mb-1 block text-sm font-medium text-gray-700">
            PDF File
            @if(!isset($document))
                <span class="text-red-500">*</span>
            @endif
        </label>
        <input type="file" name="file" id="file" accept=".pdf"
               class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm file:mr-3 file:rounded file:border-0 file:bg-red-50 file:px-3 file:py-1 file:text-xs file:font-medium file:text-red-700 focus:border-red-500 focus:outline-none focus:ring-1 focus:ring-red-500"
               {{ !isset($document) ? 'required' : '' }}>
        <p class="mt-1 text-xs text-gray-400">PDF only, max 20MB.</p>

        @if(isset($document) && $document->file)
            <p class="mt-2 text-xs text-gray-500">
                Current file:
                <a href="{{ asset('storage/' . $document->file) }}" target="_blank"
                   class="font-medium text-red-600 hover:underline">
                    View PDF ↗
                </a>
            </p>
        @endif
    </div>

</div>

{{-- Submit --}}
<div class="mt-8 flex items-center gap-3">
    <button type="submit"
            class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-red-800">
        {{ isset($document) ? 'Update Document' : 'Upload Document' }}
    </button>

    <a href="{{ route('admin.documents.index') }}"
       class="rounded-lg px-5 py-2.5 text-sm font-medium text-gray-600 transition hover:bg-gray-100">
        Cancel
    </a>
</div>
