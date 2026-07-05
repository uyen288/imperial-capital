<x-admin-layout heading="Edit Portfolio Holding">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}">
            @csrf
            @method('PUT')

            @include('admin.portfolios._form')

        </form>

    </div>

</x-admin-layout>
