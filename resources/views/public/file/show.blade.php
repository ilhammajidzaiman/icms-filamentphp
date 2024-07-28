@extends('public.layouts.app')
@section('container')

    <section class="container pt-2">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="mb-5 px-55">
                    @if (!$item)
                        <ul class="breadcrumb mb-5">
                            <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                            <li class="breadcrumb-item">Baca</li>
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
                        <div class="col-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                                <li class="breadcrumb-item">
                                    <a wire:navigate.hover href="{{ route('file.index') }}">
                                        File
                                    </a>
                                </li>
                                <li class="breadcrumb-item d-inline-block text-truncate">
                                    {{ Str::limit(strip_tags($item->title), 50, '...') }}
                                </li>
                            </ul>
                            <div class="ratio ratio-1x1 my-5">
                                <embed type="application/pdf" src=" {{ asset('storage/' . $item->attachment) }}"></embed>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                <div class="card bg-transparent border-2">
                    <div class="card-body">
                        <div>
                            <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                Informasi
                            </h4>
                            @if (!$item)
                                <h6>Tidak ada data yang ditampilkan</h6>
                            @else
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    alt="image {{ $item->title }}" class="w-100 rounded-2 bg-secondary-subtle mb-3">
                                <h6 class="text-secondary">Judul</h6>
                                <h6> {{ $item->title }} </h6>
                                <h6 class="text-secondary">Kategori</h6>
                                <h6> {{ $item->fileCategory->title }}</h6>
                                <h6 class="text-secondary">Dibuat Pada</h6>
                                <h6>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}</h6>
                                <h6 class="text-secondary">Terakhir Diperbarui</h6>
                                <h6>{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('l, j F Y') }}</h6>
                                <div class="d-grid gap-2 mt-4">
                                    <a href="/dokumen/download/{{ $item->slug }}"
                                        class="btn btn-primary rounded-pill px-3 py-2">
                                        <i class="bi-download me-2"></i>
                                        Unduh
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end border-bottom mb-5">
                    <h1>
                        Berita Lainnya
                    </h1>
                    <h5>
                        <a href="/" class="text-decoration-none link-secondary">
                            Selengkapnya
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </h5>
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
                                <a wire:navigate.hover href="/{{ $item->slug }}">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                        alt="image {{ $item->title }}" class="w-100 rounded-2 vh-20 bg-secondary-subtle">
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
    </section>
@endsection
