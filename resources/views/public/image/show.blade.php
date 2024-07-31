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
                <h1 class="mb-5">
                    <a wire:navigate.hover href="{{ route('image.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Galeri
                    </a>
                </h1>
                @if (!$item)
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                            <div class="card border-0 shadow-sm mb-4">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    class="card-img-top" alt="image {{ $item->title }}">
                                @if ($item->description)
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <div class="row justify-content-center" data-masonry='{"percentPosition": true }'>
                                @if ($item->attachment)
                                    @foreach ($item->attachment as $item)
                                        <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
                                            <div class="card border-0 shadow-sm">
                                                <img src="{{ $item ? asset('storage/' . $item) : asset('image/default-img.svg') }}"
                                                    class="card-img-top" alt="image {{ $item }}">
                                            </div>
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
