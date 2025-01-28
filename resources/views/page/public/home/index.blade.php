<x-public.app-layout>
    @if ($settingPage->carousel)
        <section class="container mt-5">
            @if ($carousel->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ asset('image/default-carousel.svg') }}" alt="image"
                            class="d-block w-100 rounded-4 vh-65 bg-secondary-subtle">
                    </div>
                </div>
            @else
                <div id="carouselCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($carousel as $item)
                            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-carousel.svg') }}"
                                    class="d-block w-100 rounded-4 vh-65 bg-secondary-subtle"
                                    alt="image {{ $item->title }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-shadow">{{ $item->title }}</h5>
                                    <p class="text-shadow">{{ $item->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @endif
        </section>
    @endif
    @if ($settingPage->headline)
        <section class="container mt-5 px-4">
            <div class="row">
                <div class="col-12 col-md-9 p-0">
                    @if ($articleSlide->isEmpty())
                        <div class="row justify-content-center">
                            <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                            </div>
                        </div>
                    @else
                        <div id="carouselNews" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($articleSlide as $item)
                                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            class="d-block w-100 rounded-44 vh-75 bg-secondary-subtle"
                                            alt="image {{ $item->title }}">
                                        <div class="carousel-caption d-none d-md-block">
                                            <a href="{{ route('article.show', $item->slug) }}"
                                                class="text-reset text-decoration-none">
                                                <h5 class="text-shadow fs-3">
                                                    {{ Str::limit(strip_tags($item->title), 128, '...') }}
                                                </h5>
                                            </a>
                                            <p class="text-shadow fs-5">
                                                {{ Str::limit(strip_tags($item->content), 164, '...') }}
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
                <div class="col-12 col-md-3 p-0">
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
                                    <a href="{{ route('article.show', $item->slug) }}"
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
            {{-- </div> --}}
        </section>
    @endif

    <section class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-end border-bottom mb-5">
                            <h1 class="fs-3">
                                Artikel
                            </h1>
                            <h6 class="fw-normal">
                                <a href="{{ route('article.index') }}" class="text-decoration-none link-secondary">
                                    Selengkapnya
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                @if ($blogArticle->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach ($blogArticle as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 bg-dangedr">
                                <div class="card bg-primarsy border-0">
                                    <a href="{{ route('article.show', $item->slug) }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            alt="image {{ $item->title }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </a>
                                    <div class="card-body px-0 py-22">
                                        <a href="{{ route('category.show', $item->blogCategory->slug) }}"
                                            class="badge bg-primary-subtle link-primary rounded-pill  link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                            {{ $item->blogCategory->title }}
                                        </a>
                                        <div class="card-text">
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
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-12 col-sm-12 col-md-4 col-lg-3">
                @include('layouts.public.side')
            </div>
        </div>
    </section>

    @if ($settingPage->image)
        <section class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                        <h1 class="fs-3">
                            Galeri
                        </h1>
                        <h6 class="fw-normal">
                            <a href="{{ route('image.index') }}" class="text-decoration-none link-secondary">
                                Selengkapnya
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </h6>
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
                <div class="row g-3" data-masonry='{"percentPosition": true }'>
                    @foreach ($image as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ route('image.show', $item->slug) }}">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    alt="image {{ $item->file }}" class="w-100 rounded-2 bg-secondary-subtle">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    @endif

    @if ($settingPage->video)
        <section class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                        <h1 class="fs-3">
                            Video
                        </h1>
                        <h6 class="fw-normal">
                            <a href="{{ route('video.index') }}" class="text-decoration-none link-secondary">
                                Selengkapnya
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            @if ($video->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                        <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                    </div>
                </div>
            @else
                <div class="row g-3">
                    @foreach ($video as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card bg-transparent border-0 mb-4">
                                <div class="ratio ratio-4x3">
                                    <iframe src="{{ $item->embed ? $item->embed : asset('image/default-img.svg') }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                        class="card-img-top rounded-2 bg-secondary-subtle">
                                    </iframe>
                                </div>
                                <div class="card-body px-0 py-2">
                                    <a href="{{ route('video.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    @endif

    @if ($settingPage->people)
        <section class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                        <h1 class="fs-3">
                            Tim
                        </h1>
                        <h6 class="fw-normal">
                            <a href="{{ route('people.index') }}" class="text-decoration-none link-secondary">
                                Selengkapnya
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            @if ($people->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                        <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                    </div>
                </div>
            @else
                <div class="owl-carousel owl-theme owl-loaded">
                    @foreach ($people as $item)
                        <div class="card border-0 rounded-4 m-2 p-3 pb-0">
                            <a href="{{ route('people.show', $item->uuid) }}">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-user.svg') }}"
                                    alt="{{ $item->title }}"
                                    class="card-img-top w-100 bg-secondary-subtle rounded-3 shadow">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="fs-5 fw-medium">
                                    <a href="{{ route('people.show', $item->uuid) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                                <small class="text-secondary">
                                    {{ $item->peoplePosition->title }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    @endif

    @push('styles')
        <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
        <script src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('/owlcarousel/dist/owl.carousel.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 4
                        },
                    }
                });
                $('.play').on('click', function() {
                    owl.trigger('play.owl.autoplay', [1000])
                })
                $('.stop').on('click', function() {
                    owl.trigger('stop.owl.autoplay')
                })
            });
        </script>
    @endpush
</x-public.app-layout>
