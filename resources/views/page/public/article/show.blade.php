<x-public.app-layout>
    <x-public.section>
        <x-public.row class="justify-content-between">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                @if (!$record)
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/{{ route('index') }}">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            Baca
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
                            <a href="{{ route('article.index') }}">
                                Artikel
                            </a>
                        </li>
                        <li class="breadcrumb-item d-inline-block text-truncate">
                            {{ Str::limit(strip_tags($record->title), 50, '...') }}
                        </li>
                    </ul>
                    <h5 class="fs-5">
                        <a href="{{ route('category.show', $record->blogCategory->slug) }}"
                            class="badge bg-primary-subtle link-primary rounded-pill link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                            {{ $record->blogCategory->title }}
                        </a>
                    </h5>
                    <h3 class="fs-3">
                        <a href="{{ route('article.show', $record->slug) }}"
                            class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                            {{ $record->title }}
                        </a>
                    </h3>
                    <h6 class="fs-6 text-secondary">
                        {{ \Carbon\Carbon::parse($record->published_at)->translatedFormat('l, j F Y') }}
                        -
                        {{ App\Helpers\EstimateReadingTime($record->content) }} Menit baca
                        -
                        {{ $record->visitor }}x Dilihat
                    </h6>
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
                    <div class="fs-5 fw-light my-4">
                        {!! $record->content !!}
                    </div>
                    @if ($record->attachment)
                        <p class="text-secondary">
                            Galeri:
                        </p>
                        <div class="row g-3 mb-5">
                            @foreach ($record->attachment as $file)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-4">
                                    <img src="{{ asset('storage/' . $file) }}" alt="image {{ $file }}"
                                        class="w-100 rounded-2 bg-secondary-subtle vh-20">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($record->blogTags)
                        <p class="text-secondary">
                            Topik:
                        </p>
                        <div class="mb-5">
                            @foreach ($record->blogTags as $item)
                                <span class="fs-5">
                                    <div
                                        class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis fw-normal px-3 py-2">
                                        {{ $item->title }}
                                    </div>
                                </span>
                            @endforeach
                        </div>
                    @endif
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

            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                @include('layouts.public.side')
            </div>
        </x-public.row>
    </x-public.section>

    <x-public.section>
        <x-public.section.header value="{{ __('artikel lainnya') }}" href="{{ route('article.index') }}" />
        @if ($blogArticle->isEmpty())
            <x-public.empty-record />
        @else
            <x-public.row>
                @foreach ($blogArticle as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <x-public.card>
                            <x-public.card.image href="{{ route('article.show', $item->slug) }}"
                                src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" />
                            <x-public.card.body>
                                <x-public.badge.link value="{{ $item->blogCategory->title }}"
                                    href="{{ route('category.show', $item->blogCategory->slug) }}" />
                                <x-public.card.text
                                    value="{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}" />
                                <x-public.card.link value="{{ Str::limit(strip_tags($item->title), 100, '...') }}"
                                    href="{{ route('article.show', $item->slug) }}" />
                            </x-public.card.body>
                        </x-public.card>
                    </div>
                @endforeach
            </x-public.row>
        @endif
    </x-public.section>

    @push('seo')
        @if ($item)
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
</x-public.app-layout>
