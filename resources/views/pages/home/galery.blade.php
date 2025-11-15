<x-wrapper id="people" class="py-16">
    <x-container class="space-y-8">
        <div class="text-center space-y-4">
            <h1 class="text-4xl font-bold text-slate-700">
                {{ Str::title(__('galeri')) }}
            </h1>
            <div class="w-12 h-0.5 bg-sky-500 mx-auto"></div>
            <a wire:navigate href=""
                class="inline-flex items-center gap-2 text-slate-400 hover:underline hover:text-slate-500 line-clamp-1">
                {{ Str::title(__('selengkapnya')) }}
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25">
                    </path>
                </svg> --}}
            </a>
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
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
