@extends('public.layouts.app')
@section('container')

    <section class="container pt-2">
        <div class="row mt-5 pt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="mb-5 px-55">

                    <ul class="breadcrumb mb-3">
                        <li class="breadcrumb-item">
                            <a wire:navigate.hover href="{{ route('index') }}">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            Dokumen
                        </li>
                    </ul>

                    <ul class="list-group list-group-flush">
                        @foreach ($file as $item)
                            <li class="list-group-item">
                                <a href="{{ route('file.show', $item->fileCategory->slug) }}"
                                    class="badge bg-primary-subtle link-primary rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    {{ $item->fileCategory->title }}
                                </a>
                                <h5>
                                    <a href="{{ route('file.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->title }}
                                    </a>
                                </h5>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}
                                </small>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                @include('public.layouts.side')
            </div>
        </div>
    </section>

    <section class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end border-bottom mb-5">
                    <h1>
                        Artikel Lainnya
                    </h1>
                    <h5>
                        <a href="{{ route('article.index') }}" class="text-decoration-none link-secondary">
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
                                <a wire:navigate.hover href="{{ route('article.show', $item->slug) }}">
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                        alt="image {{ $item->title }}" class="w-100 rounded-2 vh-20 bg-secondary-subtle">
                                </a>
                                <div class="card-body px-0 py-2">
                                    <a href="{{ route('category.show', $item->blogCategory->slug) }}"
                                        class="badge bg-primary-subtle link-primary rounded-pill mb-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->blogCategory->title }}
                                    </a>
                                    <div>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                        </small>
                                    </div>
                                    <a wire:navigate.hover href="{{ route('article.show', $item->slug) }}"
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
