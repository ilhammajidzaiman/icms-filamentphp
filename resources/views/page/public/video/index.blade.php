<x-public.app-layout title="{{ Str::headline(__('vidio')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::headline(__('vidio')) }}" />
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('video.index') }}" value="{{ Str::headline(__('vidio')) }}" />

        <x-public.row>
            <x-public.col>
                @if ($record->isEmpty())
                    <x-public.empty-record />
                @else
                    <x-public.row>
                        @foreach ($record as $item)
                            <x-public.col class="col-sm-6 col-md-4 col-lg-3">
                                <x-public.card>
                                    <div class="ratio ratio-4x3">
                                        <iframe src="{{ $item->embed ? $item->embed : asset('image/default-img.svg') }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                            class="card-img-top rounded-2 bg-secondary-subtle">
                                        </iframe>
                                    </div>
                                    <x-public.card.body>
                                        <x-public.link href="{{ route('video.show', $item->slug) }}">
                                            {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                        </x-public.link>
                                    </x-public.card.body>
                                </x-public.card>
                            </x-public.col>
                        @endforeach
                    </x-public.row>
                @endif
            </x-public.col>
        </x-public.row>
        <x-public.row>
            <x-public.col>
                <x-public.pagination>
                    <x-public.pagination.current href=" {{ $record->currentPage() }} / {{ $record->lastPage() }}" />
                    <x-public.pagination.previous href="{{ $record->previousPageUrl() }}" />
                    <x-public.pagination.next href="{{ $record->nextPageUrl() }}" />
                </x-public.pagination>
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
