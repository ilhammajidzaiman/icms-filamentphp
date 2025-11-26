<x-wrapper id="file" class="py-16">
    <x-container class="space-y-8">
        <div class="space-y-2 text-center">
            <h1 class="text-3xl font-bold">
                {{ Str::title(__('file')) }}
            </h1>
            <div class="w-12 h-1 mx-auto rounded-full bg-sky-500"></div>
        </div>
        @if ($file->isNotEmpty())
            <section class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6">
                @foreach ($file as $item)
                    <div class="overflow-hidden flex items-center shadow rounded-xl bg-white hover:shadow-md">

                        <div
                            class="aspect-3/4 w-32 flex items-center justify-center overflow-hidden rounded-xl shrink-0 bg-slate-200">
                            <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                alt="image"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                        <div class="space-y-2 p-4">
                            <h3 class="text-slate-500 text-normal line-clamp-1">
                                {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                            </h3>
                            <h1 class="text-slate-500 text-lg font-medium line-clamp-2">
                                {{ $item->title ?? null }}
                            </h1>
                            <div class="flex justify-start">
                                <a wire:navigate href=""
                                    class="inline-flex items-center gap-2 px-3 py-1 border border-slate-200 rounded-xl text-slate-700 bg-white hover:bg-sky-500 hover:text-white transition line-clamp-1">
                                    Selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
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
            </div> --}}
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
