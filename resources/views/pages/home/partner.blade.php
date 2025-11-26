<x-wrapper id="technology">
    <x-container class="space-y-8">
        <div class="space-y-2 text-center">
            <h1 class="text-3xl font-bold">
                {{ Str::title(__('mitra')) }}
            </h1>
            <div class="w-12 h-1 mx-auto rounded-full bg-sky-500"></div>
            <p class="text-slate-500">
                {{ Str::title(__('mitra yang telah mempercayai kami sebagai rekan dalam transformasi digital.')) }}
            </p>
        </div>

        <div>
            @php
                $technology = [
                    (object) [
                        'title' => 'bootstrap',
                        'file' => asset('/techicons/bootstrap.svg'),
                    ],
                    (object) [
                        'title' => 'codeigniter',
                        'file' => asset('/techicons/codeigniter.svg'),
                    ],
                    (object) [
                        'title' => 'css3',
                        'file' => asset('/techicons/css3.svg'),
                    ],
                    (object) [
                        'title' => 'gimp',
                        'file' => asset('/techicons/gimp.svg'),
                    ],
                    (object) [
                        'title' => 'git',
                        'file' => asset('/techicons/git.svg'),
                    ],
                    (object) [
                        'title' => 'github',
                        'file' => asset('/techicons/github.svg'),
                    ],
                    (object) [
                        'title' => 'html5',
                        'file' => asset('/techicons/html5.svg'),
                    ],
                    (object) [
                        'title' => 'inkscape',
                        'file' => asset('/techicons/inkscape.svg'),
                    ],
                    (object) [
                        'title' => 'javascript',
                        'file' => asset('/techicons/javascript.svg'),
                    ],
                    (object) [
                        'title' => 'laravel',
                        'file' => asset('/techicons/laravel.svg'),
                    ],
                    (object) [
                        'title' => 'linux',
                        'file' => asset('/techicons/linux.svg'),
                    ],
                    (object) [
                        'title' => 'livewire',
                        'file' => asset('/techicons/livewire.svg'),
                    ],
                    (object) [
                        'title' => 'mysql',
                        'file' => asset('/techicons/mysql.svg'),
                    ],
                    (object) [
                        'title' => 'php',
                        'file' => asset('/techicons/php.svg'),
                    ],
                    (object) [
                        'title' => 'postgressql',
                        'file' => asset('/techicons/postgressql.svg'),
                    ],
                    (object) [
                        'title' => 'tailwindcss',
                        'file' => asset('/techicons/tailwindcss.svg'),
                    ],
                    (object) [
                        'title' => 'ubuntu',
                        'file' => asset('/techicons/ubuntu.svg'),
                    ],
                    (object) [
                        'title' => 'vue',
                        'file' => asset('/techicons/vue.svg'),
                    ],
                ];
            @endphp
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
                    @foreach ($technology as $item)
                        <div
                            class="flex flex-none w-96 items-center rounded-xl bg-white shadow border-2 border-white hover:border-sky-500 transition duration-300 p-4">
                            <div class="flex items-center space-x-4 ">
                                <img src="{{ $item->file }}" alt="logo" class="w-24 h-24 object-cover">
                                <div>
                                    <h1 class="text-xl font-semibold text-slate-700">
                                        {{ $item->title }}
                                    </h1>
                                    <h3 class="text-slate-500">
                                        {{ $item->title }}
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
                            class="flex flex-none w-96 items-center rounded-xl bg-white shadow border-2 border-white hover:border-sky-500 transition duration-300 p-4">
                            <div class="flex items-center space-x-4 ">
                                <img src="{{ $item->file }}" alt="logo" class="w-24 h-24 object-cover">
                                <div>
                                    <h1 class="text-xl font-semibold text-slate-700">
                                        {{ $item->title }}
                                    </h1>
                                    <h3 class="text-slate-500">
                                        {{ $item->title }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>
</x-wrapper>
