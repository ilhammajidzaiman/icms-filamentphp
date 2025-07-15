<x-public.app-layout title="{{ Str::headline(__($category->title ?? null)) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.link href="{{ route('category.index') }}" value="{{ Str::headline(__('kategori')) }}" />
            @if ($category)
                <x-public.breadcrumb.item value="{{ Str::limit(strip_tags($category->title ?? null), 50, '...') }}" />
            @endif
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('category.index') }}"
            value="{{ Str::headline(__('kategori')) }} {{ $category->title ?? null }}" />
        @livewire('public.search.search-input')
        @if ($article->isEmpty())
            <x-public.empty-record />
        @else
            <x-public.row>
                @foreach ($article as $item)
                    <x-public.col class="col-sm-6 col-md-4 col-lg-3">
                        <x-public.card>
                            <x-public.link href="{{ route('article.show', $item->slug) }}">
                                <x-public.card.image
                                    src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    class="vh-20" />
                            </x-public.link>
                            <x-public.card.body>
                                <x-public.link href="{{ route('article.show', $item->slug) }}">
                                    <x-public.badge class="bg-secondary">
                                        {{ $item->blogCategory->title }}
                                    </x-public.badge>
                                </x-public.link>
                                <x-public.card.text class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                </x-public.card.text>
                                <x-public.card.text>
                                    <x-public.link href="{{ route('article.show', $item->slug) }}">
                                        {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                    </x-public.link>
                                </x-public.card.text>
                            </x-public.card.body>
                        </x-public.card>
                    </x-public.col>
                @endforeach
            </x-public.row>
            <x-public.row>
                <x-public.col>
                    <x-public.pagination>
                        <x-public.pagination.current
                            href=" {{ $article->currentPage() }} / {{ $article->lastPage() }}" />
                        <x-public.pagination.previous href="{{ $article->previousPageUrl() }}" />
                        <x-public.pagination.next href="{{ $article->nextPageUrl() }}" />
                    </x-public.pagination>
                </x-public.col>
            </x-public.row>
        @endif
    </x-public.section>
</x-public.app-layout>
