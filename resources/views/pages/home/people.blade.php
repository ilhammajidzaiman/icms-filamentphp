<x-wrapper id="people" class="py-16">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="tim" />
            <x-sections.header.hr />
            <x-sections.header.description
                value="tim kami yang sangat kompeten dibidangnya dalam pengambangan aplikasi" />
        </x-sections.header>
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
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
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
            <x-sections.footer>
                {{-- <x-sections.footer.description value="lihat tim kami yang lainnya" /> --}}
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
