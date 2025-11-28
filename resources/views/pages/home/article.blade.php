<x-wrapper id="article" class="py-16">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="artikel" />
            <x-sections.header.hr />
        </x-sections.header>

        @if ($article->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($article as $item)
                    <div class="bg-white rounded-xl overflow-hidden shadow">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                alt="image"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                            <h3 class="absolute left-0 bottom-4 ">
                                <a wire:navigate
                                    href="{{ $item->category->slug ? route('category.show', $item->category->slug) : null }}"
                                    class="flex items-center text-white text-shadow-xs bg-sky-500/50 backdrop-blur-xs px-4 py-1 rounded-r-lg hover:underline ">
                                    <div class="line-clamp-1">
                                        {{ $item->category->title ?? null }}
                                    </div>
                                </a>
                            </h3>
                        </div>
                        <div class="space-y-2 p-4">
                            <h1 class="line-clamp-3">
                                <a wire:navigate href="{{ $item->slug ? route('article.show', $item->slug) : null }}"
                                    class="hover:underline">
                                    {{ $item->title ?? null }}
                                </a>
                            </h1>
                            <h6 class="text-slate-500 text-sm line-clamp-1">
                                {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                            </h6>
                        </div>
                    </div>
                @endforeach
            </div>
            <x-sections.footer>
                {{-- <x-sections.footer.description value="temukan layanan kami yang lainnya" /> --}}
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
