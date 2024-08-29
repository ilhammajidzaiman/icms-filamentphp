@extends('public.layouts.app')
@section('container')
    <section class="container pt-2">
        <div class="row g-3 my-5 pt-5">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Tim
                    </li>
                </ul>
                @if ($people->isEmpty())
                    <div class="row g-3 justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    @foreach ($people as $item)
                        <div class="row g-3 flex-lg-row-reverse justify-content-between align-items-center g-5 mb-5 pb-5">
                            <div class="col-md-4">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-user.svg') }}"
                                    class="d-block mx-auto img-fluid w-100 rounded-3" alt="image">
                            </div>
                            <div class="col-md-6">
                                <h1 class="display-6 fw-medium">
                                    <a wire:navigate.hover href="{{ route('people.show', $item->uuid) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->name }}
                                    </a>
                                </h1>
                                <p class="lead text-secondary">
                                    {{ $item->peoplePosition->title }}
                                </p>
                                <p class="lead">
                                    {!! Str::limit(strip_tags($item->description), 500, '...') !!}
                                </p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <a href="{{ route('people.show', $item->uuid) }}"
                                        class="btn btn-outline-secondary px-4">
                                        Baca selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mt-4">
                        <div class="col-12">
                            <x-public.pagination>
                                <x-public.pagination.current wire="wire:navigate.hover"
                                    href=" {{ $people->currentPage() }} / {{ $people->lastPage() }}" />
                                <x-public.pagination.previous wire="wire:navigate.hover"
                                    href="{{ $people->previousPageUrl() }}" />
                                <x-public.pagination.next wire="wire:navigate.hover" href="{{ $people->nextPageUrl() }}" />
                            </x-public.pagination>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
