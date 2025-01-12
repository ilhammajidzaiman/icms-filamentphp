<x-public.app-layout>
    <section class="container pt-2">
        <div class="row g-3 mt-5 pt-5">
            <div class="col-12">
                <ul class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('category.index') }}">
                            Kategori
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ Str::limit(strip_tags($item->title), 50, '...') }}
                    </li>
                </ul>
                <h3 class="fs-3 mb-4">
                    <a wire:navigate.hover href="{{ route('category.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Kategori
                    </a>
                </h3>
                @if ($blogArticle->isEmpty())
                    <div class="row g-3 justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row g-3">
                        @foreach ($blogArticle as $item)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card bg-transparent border-0">
                                    <a wire:navigate.hover href="{{ route('article.show', $item->slug) }}">
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
                                        <a wire:navigate.hover href="{{ route('article.show', $item->slug) }}"
                                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <x-public.pagination>
                                <x-public.pagination.current wire="wire:navigate.hover"
                                    href=" {{ $blogArticle->currentPage() }} / {{ $blogArticle->lastPage() }}" />
                                <x-public.pagination.previous wire="wire:navigate.hover"
                                    href="{{ $blogArticle->previousPageUrl() }}" />
                                <x-public.pagination.next wire="wire:navigate.hover"
                                    href="{{ $blogArticle->nextPageUrl() }}" />
                            </x-public.pagination>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-public.app-layout>
