<footer class="border-t border-gray-200">
    <div
        class="mx-auto flex max-w-7xl flex-col gap-10 px-6 py-10 lg:flex-row lg:items-start lg:justify-between lg:px-12">

        {{-- Left --}}
        <div class="max-w-sm">
            <h3 class="mb-2 text-sm font-semibold text-gray-900">
                {{ config('app.name') }}
            </h3>

            <p class="text-xs leading-6 text-gray-500">
                {{ __('© Imperial Capital. Bảo lưu mọi quyền. Được đăng ký với Ủy ban Chứng khoán Nhà nước Việt Nam. Hiệu suất trong quá khứ không đảm bảo kết quả trong tương lai. Nhà đầu tư nên đọc kỹ bản cáo bạch trước khi đầu tư.') }}
            </p>
        </div>

        {{-- Right --}}
        <nav class="flex flex-col items-start gap-3 text-xs uppercase tracking-widest text-gray-600 lg:items-end">

            <a href="https://docs.google.com/spreadsheets/d/19jayXVfBmnHl8FOGD00VyCwW_thXRyQz__pXq_ATuxI/edit?gid=0#gid=0"
                target="_blank" class="transition hover:text-red-600">
                Stock Ticker List
            </a>

            <a href="https://docs.google.com/spreadsheets/d/1qvuiF6Umc1j0FbxSlsrywZTlZT4h5_i5gzvfb_hoFts/edit?gid=0#gid=0"
                target="_blank" class="transition hover:text-red-600">
                Venture Imperial Capital
            </a>

            <a href="https://docs.google.com/spreadsheets/d/1VRzNzrvspnPwtORYXE-YgzG9G0pUcHlPQJx3XoXj6wU/edit?gid=0#gid=0"
                target="_blank" class="transition hover:text-red-600">
                Track Record
            </a>

            <a href="https://docs.google.com/spreadsheets/d/1cPQSrlLKzFFBtN2Fj3OPtE-EPeKxfvOIn-3izJEyxh4/edit?gid=656606264#gid=656606264"
                target="_blank" class="transition hover:text-red-600">
                Venture Track Record
            </a>

            <a href="#" class="transition hover:text-red-600">
                Common-size Table
            </a>

            <a href="{{ asset('storage/templates/ratios-template.xlsx') }}" download
                class="transition hover:text-red-600">
                Ratios Table Template
            </a>

        </nav>

    </div>
</footer>