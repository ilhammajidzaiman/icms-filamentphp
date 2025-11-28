<x-wrapper id="carousel">
    <x-container>
        @if ($carousel->isNotEmpty())
            <div x-data="{
                active: 0,
                total: {{ count($carousel) }},
                timer: null,

                next() {
                    this.active = (this.active + 1) % this.total
                    this.restart()
                },
                prev() {
                    this.active = (this.active - 1 + this.total) % this.total
                    this.restart()
                },
                goTo(index) {
                    this.active = index
                    this.restart()
                },
                restart() {
                    clearInterval(this.timer)
                    this.timer = setInterval(() => this.next(), 4000)
                },
                init() {
                    this.timer = setInterval(() => this.next(), 4000)
                }
            }"
                class="relative w-full aspect-square md:aspect-video overflow-hidden rounded-xl shadow-md space-y-16">

                @foreach ($carousel as $index => $item)
                    <div x-show="active === {{ $index }}" x-cloak
                        x-transition:enter="transition-opacity duration-700 ease-in" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity duration-700 ease-out"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="absolute inset-0 w-full h-full">
                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                            alt="image" class="w-full h-full object-cover rounded-xl">
                        <div
                            class="absolute bottom-0 left-0 right-0 flex flex-col items-center justify-center bg-linear-to-t from-slate-950/50 to-transparent pb-4">
                            <div class="space-y-2 text-white text-shadow-md text-center p-4">
                                <h1 class="line-clamp-1 text-xl font-bold">
                                    {{ $item->title }}
                                </h1>
                                <h3 class="line-clamp-2">
                                    {{ $item->description }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="hidden md:block">
                    <button @click="prev"
                        class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/50 hover:bg-white/80 rounded-xl shadow p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button @click="next"
                        class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/50 hover:bg-white/80 rounded-xl shadow p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
                <div class="flex absolute bottom-2 left-0 right-0 justify-center gap-2">
                    @foreach ($carousel as $index => $_)
                        <button @click="goTo({{ $index }})"
                            :class="active === {{ $index }} ? 'bg-white' : 'bg-white/40'"
                            class="w-3 h-3 rounded-full transition-all duration-300">
                        </button>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center p-4">
                <img src="{{ asset('transfer-files-bro.svg') }}" alt="image" class="w-auto h-64 mx-auto">
                <h1 class="text-xl">Data tidak ditemukan.</h1>
            </div>
        @endif
    </x-container>
</x-wrapper>
