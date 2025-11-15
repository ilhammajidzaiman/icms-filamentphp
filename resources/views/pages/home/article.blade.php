<x-wrapper id="article" class="py-16">
    <x-container class="space-y-8">

        <div class="text-center space-y-4">
            <h1 class="text-4xl font-bold text-slate-700">
                {{ Str::title(__('artikel')) }}
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


        @if ($article->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($article as $item)
                    <div class="bg-white rounded-xl overflow-hidden shadow">
                        <div class="relative aspect-video overflow-hidden">
                            <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
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
            {{-- <div class="w-full grid grid-cols-12 gap-4 space-y-4">
                @foreach ($article as $item)
                    <div class="w-full col-span-6 md:col-span-3">
                        <div class="w-full rounded-xl gap-4">
                            <div class="flex flex-col space-y-2">
                                <div class="aspect-video overflow-hidden rounded-xl">
                                    <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                        alt="image"
                                        class="bg-slate-200 w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                </div>
                                <a wire:navigate
                                    href="{{ $item->category->slug ? route('category.show', $item->category->slug) : null }}"
                                    class="w-fit rounded-lg bg-sky-500 text-white text-xs font-normal line-clamp-1 px-2 py-1 hover:underline">
                                    {{ $item->category->title ?? null }}
                                </a>
                                <a wire:navigate href="{{ $item->slug ? route('article.show', $item->slug) : null }}"
                                    class="hover:underline line-clamp-2">
                                    {{ $item->title ?? null }}
                                </a>
                                <h6 class="text-slate-500 text-sm line-clamp-1">
                                    {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
