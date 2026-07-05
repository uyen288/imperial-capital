<x-admin-layout heading="Upload Document">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
            @csrf

            @include('admin.documents._form')

        </form>

    </div>

</x-admin-layout>
