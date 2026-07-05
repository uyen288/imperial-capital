<x-admin-layout heading="Add Portfolio Holding">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.portfolios.store') }}">
            @csrf

            @include('admin.portfolios._form')

        </form>

    </div>

</x-admin-layout>
