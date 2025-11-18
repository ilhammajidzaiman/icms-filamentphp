<x-wrapper id="people" class="py-16">
    <x-container class="space-y-8">
        <div class="text-center space-y-4">
            <h1 class="text-4xl font-bold text-slate-700">
                {{ Str::title(__('tim')) }}
            </h1>
            <div class="w-12 h-0.5 bg-sky-500 mx-auto"></div>
            <p class="text-slate-500">
                {{ Str::title(__('tim kami yang sangat kompeten dibidangnya dalam pengambangan aplikasi')) }}
            </p>
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
        @if ($people->isNotEmpty())
            <div x-data="{
                scrollLeft() {
                        const el = $refs.scrollContainer;
                        if (el.scrollLeft <= 0) {
                            const maxScroll = el.scrollWidth - el.clientWidth;
                            el.scrollTo({ left: maxScroll, behavior: 'smooth' });
                        } else {
                            el.scrollBy({ left: -300, behavior: 'smooth' });
                        }
                    },
                    scrollRight() {
                        const el = $refs.scrollContainer;
                        const maxScroll = el.scrollWidth - el.clientWidth;
                        if (Math.ceil(el.scrollLeft) >= maxScroll) {
                            el.scrollTo({ left: 0, behavior: 'smooth' });
                        } else {
                            el.scrollBy({ left: 300, behavior: 'smooth' });
                        }
                    }
            }" class="relative w-full shadow rounded-xl p-4 bg-slate-200 border">
                <div x-ref="scrollContainer"
                    class="flex space-x-4 overflow-x-auto mx-10 hide-scrollbar scroll-smooth border">
                    @foreach ($people as $item)
                        {{-- <div class="w-72 overflow-hidden rounded-xl shadow">
                            <div class="relative">
                                <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                    alt="profile" class="w-full h-72 object-cover">
                                <div class="absolute bottom-4 left-0 pr-4">
                                    <div class="bg-white/50 bg-opacity-90 p-4 rounded-r-xl">
                                        <h3 class="text-xl font-bold">
                                            {{ $item->name ?? null }}
                                            {{ $item->name ?? null }}
                                        </h3>
                                        <p class="text-sm">
                                            {{ $item->position->title ?? null }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="flex-none w-72 rounded-xl bg-white p-4 text-center shadow space-y-4 border">
                            <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                alt="image" class="aspect-square w-44 h-44 mx-auto rounded-full object-cover border">
                            <h1 class="text-lg font-semibold border">
                                {{ $item->name ?? null }}
                            </h1>
                            <h3 class="text-sm border">
                                {{ $item->position->title ?? null }}
                            </h3>
                        </div>
                    @endforeach
                </div>
                <button @click="scrollLeft()"
                    class="absolute z-10 left-0 top-1/2 -translate-y-1/2 hover:bg-slate-50 bg-white rounded-xl shadow p-2 m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button @click="scrollRight()"
                    class="absolute z-10 right-0 top-1/2 -translate-y-1/2 hover:bg-slate-50 bg-white rounded-xl shadow p-2 m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
