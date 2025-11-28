<x-wrapper id="technology">
    <x-container>
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
        }" x-init="startAutoScroll()" @mouseenter="stopAutoScroll()" @mouseleave="startAutoScroll()">
            <div x-ref="container" class="flex space-x-4 overflow-x-hidden pb-4 hide-scrollbar">
                @foreach ($technology as $item)
                    <div
                        class="flex flex-none w-72 items-center rounded-xl bg-white shadow border-2 border-white hover:border-sky-500 transition duration-300 grayscale hover:grayscale-0 p-4">
                        <div class="flex items-center space-x-4 ">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/image/default-img.svg') }}"
                                alt="logo" class="w-16 h-16 rounded-lg object-cover">
                            <div>
                                <h1 class="text-xl font-semibold text-slate-700">
                                    {{ $item->title ?? null }}
                                </h1>
                                <h3 class="text-slate-500">
                                    {{ $item->description ?? null }}
                                </h3>
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
                @foreach ($technology as $item)
                    <div
                        class="flex flex-none w-72 items-center rounded-xl bg-white shadow border-2 border-white hover:border-sky-500 transition duration-300 grayscale hover:grayscale-0 p-4">
                        <div class="flex items-center space-x-4 ">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('/image/default-img.svg') }}"
                                alt="logo" class="w-16 h-16 rounded-lg object-cover">
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
    </x-container>
</x-wrapper>
