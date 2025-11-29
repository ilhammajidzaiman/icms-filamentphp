@php
    use App\Models\Site\Page;
    use App\Models\Post\BlogArticle;
    use App\Models\Post\BlogCategory;
@endphp
<header x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 1 })" :class="scrolled ? 'bg-white shadow' : 'bg-transparent'"
    class="w-full fixed top-0 left-0 z-50 transition-all duration-500">
    <nav aria-label="Global" class="mx-auto max-w-7xl p-4">
        <div class="flex flex-row w-full gap-4">
            <div class="flex sm:flex-1">
                <div class="h-full flex items-center justify-start">
                    <a wire:navigate href="{{ route('index') }}" class="h-full inline-flex items-center gap-4">
                        <img src="{{ $siteSetting->logo ? asset('storage/' . $siteSetting->logo) : asset('/images/laravel.svg') }}"
                            alt="logo" class="h-10 w-auto" />
                        <div class="hidden sm:block">
                            <h1 class="font-bold">
                                {{ $siteSetting->name ? $siteSetting->name : env('APP_NAME') }}
                            </h1>
                            <h3 class="text-xs">
                                {{ $siteSetting->tagline ? $siteSetting->tagline : env('APP_NAME') }}
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="hidden lg:flex">
                <div class="h-full w-md flex overflow-x-auto items-center justify-center hide-scrollbar">
                    <el-popover-group class="flex flex-row gap-4 items-center justify-center whitespace-nowrap">
                        @foreach ($navigationMenu as $parent)
                            @php
                                if ($parent->modelable_type === BlogCategory::class):
                                    $urlParent = route('category.show', $parent->category->slug);
                                elseif ($parent->modelable_type === BlogArticle::class):
                                    $urlParent = route('article.show', $parent->article->slug);
                                elseif ($parent->modelable_type === Page::class):
                                    $urlParent = route('page.show', $parent->page->slug);
                                endif;
                            @endphp
                            @if (count($parent->children) > 0)
                                <div class="relative">
                                    <button popovertarget="desktop-menu-{{ $parent->id ?? null }}"
                                        class="group flex items-center gap-x-1 hover:text-sky-700 transition duration-200 ease-in-out rounded-xl">
                                        <span class="relative">
                                            {{ $parent->title ?? null }}
                                            <span
                                                class="absolute left-1/2 -bottom-1 w-10 h-1 bg-sky-700 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center">
                                            </span>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-4 flex-none group-hover:text-sky-800 transition duration-200 ease-in-out">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                    <el-popover id="desktop-menu-{{ $parent->id ?? null }}" anchor="bottom" popover
                                        class="w-screen max-w-64 overflow-hidden rounded-xl bg-white text-slate-600 shadow divide-y divide-slate-200 transition transition-discrete [--anchor-gap:--spacing(3)] backdrop:bg-transparent open:block data-closed:translate-y-1 data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in">
                                        @foreach ($parent->children as $child)
                                            @php
                                                if ($child->modelable_type === BlogCategory::class):
                                                    $urlChild = route('category.show', $child->category->slug);
                                                elseif ($child->modelable_type === BlogArticle::class):
                                                    $urlChild = route('article.show', $chil->article->slug);
                                                elseif ($child->modelable_type === Page::class):
                                                    $urlChild = route('page.show', $child->page->slug);
                                                endif;
                                            @endphp
                                            <div class="hover:bg-slate-100 px-4 py-2">
                                                <a wire:navigate href="{{ $urlChild ?? null }}"
                                                    class="hover:text-sky-800">
                                                    {{ $child->title ?? null }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </el-popover>
                                </div>
                            @else
                                <a wire:navigate href="{ $urlParent ?? null }}"
                                    class="relative rounded-xl transition duration-200 ease-in-out hover:text-sky-700 group">
                                    {{ $parent->title ?? null }}
                                    <span
                                        class="absolute left-1/2 -bottom-1 w-10 h-1 bg-sky-600 rounded-full -translate-x-1/2 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
                                </a>
                            @endif
                        @endforeach
                    </el-popover-group>
                </div>
            </div>
            <div class="flex-1">
                <div class="h-full flex items-center justify-end gap-4">
                    <livewire:search-global />
                    <div class="flex lg:hidden">
                        <button type="button" command="show-modal" commandfor="mobile-menu"
                            class="inline-flex items-center justify-center rounded-xl bg-white border border-slate-200 p-2">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                data-slot="icon" aria-hidden="true" class="size-6 text-slate-500">
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden text-slate-600">
            <div tabindex="0" class="fixed inset-0 focus:outline-none">
                <el-dialog-panel class="fixed right-0 z-50 w-full">
                    <div class="h-screen min-h-0 flex flex-col bg-slate-100 shadow">
                        <div class="min-h-0 flex flex-col flex-1  space-y-4 p-4">
                            <div class="flex items-center justify-between">
                                <a wire:navigate href="{{ route('index') }}"
                                    class="h-full inline-flex items-center gap-4">
                                    <img src="{{ $siteSetting->logo ? asset('storage/' . $siteSetting->logo) : asset('/images/laravel.svg') }}"
                                        alt="logo" class="h-10 w-auto" />
                                    <div>
                                        <h1 class="font-bold">
                                            {{ $siteSetting->name ? $siteSetting->name : env('APP_NAME') }}
                                        </h1>
                                        <h3 class="text-xs">
                                            {{ $siteSetting->tagline ? $siteSetting->tagline : env('APP_NAME') }}
                                        </h3>
                                    </div>
                                </a>
                                <button type="button" command="close" commandfor="mobile-menu"
                                    class="bg-white rounded-xl border border-slate-200 p-2">
                                    <span class="sr-only">Close menu</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        class="size-6 text-slate-500">
                                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-1 rounded-xl overflow-hidden">
                                <div class="h-full bg-white shadow overflow-y-auto divide-y divide-slate-100">
                                    @foreach ($navigationMenu as $parent)
                                        @php
                                            if ($parent->modelable_type === BlogCategory::class):
                                                $urlParent = route('category.show', $parent->category->slug);
                                            elseif ($parent->modelable_type === BlogArticle::class):
                                                $urlParent = route('article.show', $parent->article->slug);
                                            elseif ($parent->modelable_type === Page::class):
                                                $urlParent = route('page.show', $parent->page->slug);
                                            endif;
                                        @endphp
                                        @if (count($parent->children) > 0)
                                            <div class="">
                                                <button type="button" command="--toggle"
                                                    commandfor="mobile-menu-{{ $parent->id ?? null }}"
                                                    class="px-4 py-2 hover:underline flex w-full items-center justify-between ">
                                                    {{ $parent->title ?? null }}
                                                    <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon"
                                                        aria-hidden="true"
                                                        class="size-6 flex-none in-aria-expanded:rotate-180">
                                                        <path
                                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                            clip-rule="evenodd" fill-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <el-disclosure id="mobile-menu-{{ $parent->id ?? null }}" hidden
                                                    class="space-y-2">
                                                    <div
                                                        class="bg-slate-50 divide-y divide-slate-200 rounded-xl mx-4 mb-4">
                                                        @foreach ($parent->children as $child)
                                                            @php
                                                                if ($child->modelable_type === BlogCategory::class):
                                                                    $urlChild = route(
                                                                        'category.show',
                                                                        $child->category->slug,
                                                                    );
                                                                elseif ($child->modelable_type === BlogArticle::class):
                                                                    $urlChild = route(
                                                                        'article.show',
                                                                        $chil->article->slug,
                                                                    );
                                                                elseif ($child->modelable_type === Page::class):
                                                                    $urlChild = route('page.show', $child->page->slug);
                                                                endif;
                                                            @endphp
                                                            <div class="flex items-center pl-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="size-4">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                                                </svg>
                                                                <a wire:navigate href="{{ $urlChild ?? null }}"
                                                                    class="block px-4 py-2 hover:underline">
                                                                    {{ $child->title ?? null }}
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </el-disclosure>
                                            </div>
                                        @else
                                            <a wire:navigate href="{{ $urlParent ?? null }}"
                                                class="block px-4 py-2  hover:underline">
                                                {{ $parent->title ?? null }}
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>
</header>
