<x-wrapper id="article" class="py-16">
    <x-container class="space-y-8">
        <div class="space-y-2 text-center">
            <h1 class="text-3xl font-bold">
                {{ Str::title(__('artikel')) }}
            </h1>
            <div class="w-12 h-1 mx-auto rounded-full bg-sky-500"></div>
        </div>

        @if ($article->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($article as $item)
                    <div class="bg-white rounded-xl overflow-hidden shadow">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/image/default-img.svg') }}"
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
            <div class="space-y-2 text-center">
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
