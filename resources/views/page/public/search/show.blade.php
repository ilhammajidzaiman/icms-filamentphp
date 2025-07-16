    <x-public.app-layout title="{{ Str::title(__('cari')) }}">
        <x-public.section>
            <x-public.breadcrumb>
                <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::title(__('dashboard')) }}" />
                <x-public.breadcrumb.link href="{{ route('search.index') }}" value="{{ Str::title(__('cari')) }}" />
                @if ($keyword)
                    <x-public.breadcrumb.item value="{{ Str::limit(strip_tags($keyword ?? null), 50, '...') }}" />
                @endif
            </x-public.breadcrumb>
            @livewire('public.search.search-input')
            <x-public.heading.link.h3 href="{{ route('article.show', $keyword) }}"
                value="{{ Str::title(__('pencarian:')) }} {{ $keyword ?? null }}" />
            <ul class="list-group list-group-flush">
                @forelse ($pagination as $item)
                    <li class="list-group-item px-0">
                        <div class="fs-5 fw-normal">
                            @php
                                $badge = match ($item->type) {
                                    'article' => __('artikel'),
                                    'category' => __('kategori'),
                                    'page' => __('halaman'),
                                    'file' => __('file'),
                                    default => '',
                                };
                                $route = match ($item->type) {
                                    'article' => route('article.show', $item->slug),
                                    'category' => route('category.show', $item->slug),
                                    'page' => route('page.show', $item->slug),
                                    'file' => route('file.show', $item->slug),
                                    default => '#',
                                };
                            @endphp
                            <a href="{{ $route }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="badge text-bg-primary">{{ Str::title($badge) }}</div>
                                {{ $item->title }}
                            </a>
                            <small class="text-secondary">
                                ({{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }})
                            </small>
                        </div>
                    </li>
                @empty
                    <x-public.empty-record />
                @endforelse
            </ul>
            <x-public.row>
                <x-public.col>
                    <x-public.pagination>
                        <x-public.pagination.current
                            href=" {{ $pagination->currentPage() }} / {{ $pagination->lastPage() }}" />
                        <x-public.pagination.previous href="{{ $pagination->previousPageUrl() }}" />
                        <x-public.pagination.next href="{{ $pagination->nextPageUrl() }}" />
                    </x-public.pagination>
                </x-public.col>
            </x-public.row>
        </x-public.section>
    </x-public.app-layout>
