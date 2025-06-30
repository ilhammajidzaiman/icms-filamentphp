<x-public.app-layout title="{{ Str::headline(__('beranda')) }}">
    @if ($settingPage->carousel)
        <x-public.section>
            @if ($carousel->isEmpty())
                <x-public.empty-record />
            @else
                <x-public.carousel id="carousel">
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
                    <x-public.carousel.previous target="#carousel" slide="prev" />
                    <x-public.carousel.next target="#carousel" slide="next" />
                </x-public.carousel>
            @endif
        </x-public.section>
    @endif
    @if ($settingPage->headline)
        <x-public.section class="px-4">
            <div class="row">
                <x-public.col class="col-md-9 p-0">
                    @if ($articleSlide->isEmpty())
                        <x-public.empty-record />
                    @else
                        <x-public.carousel id="carouselNews">
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
                            <x-public.carousel.previous target="#carouselNews" slide="prev" />
                            <x-public.carousel.next target="#carouselNews" slide="next" />
                        </x-public.carousel>
                    @endif
                </x-public.col>
                <x-public.col class="col-md-3 p-0">
                    @if ($articleTop->isEmpty())
                        <x-public.empty-record />
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
                </x-public.col>
            </div>
        </x-public.section>
    @endif

    <x-public.section>
        <x-public.row>
            <x-public.col class="col-md-8 col-lg-9">
                <x-public.section-header value="{{ __('artikel') }}" href="{{ route('article.index') }}" />
                @if ($blogArticle->isEmpty())
                    <x-public.empty-record />
                @else
                    <x-public.row>
                        @foreach ($blogArticle as $item)
                            <x-public.col class="col-sm-6 col-md-4 col-lg-4">
                                <x-public.card.>
                                    <x-public.link href="{{ route('article.show', $item->slug) }}">
                                        <x-public.card.image
                                            src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" />
                                    </x-public.link>
                                    <x-public.card.body>
                                        <x-public.link href="{{ route('article.show', $item->slug) }}">
                                            <x-public.badge class="bg-secondary">
                                                {{ $item->blogCategory->title }}
                                            </x-public.badge>
                                        </x-public.link>
                                        <x-public.card.text class="text-secondary">
                                            {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                        </x-public.card.text>
                                        <x-public.card.text>
                                            <x-public.link href="{{ route('article.show', $item->slug) }}">
                                                {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                            </x-public.link>
                                        </x-public.card.text>
                                    </x-public.card.body>
                                </x-public.card.>
                            </x-public.col>
                        @endforeach
                    </x-public.row>
                @endif
            </x-public.col>
            <x-public.col class="col-md-4 col-lg-3">
                @include('layouts.public.side')
            </x-public.col>
        </x-public.row>
    </x-public.section>

    @if ($settingPage->image)
        <x-public.section>
            <x-public.section-header value="{{ __('galeri') }}" href="{{ route('image.index') }}" />
            @if ($image->isEmpty())
                <x-public.empty-record />
            @else
                <div data-masonry='{"percentPosition": true }'>
                    <x-public.row>
                        @foreach ($image as $item)
                            <x-public.col class="col-sm-6 col-md-4 col-lg-3">
                                <x-public.link href="{{ route('image.show', $item->slug) }}">
                                    <x-public.image
                                        src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" />
                                </x-public.link>
                            </x-public.col>
                        @endforeach
                    </x-public.row>
                </div>
            @endif
        </x-public.section>
    @endif

    @if ($settingPage->video)
        <x-public.section>
            <x-public.section-header value="{{ __('vidio') }}" href="{{ route('video.index') }}" />
            @if ($video->isEmpty())
                <x-public.empty-record />
            @else
                <x-public.row>
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
                </x-public.row>
            @endif
        </x-public.section>
    @endif

    @if ($settingPage->people)
        <x-public.section>
            <x-public.section-header value="{{ __('tim') }}" href="{{ route('people.index') }}" />
            @if ($people->isEmpty())
                <x-public.empty-record />
            @else
                <div class="owl-carousel owl-theme owl-loaded">
                    @foreach ($people as $item)
                        <div class="card border-0 rounded-4">
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
        </x-public.section>
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
                            items: 1
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
