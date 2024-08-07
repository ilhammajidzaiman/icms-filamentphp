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
                        Kategori
                    </li>
                </ul>
                <h3 class="fs-3 mb-5">
                    <a wire:navigate.hover href="{{ route('category.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Kategori
                    </a>
                </h3>
                <ul class="list-group list-group-flush">
                    @if ($category->isEmpty())
                        <li class="list-group-item">
                            <h5 class="text-danger">
                                Not found!
                            </h5>
                        </li>
                    @else
                        @foreach ($category as $item)
                            <li class="list-group-item">
                                <h5>
                                    <a href="{{ route('category.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        {{ $item->title }}
                                    </a>
                                    <span class="badge text-bg-primary rounded-pill">
                                        {{ $item->blogArticles->count() }}
                                    </span>
                                </h5>
                                <small class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }}
                                </small>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </section>
@endsection
