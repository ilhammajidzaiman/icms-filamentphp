<x-public.app-layout title="{{ Str::headline(__('page')) }}">
    <x-public.section>
        <x-public.row class="justify-content-between">
            <x-public.col>
                <x-public.breadcrumb>
                    <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
                    <x-public.breadcrumb.link href="{{ route('category.index') }}"
                        value="{{ Str::headline(__('kategori')) }}" />
                    @if ($category)
                        <x-public.breadcrumb.item
                            value="{{ Str::limit(strip_tags($category->title ?? null), 50, '...') }}" />
                    @endif
                </x-public.breadcrumb>
                <x-public.heading.link.h3 href="{{ route('category.index') }}"
                    value="{{ Str::headline(__('kategori')) }}" />
                @livewire('public.search.search-input')
                @if ($article->isEmpty())
                    <x-public.empty-record />
                @else
                    <x-public.row>
                        @foreach ($article as $item)
                            <x-public.col class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card bg-transparent border-0">
                                    <a href="{{ route('article.show', $item->slug) }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            alt="image {{ $item->title }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-2">
                                        <a href="{{ route('category.show', $item->blogCategory->slug) }}"
                                            class="badge bg-primary-subtle link-primary rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ $item->blogCategory->title }}
                                        </a>
                                        <div>
                                            <small class="text-secondary">
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                        <a href="{{ route('article.show', $item->slug) }}"
                                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </a>
                                    </div>
                                </div>
                            </x-public.col>
                        @endforeach
                    </x-public.row>
                    <x-public.row class="mt-4">
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
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
