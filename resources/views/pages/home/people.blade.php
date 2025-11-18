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
                scrollAmount: 350,
                scrollLeft() {
                    const s = this.$refs.scroller;
                    s.scrollBy({ left: -this.scrollAmount, behavior: 'smooth' });
                    setTimeout(() => {
                        if (s.scrollLeft <= 0) {
                            s.scrollLeft = s.scrollWidth;
                        }
                    }, 300);
                },
                scrollRight() {
                    const s = this.$refs.scroller;
                    s.scrollBy({ left: this.scrollAmount, behavior: 'smooth' });
                    setTimeout(() => {
                        if (s.scrollLeft + s.clientWidth >= s.scrollWidth - 5) {
                            s.scrollLeft = 0;
                        }
                    }, 300);
                }
            }" class="relative">
                <div x-ref="scroller"
                    class="flex gap-4 overflow-x-scroll scrollbar-hide scroll-smooth snap-x snap-mandatory hide-scrollbar">
                    @foreach ($people as $item)
                        <div
                            class="relative flex-none aspect-3/4 w-72 overflow-hidden rounded-xl shadow snap-center snap-always">
                            <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                alt="image" class="aspect-3/4 w-full h-full object-cover">
                            <div class="absolute bottom-4 left-0 pr-4">
                                <div
                                    class="bg-slate-500/50 backdrop-blur-xs p-4 rounded-r-xl text-white text-shadow-md">
                                    <h3 class="text-xl font-bold">
                                        {{ $item->name ?? null }}
                                    </h3>
                                    <p class="text-sm">
                                        {{ $item->position->title ?? null }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button @click="scrollLeft()"
                    class="absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-white/50 hover:bg-white/80 rounded-xl shadow p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </button>
                <button @click="scrollRight()"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-white/50 hover:bg-white/80 rounded-xl shadow p-2">
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
