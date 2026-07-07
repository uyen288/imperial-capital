<div class="p-10 border-r border-y border-gray-300 last:border-r-0">

    <p class="text-[14px] font-semibold uppercase tracking-[0.15em] text-[var(--color-red)]">
        {{ $label }}
    </p>

    <p class="mt-1 text-[14px] text-gray-400">
        {{ $date }}
    </p>

    <div class="mt-2">
        {{ $slot }}
    </div>

</div>