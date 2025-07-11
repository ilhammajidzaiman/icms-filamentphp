<x-public.app-layout title="{{ Str::headline(__('page')) }}">
    <x-public.section>
        <x-public.row class="justify-content-between">
            <x-public.col class="col-12 col-sm-12 col-md-12 col-lg-8">
                <x-public.breadcrumb>
                    <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
                    <x-public.breadcrumb.link href="{{ route('page.index') }}"
                        value="{{ Str::headline(__('halaman')) }}" />
                    @if ($record)
                        <x-public.breadcrumb.item
                            value="{{ Str::limit(strip_tags($record->title ?? null), 50, '...') }}" />
                    @endif
                </x-public.breadcrumb>

                @if (!$record)
                    <x-public.empty-record />
                @else
                    <x-public.heading.link.h3 href="{{ route('page.show', $record->slug) }}"
                        value="{{ $record->title ?? null }}" />

                    <h6 class="text-secondary">
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

                    <div class="fs-5 fw-light my-4">
                        {!! $record->content !!}
                    </div>

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
            </x-public.col>

            <x-public.col class="col-12 col-sm-12 col-md-12 col-lg-3">
                @include('layouts.public.side')
            </x-public.col>

        </x-public.row>
    </x-public.section>
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
