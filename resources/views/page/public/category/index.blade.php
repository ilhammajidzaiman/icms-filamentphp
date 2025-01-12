<x-public.app-layout>
    <section class="container pt-2">
        <div class="row g-3 justify-content-center mt-5 pt-5">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Kategori
                    </li>
                </ul>
                <h3 class="fs-3 mb-4">
                    <a wire:navigate.hover href="{{ route('category.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Kategori
                    </a>
                </h3>
                <ul class="list-group list-group-flush">
                    @if ($category->isEmpty())
                        <li class="list-group-item">
                            <h5 class="text-danger">
                                Not found!
                            </h5>
                        </li>
                    @else
                        @foreach ($category as $item)
                            <li class="list-group-item px-0">
                                <h5>
                                    <a href="{{ route('category.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->title }}
                                    </a>
                                    <span class="badge text-bg-primary rounded-pill">
                                        {{ $item->blogArticles->count() }}
                                    </span>
                                </h5>
                                <small class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}
                                </small>
                            </li>
                        @endforeach
                        <div class="row mt-4">
                            <div class="col-12">
                                <x-public.pagination>
                                    <x-public.pagination.current wire="wire:navigate.hover"
                                        href=" {{ $category->currentPage() }} / {{ $category->lastPage() }}" />
                                    <x-public.pagination.previous wire="wire:navigate.hover"
                                        href="{{ $category->previousPageUrl() }}" />
                                    <x-public.pagination.next wire="wire:navigate.hover"
                                        href="{{ $category->nextPageUrl() }}" />
                                </x-public.pagination>
                            </div>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </section>
</x-public.app-layout>
