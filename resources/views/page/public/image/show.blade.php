<x-public.app-layout title="{{ Str::headline(__('page')) }}">
    <section class="container pt-2">
        <div class="row g-3 my-5 pt-5">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}">
                        Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('image.index') }}">
                        Galeri
                    </a>
                </li>
                <li class="breadcrumb-item">
                    Lihat
                </li>
            </ul>
            <h3 class="fs-3 mb-4">
                <a href="{{ route('image.index') }}"
                    class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                    Galeri
                </a>
            </h3>
            @if (!$record)
                <div class="row g-3 justify-content-center">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                        <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                    </div>
                </div>
            @else
                <div class="row g-3 justify-content-center g-3">
                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="card bg-transparent border-0">
                            <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('image/default-img.svg') }}"
                                alt="image {{ $record->title }}" class="w-100 rounded-2 bg-secondary-subtle">
                            <div class="card-body px-0 py-2">
                                <div>
                                    <small class="text-secondary">
                                        {{ \Carbon\Carbon::parse($record->published_at)->translatedFormat('l, j F Y') }}
                                    </small>
                                </div>
                                <h5 class="text-dark">
                                    {{ $record->title }}
                                </h5>
                                <p class="card-text text-dark-emphasis">
                                    {{ $record->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-7">
                        <div class="row g-3 justify-content-center" data-masonry='{"percentPosition": true }'>
                            @if ($record->attachment)
                                @foreach ($record->attachment as $record)
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <img src="{{ $record ? asset('storage/' . $record) : asset('image/default-img.svg') }}"
                                            alt="image {{ $record }}"
                                            class="w-100 rounded-2 bg-secondary-subtle">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-public.app-layout>

@push('scripts')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
