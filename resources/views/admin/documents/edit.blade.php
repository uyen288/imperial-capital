<x-admin-layout heading="Edit Document: {{ $document->title }}">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.documents.update', $document) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.documents._form')

        </form>

    </div>

</x-admin-layout>
