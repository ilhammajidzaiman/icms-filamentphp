<x-wrapper id="file" class="py-16">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="file" />
            <x-sections.header.hr />
        </x-sections.header>


        @if ($file->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                @foreach ($file as $item)
                    <div class="flex items-center  bg-white overflow-hidden shadow rounded-xl hover:shadow-md">
                        <div
                            class="aspect-3/4 w-32 flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                alt="image"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                        <div class="space-y-2 p-4">
                            <h3 class="text-slate-400 text-sm line-clamp-1">
                                {{ $item->created_at ? $item->formatDayDate($item->published_at) : null }}
                            </h3>
                            <h1 class="line-clamp-2">
                                {{ $item->title ?? null }}
                            </h1>
                            <div class="flex justify-start">
                                <a wire:navigate href=""
                                    class="inline-flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-xl bg-white hover:bg-sky-950 hover:text-white transition line-clamp-1">
                                    {{ Str::title(__('selengkapnya')) }}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <x-sections.footer>
                {{-- <x-sections.footer.description value="lihat file lainnya" /> --}}
                <x-sections.footer.link href="{{ route('index') }}" />
            </x-sections.footer>
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
