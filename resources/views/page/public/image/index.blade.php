<x-public.app-layout>
    <section class="container pt-2">
        <div class="row g-3 mt-5 pt-5">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Galeri
                    </li>
                </ul>
                <h3 class="fs-3 mb-4">
                    <a href="{{ route('image.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Galeri
                    </a>
                </h3>
                @if ($record->isEmpty())
                    <div class="row g-3 justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row g-3" data-masonry='{"percentPosition": true }'>
                        @foreach ($record as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                <div class="card border-0 shadow-sm">
                                    <a href="{{ route('image.show', $item->slug) }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            class="card-img-top" alt="image {{ $item->title }}">
                                    </a>
                                    <div class="card-body">
                                        <div>
                                            <small class="text-secondary">
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                        <p class="card-text">
                                            <a href="{{ route('image.show', $item->slug) }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ Str::limit(strip_tags($item->description), 100, '...') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <x-public.pagination>
                                <x-public.pagination.current wire="wire:navigate.hover"
                                    href=" {{ $record->currentPage() }} / {{ $record->lastPage() }}" />
                                <x-public.pagination.previous wire="wire:navigate.hover"
                                    href="{{ $record->previousPageUrl() }}" />
                                <x-public.pagination.next wire="wire:navigate.hover"
                                    href="{{ $record->nextPageUrl() }}" />
                            </x-public.pagination>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-public.app-layout>

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
