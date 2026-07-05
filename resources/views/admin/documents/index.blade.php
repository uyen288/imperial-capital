<x-admin-layout heading="Documents">

    <div class="mb-6 flex items-center justify-between">
        <p class="text-sm text-gray-500">{{ $documents->count() }} document(s) total</p>
        <a href="{{ route('admin.documents.create') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-red-700 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-800">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Upload Document
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr>
                    <th class="px-6 py-3 font-medium text-gray-500">Title</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Fund</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Category</th>
                    <th class="px-6 py-3 font-medium text-gray-500">Publish Date</th>
                    <th class="px-6 py-3 font-medium text-gray-500">File</th>
                    <th class="px-6 py-3 font-medium text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($documents as $document)
                    <tr class="transition hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $document->title }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ $document->fund->name }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                {{ $document->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $document->publish_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ asset('storage/' . $document->file) }}" target="_blank"
                               class="text-xs font-medium text-red-600 hover:text-red-700">
                                View PDF ↗
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.documents.edit', $document) }}"
                                   class="rounded-lg px-3 py-1.5 text-xs font-medium text-gray-600 transition hover:bg-gray-100">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.documents.destroy', $document) }}"
                                      onsubmit="return confirm('Delete this document?')">
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
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            No documents found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-admin-layout>
