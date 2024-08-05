<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- @stack('seo') --}}
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('image/kejati-logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet"> --}}


    <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/icons/font/bootstrap-icons.css') }}">

    <style>
        body {
            /* font-family: 'Raleway', sans-serif; */
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;

            /* font-family: "Nunito Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-variation-settings:
                "wdth" 100,
                "YTLC" 500; */
        }

        /* Large devices (desktops, 992px and up) */
        @media (min-width: 992px) {}

        /* X-Large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {}

        /* XX-Large devices (larger desktops, 1400px and up) */
        @media (min-width: 1400px) {}

        /* .navbar-nav .dropdown:hover .dropdown-menu {
            display: block;
        } */

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .carousel-item-overlay {
            position: relative;
        }

        .carousel-item-overlay::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .carousel-item-overlay .carousel-caption-overlay {
            position: absolute;
            /* top: 50%; */
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
        }

        .vh-10 {
            height: 10vh;
            object-fit: cover;
        }

        .vh-15 {
            height: 15vh;
            object-fit: cover;
        }

        .vh-20 {
            height: 20vh;
            object-fit: cover;
        }

        .vh-25 {
            height: 25vh;
            object-fit: cover;
        }

        .vh-50 {
            height: 50vh;
            object-fit: cover;
        }

        .vh-65 {
            height: 65vh;
            object-fit: cover;
        }

        .vh-75 {
            height: 75vh;
            object-fit: cover;
        }

        .text-shadow {
            /* text-shadow: 0 0 3px #1e293b; */
            text-shadow: 0 0 3px #0f172a;
            underline: none;
        }

        .custom-img {
            max-width: 100%;
            height: auto;
        }
    </style>
    @stack('style')
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white text-dark bg-opacity-75 fw-medium"
        aria-label="Offcanvas navbar large">
        <div class="container py-2">
            <a href="{{ route('index') }}" class="navbar-brand fw-bold fs-3 text-primary-emphasis">
                <img src="{{ $logo }}" alt="Logo" height="35"
                    class="d-inline-block align-text-center me-2">
                {{ $site->name ? $site->name : env('APP_NAME') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
                aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-light bg-opacity-100" tabindex="-1" id="offcanvasNavbar2"
                aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">
                        MENU
                        {{-- <img src="{{ $logo }}" alt="Logo" height="35" class="align-text-center me-2"> --}}
                        {{-- {{ $site->name ? $site->name : env('APP_NAME') }} --}}
                    </h5>
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                    </button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 text-capitalize pe-3">
                        @foreach ($navMenus as $parent)
                            @if (count($parent->children) > 0)
                                <li class="nav-item dropdown">
                                    <a role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="nav-link dropdown-toggle">
                                        {{ $parent->title }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @foreach ($parent->children as $child)
                                            <li>
                                                @if ($child->modelable_type == 'App\Models\Link')
                                                    @php
                                                        $url = $child->link->url;
                                                    @endphp
                                                @elseif ($child->modelable_type == 'App\Models\BlogCategory')
                                                    @php
                                                        $url = url('kategori/' . $child->blogCategory->slug);
                                                    @endphp
                                                @elseif ($child->modelable_type == 'App\Models\BlogArticle')
                                                    @php
                                                        $url = url('/' . $child->blogArticle->slug);
                                                    @endphp
                                                @elseif ($child->modelable_type == 'App\Models\Page')
                                                    @php
                                                        $url = url('halaman/' . $child->page->slug);
                                                    @endphp
                                                @elseif ($child->modelable_type == 'App\Models\FileCategory')
                                                    @php
                                                        $url = url('dokumen/kategori/' . $child->fileCategory->slug);
                                                    @endphp
                                                @endif
                                                <a href="{{ $url }}" class="dropdown-item">
                                                    {{ $child->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                @if ($parent->modelable_type == 'App\Models\Link')
                                    @php
                                        $url = $parent->link->url;
                                    @endphp
                                @elseif ($parent->modelable_type == 'App\Models\Category')
                                    @php
                                        $url = url('kategori/' . $parent->category->slug);
                                    @endphp
                                @elseif ($parent->modelable_type == 'App\Models\Article')
                                    @php
                                        $url = url('/' . $parent->article->slug);
                                    @endphp
                                @elseif ($parent->modelable_type == 'App\Models\Page')
                                    @php
                                        $url = url('halaman/' . $parent->page->slug);
                                    @endphp
                                @elseif ($parent->modelable_type == 'App\Models\FileCategory')
                                    @php
                                        $url = url('dokumen/kategori/' . $parent->fileCategory->slug);
                                    @endphp
                                @endif
                                <li class="nav-item">
                                    <a href="{{ $url }}" aria-current="page" class="nav-link">
                                        {{ $parent->title }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    {{-- @livewire('searching') --}}
                </div>
            </div>
        </div>
    </nav>

    @yield('container')

    <footer class="wrapper bg-body-secondary mt-5">
        <div class="container pt-5">
            <div class="row justify-content-between">
                <div class="col-12 col-md-3 mb-3">
                    <a href="{{ route('index') }}"
                        class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                        <img src="{{ $logo }}" alt="Logo" height="50">
                    </a>
                    <h4 class="fw-semibold">
                        {{ $site->name ? $site->name : env('APP_NAME') }}
                    </h4>
                    <ul class="list-unstyled">
                        <li>Alamat: {{ $site->address ? $site->address : env('APP_NAME') }}</li>
                        <li>Telp: {{ $site->phone ? $site->phone : env('APP_NAME') }}</li>
                        <li>Email: {{ $site->email ? $site->email : env('APP_NAME') }}</li>
                    </ul>
                </div>


                <div class="col-12 col-md-3 mb-3">
                    <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                        Tautan Terkait
                    </h4>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="{{ route('feedback.index') }}" target=""
                                class="nav-link p-0 text-body-secondary">
                                Kritik Saran
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-12 col-md-5 mb-3">
                    <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                        Lokasi
                    </h4>
                    @php
                        $defaultMap =
                            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16328182.633267699!2d107.22171031843773!3d-2.3813608494441247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1722322760161!5m2!1sid!2sid';
                    @endphp
                    <iframe src="{{ $site->map ? $site->map : $defaultMap }}" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-4 shadow-sm w-100 vh-50">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="{{ route('index') }}"
                        class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                        <img src="{{ $logo }}" alt="Logo" height="35">
                    </a>
                    <span class="mb-3 mb-md-0 text-body-secondary">
                        {{ $site->name ? $site->name : env('APP_NAME') }} &copy; {{ date('Y') }}
                    </span>
                </div>
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    @if ($site->social_media)
                        @foreach ($site->social_media as $item)
                            <li class="ms-3">
                                <a href="{{ $item['sosmed_url'] }}" target="_blank" class="text-body-secondary">
                                    <i class="{{ $item['sosmed_icon'] }} fs-5"></i>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="ms-3">
                            <a href="#" class="text-body-secondary">
                                <i class="bi-facebook fs-5"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a href="#" class="text-body-secondary">
                                <i class="bi-instagram fs-5"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a href="#" class="text-body-secondary">
                                <i class="bi-youtube fs-5"></i>
                            </a>
                        </li>
                        <li class="ms-3">
                            <a href="#" class="text-body-secondary">
                                <i class="bi-twitter-x fs-5"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </footer>

    <script src="{{ asset('/dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('script')
    @livewireScripts
</body>

</html>
