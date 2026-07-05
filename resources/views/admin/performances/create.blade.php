<x-admin-layout heading="Add Performance Record">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.performances.store') }}">
            @csrf

            @include('admin.performances._form')

        </form>

    </div>

</x-admin-layout>
