<div class="relative w-full md:w-80" x-data="{ open: false }" @click.outside="open = false">
    <div class="relative">
        <input type="text" wire:model.live="keyword" placeholder="{{ Str::ucfirst(__('mau cari berita apa?')) }}"
            @focus="open = true"
            class="w-full border border-slate-500 rounded-lg pl-10 pr-3 py-2 focus:outline-none focus:ring-1 focus:ring-sky-500 bg-white/20 backdrop-blur-xs  placeholder-slate-200">
        <button type="button" class="absolute inset-y-0 left-0 flex items-center pl-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
    </div>
    @if (strlen($keyword) > 2)
        <div x-show="open" x-transition
            class="w-auto md:w-2xl absolute right-0 mt-2 bg-white rounded-xl shadow overflow-hidden z-50">
            <div class="max-h-96 divide-y divide-slate-200 overflow-y-auto">
                <h1 class="text-sky-500 text-left font-bold px-4 py-3 bg-slate-100">
                    <a wire:navigate href="{{ route('article.index') }}" title="berita" class="hover:underline">
                        {{ Str::ucfirst(__('berita')) }}
                    </a>
                </h1>
                @if ($article && count($article))
                    @foreach ($article as $item)
                        <div wire:click="goToArticle('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full text-left hover:bg-slate-100 px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <div class="flex-auto space-y-2">
                                    <h1 class="line-clamp-2">
                                        <a wire:navigate {{ $item->slug ? route('article.show', $item->slug) : null }}"
                                            title="{{ $item->title ?? null }}" class="hover:underline">
                                            {{ $item->title ?? null }}
                                        </a>
                                    </h1>
                                    <h6 class="text-slate-500 text-xs line-clamp-1">
                                        {{ $item->published_at ? $item->formatDayDate($item->published_at) : null }}
                                    </h6>
                                </div>
                                <div class="flex-none">
                                    <div class="aspect-square h-20 overflow-hidden rounded-xl">
                                        <img src="{{ $item->file ? Storage::url($item->file) : asset('/image/default-img.svg') }}"
                                            alt="image"
                                            class="bg-slate-200 w-full h-full object-cover transition duration-300 ease-in-out hover:scale-110">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="px-4 py-3 text-slate-400">{{ Str::ucfirst(__('tidak ditemukan')) }}</p>
                @endif
                <h1 class="text-sky-500 text-left font-bold px-4 py-3 bg-slate-100">
                    <a wire:navigate href="{{ route('article.index') }}" title="berita" class="hover:underline">
                        {{ Str::ucfirst(__('kategori')) }}
                    </a>
                </h1>
                @if ($category && count($category))
                    @foreach ($category as $item)
                        <div wire:click="goToCategory('{{ $item->slug ?? null }}')" @click="open = false"
                            class="w-full text-left hover:bg-slate-100 px-4 py-2">
                            <h1 class="line-clamp-2">
                                <a wire:navigate href="{{ route('category.show', $item->slug) }}"
                                    title="{{ $item->title ?? null }}" class="hover:underline">
                                    {{ $item->title ?? null }}
                                </a>
                            </h1>
                        </div>
                    @endforeach
                @else
                    <p class="px-4 py-3 text-slate-400">{{ Str::ucfirst(__('tidak ditemukan')) }}</p>
                @endif
            </div>
        </div>
    @endif
</div>
