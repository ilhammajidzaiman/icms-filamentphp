<x-public.app-layout>

    <section class="container pt-2">
        <div class="row g-3 justify-content-between mt-5 pt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="mb-5">
                    @if (!$record)
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/{{ route('index') }}">
                                    Beranda
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Halaman
                            </li>
                        </ul>
                        <h1 class="mb-5">
                            Baca
                        </h1>
                        <div class="col-12">
                            <p class="fs-5 text-danger mb-5 pb-5">
                                Hasil tidak ditemukan.
                            </p>
                        </div>
                    @else
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">
                                    Beranda
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                Halaman
                            </li>
                            <li class="breadcrumb-item d-inline-block text-truncate">
                                {{ Str::limit(strip_tags($record->title), 50, '...') }}
                            </li>
                        </ul>

                        <h1>
                            <a href="{{ route('page.show', $record->slug) }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                {{ $record->title }}
                            </a>
                        </h1>
                        <h6 class="text-secondary">
                            {{ \Carbon\Carbon::parse($record->published_at)->translatedFormat('l, j F Y') }}
                            -
                            {{ App\Helpers\EstimateReadingTime($record->content) }} Menit baca
                            -
                            {{ $record->visitor }}x Dilihat
                        </h6>
                        <nav class="nav mb-5">
                            <button onclick="whatsapp()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-whatsapp fs-4"></i>
                            </button>
                            <button onclick="facebook()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-facebook fs-4"></i>
                            </button>
                            <button onclick="twitter()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-twitter-x fs-4"></i>
                            </button>
                            <button onclick="telegram()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-telegram fs-4"></i>
                            </button>
                            <button onclick="copyLink()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis">
                                <i class="rounded-circle bi bi-copy fs-4"></i>
                            </button>
                        </nav>
                        @if ($record->file)
                            <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('image/default-img.svg') }}"
                                alt="image {{ $record->title }}" class="w-100 rounded-2 bg-secondary-subtle">
                        @endif
                        @if ($record->description)
                            <div class="mt-2">
                                <small class="text-secondary">
                                    {{ $record->description }}
                                </small>
                            </div>
                        @endif
                        <div class="fs-5 fw-light my-5">
                            {!! $record->content !!}
                        </div>
                        @if ($record->attachment)
                            <p class="text-secondary">
                                Galeri:
                            </p>
                            <div class="row g-2 mb-5">
                                @foreach ($record->attachment as $item)
                                    <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                        <img src="{{ asset('storage/' . $item) }}" alt="image {{ $item }}"
                                            class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- {{ $item->tags }} --}}
                        {{-- @if ($item->tags)
                            <p class="text-secondary">
                                Topik:
                            </p>
                            <div class="mb-5">
                                @foreach ($item->tags as $item)
                                    <span class="fs-5">
                                        <div
                                            class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis fw-normal px-3 py-2">
                                            {{ $item->title }}
                                        </div>
                                    </span>
                                @endforeach
                            </div>
                        @endif --}}

                        <p class="text-secondary">
                            Bagikan:
                        </p>
                        <nav class="nav my-3">
                            <button onclick="whatsapp()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-whatsapp fs-4 me-2"></i>
                                WhatsApp
                            </button>
                            <button onclick="facebook()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-facebook fs-4 me-2"></i>
                                Facebook
                            </button>
                            <button onclick="twitter()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-twitter-x fs-4 me-2"></i>
                                X
                            </button>
                            <button onclick="telegram()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-telegram fs-4 me-2"></i>
                                Telegram
                            </button>
                            <button onclick="copyLink()" type="button"
                                class="nav-link badge btn btn-light d-flex align-items-center text-dark-emphasis border border-dark-subtle me-1 mb-1 px-2 py-1">
                                <i class="rounded-circle bi bi-copy fs-4 me-2"></i>
                                Salin tautan
                            </button>
                        </nav>
                    @endif
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                @include('layouts.public.side')
            </div>
        </div>
    </section>

    <section class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="border-bottom mb-5 d-flex justify-content-between align-items-end">
                    <h3>
                        Artikel Lainnya
                    </h3>
                    <h6 class="fw-normal">
                        <a href="{{ route('image.index') }}" class="text-decoration-none link-secondary">
                            Selengkapnya
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </h6>
                </div>
            </div>
            @if ($articleRandom->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach ($articleRandom as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card bg-transparent border-0 mb-4">
                                <a href="{{ route('article.show', $item->slug) }}">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                        alt="image {{ $item->title }}"
                                        class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                </a>
                                <div class="card-body px-0 py-2">
                                    <a href="{{ route('category.show', $item->blogCategory->slug) }}"
                                        class="badge bg-primary-subtle link-primary rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->blogCategory->title }}
                                    </a>
                                    <div>
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
    </section>
</x-public.app-layout>

@push('seo')
    @if ($record)
        <meta property="og:url" content="{{ env('APP_URL') . '/' . $record->slug }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $record->title }}">
        <meta property="og:description" content="">
        <meta property="og:image" content="{{ env('APP_ASSET') . $record->file }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="twitter:domain" content="{{ env('APP_URL') }}">
        <meta property="twitter:url" content="{{ env('APP_URL') . '/' . $record->slug }}">
        <meta name="twitter:title" content="{{ $record->title }}">
        <meta name="twitter:image" content="{{ env('APP_ASSET') . $record->file }}">
    @endif
@endpush

@push('scripts')
    <script>
        let width = 600;
        let height = 400;

        function facebook() {
            let left = window.innerWidth / 2 - width / 2;
            let top = window.innerHeight / 2 - height / 2;
            const url = '{{ $share }}'
            const api = "https://www.facebook.com/sharer/sharer.php?u="
            const navUrl = api + url;
            window.open(navUrl, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        function whatsapp() {
            const url = '{{ $share }}'
            const api = "whatsapp://send?text=" + url
            const navUrl = api + url;
            window.open(navUrl);
        }

        function twitter() {
            let left = window.innerWidth / 2 - width / 2;
            let top = window.innerHeight / 2 - height / 2;
            const url = '{{ $share }}'
            const api = 'https://twitter.com/intent/tweet?text=';
            const navUrl = api + url;
            window.open(navUrl, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        function telegram() {
            let left = window.innerWidth / 2 - width / 2;
            let top = window.innerHeight / 2 - height / 2;
            const url = '{{ $share }}'
            const api = 'https://telegram.me/share/url?url=';
            const navUrl = api + url;
            window.open(navUrl, '_blank', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        }

        function copyLink() {
            const url = '{{ $share }}'
            const textarea = document.createElement('textarea');
            textarea.value = url;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('Tautan berhasil disalin');
        }
    </script>
@endpush
