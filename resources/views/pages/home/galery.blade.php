<x-wrapper id="people" class="py-16">
    <x-container class="space-y-8">
        <div class="space-y-2 text-center">
            <h1 class="text-3xl font-bold">
                {{ Str::title(__('galeri')) }}
            </h1>
            <div class="w-12 h-1 mx-auto rounded-full bg-sky-500"></div>
        </div>
        @if ($image->isNotEmpty())
            <div class="grid grid-cols-12 gap-4">
                @foreach ($image as $item)
                    <div class="col-span-6 md:col-span-4">
                        <div class="aspect-square md:aspect-video overflow-hidden rounded-xl cursor-pointer">
                            <img src="{{ Storage::url($item->file ?? null) }}"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="space-y-2 text-center">
                {{-- <p>{{ Str::ucfirst(__('temukan layanan kami yang lainnya')) }}</p> --}}
                <a wire:navigate href=""
                    class="inline-flex items-center gap-2 bg-slate-200 hover:bg-slate-300 py-2 px-4 rounded-xl">
                    {{ Str::title(__('selengkapnya')) }}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
