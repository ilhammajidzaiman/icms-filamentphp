<x-wrapper id="article" class="py-16">
    <x-container class="space-y-8">
        <div class="space-y-2 text-center">
            <h1 class="text-3xl font-bold">
                {{ Str::title(__('layanan')) }}
            </h1>
            <div class="w-12 h-1 mx-auto rounded-full bg-sky-500"></div>
        </div>
        @if ($article->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
                @foreach ($service as $item)
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg p-8 flex flex-col justify-between">
                        <div class="space-y-4 flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="16" height="16"
                                fill="currentColor" class="size-6 w-20 h-20 fill-sky-500 bg-slate-200 rounded-xl p-4">
                                <path
                                    d="M279.6 31C265.5 11.5 242.9 0 218.9 0 177.5 0 144 33.5 144 74.9l0 2.4c0 64.4 82 133.4 122.2 163.3 13 9.7 30.5 9.7 43.5 0 40.2-30 122.2-98.9 122.2-163.3l0-2.4c0-41.4-33.5-74.9-74.9-74.9-24 0-46.6 11.5-60.7 31L288 42.7 279.6 31zM109.3 341.5L66.7 384 32 384c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l320.5 0c29 0 57.3-9.3 80.7-26.5l126.6-93.3c17.8-13.1 21.6-38.1 8.5-55.9s-38.1-21.6-55.9-8.5L392.6 416 280 416c-13.3 0-24-10.7-24-24s10.7-24 24-24l72 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-152.2 0c-33.9 0-66.5 13.5-90.5 37.5z" />
                            </svg>
                            <h1 class="text-2xl font-semibold">
                                <a wire:navigate href="{{ $item->slug ? route('article.show', $item->slug) : null }}"
                                    class="hover:underline">
                                    {{ $item->title ?? null }}
                                </a>
                            </h1>
                            <p class="text-gray-600 line-clamp-6">
                                {{ $item->description ?? null }}
                            </p>
                        </div>
                        <div class="aspect-video overflow-hidden rounded-xl mt-4">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/image/default-img.svg') }}"
                                alt="image"
                                class="bg-slate-200 w-full h-full object-cover transition-all duration-300 ease-in-out hover:scale-110">
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="space-y-2 text-center">
                <p>{{ Str::ucfirst(__('temukan layanan kami yang lainnya')) }}</p>
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
