<div class="col-span-full">
    <div class="relative">
        <label for="search" class="sr-only">{{ Str::title(__('cari disini')) }}</label>
        <input wire:model.live="search" type="text" name="search" id="search"
            placeholder="{{ Str::ucfirst(__('cari disini...')) }}"
            class="w-full bg-white placeholder-slate-400 shadow rounded-xl px-4 py-2  pl-12 focus:outline-none focus:ring-1 focus:ring-sky-500">
        <button type="submit"
            class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500 hover:text-sky-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg wire:loading wire:target="search" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="size-6 animate-spin">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </div>
    </div>
</div>
