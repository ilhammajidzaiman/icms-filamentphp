<x-public.app-layout title="{{ Str::headline(__('page')) }}">
    <section class="container pt-2">
        <div class="row g-3 my-5 pt-5">
            <div class="mb-5">
                <ul class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('video.index') }}">
                            Video
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Lihat
                    </li>
                </ul>
                <h3 class="fs-3">
                    <a href="{{ route('article.show', $record->slug) }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        {{ $record->title }}
                    </a>
                </h3>
                @if (!$record)
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center g-3">
                        <div class="col-12">
                            <div class="card bg-transparent border-0">
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ $record->embed ? $record->embed : asset('image/default-img.svg') }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                        class="card-img-top rounded-2 bg-secondary-subtle">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endif
        </div>
    </section>
</x-public.app-layout>
