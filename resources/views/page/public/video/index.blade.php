<x-public.app-layout>
    <section class="container pt-2">
        <div class="row mt-5 pt-5">
            <div class="col-12">
                <ul class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Video
                    </li>
                </ul>
                <h3 class="fs-3 mb-4">
                    <a wire:navigate.hover href="{{ route('video.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Video
                    </a>
                </h3>
                @if ($record->isEmpty())
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
                @else
                    <div class="row g-3">
                        @foreach ($record as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card bg-transparent border-0">
                                    <div class="ratio ratio-4x3">
                                        <iframe src="{{ $item->embed ? $item->embed : asset('image/default-img.svg') }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                            class="card-img-top rounded-2 bg-secondary-subtle">
                                        </iframe>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <a wire:navigate.hover href="{{ route('video.show', $item->slug) }}"
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
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <x-public.pagination>
                    <x-public.pagination.current wire="wire:navigate.hover"
                        href=" {{ $record->currentPage() }} / {{ $record->lastPage() }}" />
                    <x-public.pagination.previous wire="wire:navigate.hover" href="{{ $record->previousPageUrl() }}" />
                    <x-public.pagination.next wire="wire:navigate.hover" href="{{ $record->nextPageUrl() }}" />
                </x-public.pagination>
            </div>
        </div>
    </section>
</x-public.app-layout>
