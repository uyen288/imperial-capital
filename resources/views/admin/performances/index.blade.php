<x-admin-layout heading="Performances">

    <div class="mb-6 flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $performances->count() }} record(s) total</p>
        <a href="{{ route('admin.performances.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-800">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Record
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 font-medium text-gray-500">Fund</th>
                        <th class="px-6 py-3 font-medium text-gray-500">Date</th>
                        <th class="px-6 py-3 font-medium text-gray-500">NAV</th>
                        <th class="px-6 py-3 font-medium text-gray-500">1M</th>
                        <th class="px-6 py-3 font-medium text-gray-500">3M</th>
                        <th class="px-6 py-3 font-medium text-gray-500">1Y</th>
                        <th class="px-6 py-3 font-medium text-gray-500">3Y</th>
                        <th class="px-6 py-3 font-medium text-gray-500">YTD</th>
                        <th class="px-6 py-3 font-medium text-gray-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($performances as $performance)
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $performance->fund->name }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $performance->date->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $performance->nav ? number_format($performance->nav, 2) : '-' }}</td>
                            <td class="px-6 py-4 {{ ($performance->one_month ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $performance->one_month !== null ? $performance->one_month . '%' : '-' }}
                            </td>
                            <td class="px-6 py-4 {{ ($performance->three_month ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $performance->three_month !== null ? $performance->three_month . '%' : '-' }}
                            </td>
                            <td class="px-6 py-4 {{ ($performance->one_year ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $performance->one_year !== null ? $performance->one_year . '%' : '-' }}
                            </td>
                            <td class="px-6 py-4 {{ ($performance->three_year ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $performance->three_year !== null ? $performance->three_year . '%' : '-' }}
                            </td>
                            <td class="px-6 py-4 {{ ($performance->ytd ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $performance->ytd !== null ? $performance->ytd . '%' : '-' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.performances.edit', $performance) }}"
                                       class="rounded-lg px-3 py-1.5 text-xs font-medium text-gray-600 transition hover:bg-gray-100">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.performances.destroy', $performance) }}"
                                          onsubmit="return confirm('Delete this record?')">
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
                            <td colspan="9" class="px-6 py-12 text-center text-gray-400">
                                No performance records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>
