<x-admin-layout heading="Create Fund">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.funds.store') }}">
            @csrf

            @include('admin.funds._form')

        </form>

    </div>

</x-admin-layout>
