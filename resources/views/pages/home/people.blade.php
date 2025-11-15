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
            }" class="relative w-full shadow rounded-xl p-4 bg-slate-200">
                <div x-ref="scrollContainer" class="flex space-x-4 overflow-x-auto mx-10 hide-scrollbar scroll-smooth">
                    @foreach ($people as $item)
                        <div class="flex-none w-72 rounded-xl bg-white p-12 text-center shadow space-y-2">
                            <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                alt="image" class="aspect-square w-48 h-48 mx-auto rounded-full object-cover">
                            <h1 class="text-lg font-semibold">
                                {{ $item->name ?? null }}
                            </h1>
                            <h3 class="text-sm">
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
