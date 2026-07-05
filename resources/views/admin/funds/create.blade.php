<x-admin-layout heading="Create Fund">

    <div class="mx-auto max-w-4xl rounded-xl border border-gray-200 bg-white p-8">

        <form method="POST" action="{{ route('admin.funds.store') }}">
            @csrf

            @include('admin.funds._form')

        </form>

    </div>

    <x-slot name="scripts">
    <script>
        (function () {
            const nameInput   = document.getElementById('name');
            const slugHidden  = document.getElementById('slug');
            const slugPreview = document.getElementById('slug_preview');

            function toSlug(str) {
                return str
                    .toLowerCase()
                    .replace(/[àáạảãâầấậẩẫăằắặẳẵ]/g, 'a')
                    .replace(/[èéẹẻẽêềếệểễ]/g, 'e')
                    .replace(/[ìíịỉĩ]/g, 'i')
                    .replace(/[òóọỏõôồốộổỗơờớợởỡ]/g, 'o')
                    .replace(/[ùúụủũưừứựửữ]/g, 'u')
                    .replace(/[ỳýỵỷỹ]/g, 'y')
                    .replace(/đ/g, 'd')
                    .replace(/[^a-z0-9\s-]/g, '')
                    .trim()
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }

            if (nameInput) {
                nameInput.addEventListener('input', function () {
                    const slug = toSlug(this.value);
                    slugHidden.value = slug;
                    slugPreview.textContent = slug || 'slug-se-duoc-tu-sinh';
                });
            }
        })();
    </script>
    </x-slot>

</x-admin-layout>
