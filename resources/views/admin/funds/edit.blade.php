<x-admin-layout heading="Edit Fund: {{ $fund->name }}">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.funds.update', $fund) }}">
            @csrf
            @method('PUT')

            @include('admin.funds._form')

        </form>

    </div>

</x-admin-layout>
