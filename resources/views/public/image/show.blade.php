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
                        <a wire:navigate.hover href="{{ route('image.index') }}">
                            Galeri
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Lihat
                    </li>
                </ul>
                <h3 class="fs-3 mb-5">
                    <a wire:navigate.hover href="{{ route('image.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Galeri
                    </a>
                </h3>
                @if (!$item)
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center g-3">
                        <div class="col-12 col-md-5 col-lg-5">
                            <div class="card bg-transparent border-0">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    alt="image {{ $item->title }}" class="w-100 rounded-2 bg-secondary-subtle">
                                <div class="card-body px-0 py-2">
                                    <div>
                                        <small class="text-secondary">
                                            {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                        </small>
                                    </div>
                                    <h5 class="text-dark">
                                        {{ $item->title }}
                                    </h5>
                                    <p class="card-text text-dark-emphasis">
                                        {{ $item->description }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-7 col-lg-7">
                            <div class="row justify-content-center g-3" data-masonry='{"percentPosition": true }'>
                                @if ($item->attachment)
                                    @foreach ($item->attachment as $item)
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <img src="{{ $item ? asset('storage/' . $item) : asset('image/default-img.svg') }}"
                                                alt="image {{ $item }}"
                                                class="w-100 rounded-2 bg-secondary-subtle">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            @endif
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
