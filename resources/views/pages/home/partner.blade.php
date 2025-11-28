<x-wrapper id="technology">
    <x-container class="space-y-8">
        <x-sections.header>
            <x-sections.header.title value="mitra" />
            <x-sections.header.hr />
            <x-sections.header.description
                value="mitra yang telah mempercayai kami sebagai rekan dalam transformasi digital." />
        </x-sections.header>

        <div>
            <div x-data="{
                scrollSpeed: 1,
                animating: false,
                frame: null,
                startAutoScroll() {
                    const el = this.$refs.container;
                    if (!el.dataset.cloned) {
                        el.innerHTML += el.innerHTML;
                        el.dataset.cloned = true;
                    }
                    this.animating = true;
                    const step = () => {
                        if (!this.animating) return;
                        el.scrollLeft += this.scrollSpeed;
                        if (el.scrollLeft >= el.scrollWidth / 2) {
                            el.scrollLeft = 0;
                        }
                        this.frame = requestAnimationFrame(step);
                    };
                    this.frame = requestAnimationFrame(step);
                },
                stopAutoScroll() {
                    this.animating = false;
                    cancelAnimationFrame(this.frame);
                }
            }" x-init="startAutoScroll()" @mouseenter="stopAutoScroll()"
                @mouseleave="startAutoScroll()">
                <div x-ref="container" class="flex space-x-4 overflow-x-hidden pb-4 hide-scrollbar">
                    @foreach ($partner as $item)
                        <div
                            class="flex flex-none w-96 items-center rounded-xl bg-white shadow border-2 border-white hover:border-sky-500 transition duration-300 p-4">
                            <div class="flex items-center space-x-4 ">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                    alt="logo" class="w-24 h-24 object-cover">
                                <div>
                                    <h1 class="text-xl font-semibold text-slate-700">
                                        {{ $item->title ?? null }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div x-data="{
                scrollSpeed: 1,
                animating: false,
                frame: null,
                startAutoScroll() {
                    const el = this.$refs.container;
                    if (!el.dataset.cloned) {
                        el.innerHTML += el.innerHTML;
                        el.dataset.cloned = true;
                    }
                    this.animating = true;
                    const step = () => {
                        if (!this.animating) return;
                        el.scrollLeft -= this.scrollSpeed;
                        if (el.scrollLeft <= 0) {
                            el.scrollLeft = el.scrollWidth / 2;
                        }
                        this.frame = requestAnimationFrame(step);
                    };
                    this.frame = requestAnimationFrame(step);
                },
                stopAutoScroll() {
                    this.animating = false;
                    cancelAnimationFrame(this.frame);
                }
            }" x-init="startAutoScroll()" @mouseenter="stopAutoScroll()"
                @mouseleave="startAutoScroll()" class="overflow-hidden">
                <div x-ref="container" class="flex space-x-4 overflow-x-hidden pb-4 hide-scrollbar">
                    @foreach ($partner as $item)
                        <div
                            class="flex flex-none w-96 items-center rounded-xl bg-white shadow border-2 border-white hover:border-sky-500 transition duration-300 p-4">
                            <div class="flex items-center space-x-4 ">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/images/default-img.svg') }}"
                                    alt="logo" class="w-24 h-24 object-cover">
                                <div>
                                    <h1 class="text-xl font-semibold text-slate-700">
                                        {{ $item->title ?? null }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <x-sections.footer>
            <x-sections.footer.description value="temukan mitra terpercaya kami yang lainnya" />
            <x-sections.footer.link href="{{ route('index') }}" />
        </x-sections.footer> --}}
    </x-container>
</x-wrapper>
