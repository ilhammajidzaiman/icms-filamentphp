<a wire:navigate href="{{ $href ?? null }}"
    class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 py-2 px-4 rounded-xl">
    {{ Str::title(__('selengkapnya')) }}
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
    </svg>
</a>
