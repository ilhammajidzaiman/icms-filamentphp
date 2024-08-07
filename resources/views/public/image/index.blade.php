@extends('public.layouts.app')
@section('container')
    <section class="container pt-2">
        <div class="row my-5 pt-5">
            <div class="mb-5">
                <ul class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Galeri
                    </li>
                </ul>
                <h3 class="fs-3 mb-5">
                    <a wire:navigate.hover href="{{ route('image.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Galeri
                    </a>
                </h3>
                @if ($image->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        @foreach ($image as $item)
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
                                            <a wire:navigate.hover href="{{ route('image.show', $item->slug) }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ Str::limit(strip_tags($item->description), 100, '...') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
