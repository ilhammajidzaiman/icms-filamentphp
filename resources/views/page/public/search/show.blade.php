<x-public.app-layout>
    <x-public.section>
        <x-public.row class="justify-content-between">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">
                            {{ Str::ucfirst(__('beranda')) }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ Str::ucfirst(__('cari')) }}
                    </li>
                </ul>

                @livewire('public.search.search-input')

                <h3 class="fs-3 my-4">
                    <a href="{{ route('search.show', $keyword) }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        {{ Str::headline(__('pencarian:')) }}
                        {{ $keyword }}
                    </a>
                </h3>
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
                                    <div class="badge text-bg-primary">{{ Str::headline($badge) }}</div>
                                    {{ $item->title }}
                                </a>
                                <small class="text-secondary">
                                    ({{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }})
                                </small>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">
                            <div class="fs-5 fw-normal">
                                <p>{{ __('Maaf, kami tidak menemukan hasil untuk pencarian anda.') }}</p>
                                <h5>{{ __('Saran:') }}</h5>
                                <ul>
                                    <li>{{ __('Pastikan semua kata dieja dengan benar.') }}</li>
                                    <li>{{ __('Coba kata kunci lain.') }}</li>
                                    <li>{{ __('Coba gunakan kata kunci yang lebih umum.') }}</li>
                                </ul>
                            </div>
                        </li>
                    @endforelse
                </ul>

                @if ($pagination->hasPages())
                    <x-public.pagination class="pt-3">
                        <x-public.pagination.current :href="$pagination->currentPage() . ' / ' . $pagination->lastPage()" />
                        @if ($pagination->onFirstPage())
                            <x-public.pagination.previous href="#" disabled />
                        @else
                            <x-public.pagination.previous :href="$pagination->previousPageUrl()" />
                        @endif
                        @if ($pagination->hasMorePages())
                            <x-public.pagination.next :href="$pagination->nextPageUrl()" />
                        @else
                            <x-public.pagination.next href="#" disabled />
                        @endif
                    </x-public.pagination>
                @endif
            </div>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
