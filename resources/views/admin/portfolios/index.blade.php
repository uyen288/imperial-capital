<x-admin-layout heading="Portfolios">

    <div class="mb-6 flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $portfolios->count() }} holding(s) total</p>
        <a href="{{ route('admin.portfolios.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-800">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Holding
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr>
                    <th class="px-6 py-3 font-medium text-gray-500">Fund</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Company</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Ticker</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Sector</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Weight</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Asset Type</th>
                    <th class="px-6 py-3 font-medium text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($portfolios as $portfolio)
                    <tr class="transition hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $portfolio->fund->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $portfolio->company_name }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex rounded bg-gray-100 px-2 py-0.5 text-xs font-mono font-medium text-gray-700">
                                {{ $portfolio->ticker }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $portfolio->sector ?? '-' }}</td>
                        <td class="px-6 py-4 font-medium text-gray-700">
                            {{ $portfolio->weight !== null ? $portfolio->weight . '%' : '-' }}
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $portfolio->asset_type ?? '-' }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
                                   class="rounded-lg px-3 py-1.5 text-xs font-medium text-gray-600 transition hover:bg-gray-100">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}"
                                      onsubmit="return confirm('Delete this holding?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-lg px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-50">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                            No portfolio holdings found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
