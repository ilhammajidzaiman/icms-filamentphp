@extends('public.layouts.app')
@section('container')
    <section class="container pt-2">
        <div class="row g-3 justify-content-between mt-5 pt-5">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('file.index') }}">
                            Dokumen
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ Str::limit(strip_tags($item->title), 50, '...') }}
                    </li>
                </ul>
                <h3 class="fs-3 mb-4">
                    <a wire:navigate.hover href="{{ route('category.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Dokumen
                    </a>
                </h3>
                @if ($file->isEmpty())
                    <div class="row g-3 justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($file as $item)
                            <li class="list-group-item px-0">
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
                                <small class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}
                                </small>
                            </li>
                        @endforeach
                    </ul>
                    <div class="row mt-4">
                        <div class="col-12">
                            <x-public.pagination>
                                <x-public.pagination.current wire="wire:navigate.hover"
                                    href=" {{ $file->currentPage() }} / {{ $file->lastPage() }}" />
                                <x-public.pagination.previous wire="wire:navigate.hover"
                                    href="{{ $file->previousPageUrl() }}" />
                                <x-public.pagination.next wire="wire:navigate.hover" href="{{ $file->nextPageUrl() }}" />
                            </x-public.pagination>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
