<x-public.app-layout title="{{ Str::headline(__('kategori')) }}">
    <x-public.section>
        <x-public.row class="justify-content-between">
            <x-public.col>
                <x-public.breadcrumb>
                    <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
                    <x-public.breadcrumb.link href="{{ route('category.index') }}"
                        value="{{ Str::headline(__('kategori')) }}" />
                </x-public.breadcrumb>
                <x-public.heading.link.h3 href="{{ route('category.index') }}"
                    value="{{ Str::headline(__('kategori')) }}" />
                @livewire('public.search.search-input')
                @if ($category->isEmpty())
                    <x-public.empty-record />
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($category as $item)
                            <li class="list-group-item px-0">
                                <h5>
                                    <a href="{{ route('category.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->title }}
                                    </a>
                                    <x-public.badge.item value="{{ $item->blogArticles->count() ?? null }}"
                                        class="text-bg-primary" />
                                </h5>
                                <small class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}
                                </small>
                            </li>
                        @endforeach
                    </ul>
                    <x-public.row class="mt-4">
                        <x-public.col>
                            <x-public.pagination>
                                <x-public.pagination.current
                                    href=" {{ $category->currentPage() }} / {{ $category->lastPage() }}" />
                                <x-public.pagination.previous href="{{ $category->previousPageUrl() }}" />
                                <x-public.pagination.next href="{{ $category->nextPageUrl() }}" />
                            </x-public.pagination>
                        </x-public.col>
                    </x-public.row>
                @endif
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
