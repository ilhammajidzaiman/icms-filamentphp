@extends('layouts.app')
@section('container')
    <section class="container pt-1">
        @if ($carousel->isEmpty())
            <div class="row justify-content-center mt-5 pt-5">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div id="carouselSlideshow" class="carousel slide carousel-fade mt-5 pt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($carousel as $item)
                        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-slideshow.svg') }}"
                                class="d-block w-100 rounded-4 vh-65 bg-secondary-subtle" alt="image {{ $item->title }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-shadow">{{ $item->title }}</h5>
                                <p class="text-shadow">{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlideshow"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselSlideshow"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @endif
    </section>

    <section class="wrapper bg-body-secondary my-5">
        <div class="container pt-5 pb-4">
            <div class="row">
                <div class="col-12 col-md-9">
                    @if ($articleSlide->isEmpty())
                        <div class="row justify-content-center">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                            </div>
                        </div>
                    @else
                        <div id="carouselNews" class="carousel slide carousel-fade mb-3" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($articleSlide as $item)
                                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            class="d-block w-100 rounded-4 vh-75 bg-secondary-subtle"
                                            alt="image {{ $item->title }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                                class="text-reset text-decoration-none">
                                                <h5 class="text-shadow fs-3">{{ $item->title }}</h5>
                                            </a>
                                            <p class="text-shadow fs-5">
                                                {{ $item->title }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselNews"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselNews"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-3">
                    @if ($articleTop->isEmpty())
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                            </div>
                        </div>
                    @else
                        @foreach ($articleTop as $item)
                            <div class="card text-bg-dark border-0 rounded-0">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    class="card-img border-0 rounded-0 w-100 bg-secondary-subtle vh-25"
                                    alt="image {{ $item->title }}">
                                <div class="card-img-overlay">
                                    <a wire:navigate.hover href="/{{ $item->slug }}"
                                        class="text-reset text-decoration-none">
                                        <h5 class="card-title text-shadow">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </h5>
                                    </a>
                                    <small class="card-text text-shadow">
                                        {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="container py-4">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-end border-bottom mb-5">
                            <h1>
                                Berita
                            </h1>
                            <h5>
                                <a href="/" class="text-decoration-none link-secondary">
                                    Selengkapnya
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </h5>
                        </div>
                    </div>
                    @if ($blogArticle->isEmpty())
                        <div class="row justify-content-center">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                            </div>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($blogArticle as $item)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                    <div class="card bg-transparent border-0 mb-4">
                                        <a wire:navigate.hover href="/{{ $item->slug }}">
                                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                                alt="image {{ $item->title }}"
                                                class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                        </a>
                                        <div class="card-body px-0 py-2">
                                            <a href="/kategori/{{ $item->blogCategory->slug }}"
                                                class="badge bg-success-subtle link-success rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ $item->blogCategory->title }}
                                            </a>
                                            <div>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                                </small>
                                            </div>
                                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                <div class="card bg-transparent border-2">
                    <div class="card-body">
                        <div>
                            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                Tetap Terhubung
                            </h4>
                            <div class="d-grid gap-2">
                                <a href="https://facebook.com/kejatiriau/" target="_blank"
                                    class="btn btn-primary text-start rounded-pill px-3 py-2">
                                    <i class="bi-facebook me-2"></i>
                                    Facebook
                                </a>
                                <a href="https://www.instagram.com/kejatiriau/" target="_blank"
                                    class="btn btn-secondary text-start rounded-pill px-3 py-2">
                                    <i class="bi-instagram me-2"></i>
                                    Instagram
                                </a>
                                <a href="https://www.youtube.com/@kejatiriau" target="_blank"
                                    class="btn btn-danger text-start rounded-pill px-3 py-2">
                                    <i class="bi-youtube me-2"></i>
                                    Youtube
                                </a>
                                <a href="https://twitter.com/kejatiriau_" target="_blank"
                                    class="btn btn-dark text-start rounded-pill px-3 py-2">
                                    <i class="bi-twitter-x me-2"></i>
                                    X
                                </a>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                Berita Populer
                            </h4>
                            <ul class="list-group list-group-flush">
                                @if ($popular->isEmpty())
                                    <li class="list-group-item px-0">
                                        <div class="fw-medium">
                                            Not found!
                                        </div>
                                    </li>
                                @else
                                    @foreach ($popular as $item)
                                        <li class="list-group-item px-0">
                                            <small class="text-secondary">
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                <div class="fw-medium">
                                                    {{ $item->title }}
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="mt-5">
                            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                Berita Terbaru
                            </h4>
                            <ul class="list-group list-group-flush">
                                @if ($latest->isEmpty())
                                    <li class="list-group-item px-0">
                                        <div class="fw-medium">
                                            Not found!
                                        </div>
                                    </li>
                                @else
                                    @foreach ($latest as $item)
                                        <li class="list-group-item px-0">
                                            <small class="text-secondary">
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                            <a wire:navigate.hover href="/{{ $item->slug }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                <div class="fw-medium">
                                                    {{ $item->title }}
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="mt-5">
                            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                Kategori
                            </h4>
                            @if ($category->isEmpty())
                                <a href="/" class="btn btn-secondary rounded-pill">
                                    Not found!
                                </a>
                            @else
                                @foreach ($category as $item)
                                    <a wire:navigate.hover href="/kategori/{{ $item->slug }}"
                                        class="btn btn-secondary rounded-pill mb-2">
                                        {{ $item->title }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                    <h1>
                        Galeri
                    </h1>
                    <h5>
                        <a href="/" class="text-decoration-none link-secondary">
                            Selengkapnya
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
        @if ($image->isEmpty())
            <div class="row justify-content-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                    <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                </div>
            </div>
        @else
            <div class="row" data-masonry='{"percentPosition": true }'>
                @foreach ($image as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                class="card-img-top" alt="image {{ $item->title }}">
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $item->title }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
