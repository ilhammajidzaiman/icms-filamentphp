<x-public.app-layout title="{{ Str::headline(__($record->title ?? null)) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.link href="{{ route('video.index') }}" value="{{ Str::headline(__('vidio')) }}" />
            @if ($record)
                <x-public.breadcrumb.item value="{{ Str::limit(strip_tags($record->title ?? null), 50, '...') }}" />
            @endif
        </x-public.breadcrumb>
        @if (!$record)
            <x-public.empty-record />
        @else
            <x-public.heading.link.h3 href="{{ route('image.show', $record->slug) }}"
                value="{{ $record->title ?? null }}" />
            <h6 class="fs-6 text-secondary">
                {{ \Carbon\Carbon::parse($record->published_at)->translatedFormat('l, j F Y') }}
            </h6>
            <x-public.row class="justify-content-center">
                <x-public.col>
                    <x-public.card>
                        <x-public.card.body>
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ $record->embed ? $record->embed : asset('image/default-img.svg') }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                    class="card-img-top rounded-2 bg-secondary-subtle">
                                </iframe>
                            </div>
                        </x-public.card.body>
                    </x-public.card>
                </x-public.col>
            </x-public.row>
        @endif
    </x-public.section>
</x-public.app-layout>
