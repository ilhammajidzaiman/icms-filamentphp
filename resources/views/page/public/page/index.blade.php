<x-public.app-layout title="{{ Str::headline(__('article')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::headline(__('page')) }}" />
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('page.index') }}" value="{{ Str::headline(__('page')) }}" />

        @livewire('public.search.search-input')

        @if ($data->isEmpty())
            <x-public.empty-record />
        @else
            <x-public.row class="justify-content-between">
                @foreach ($data as $item)
                    <x-public.col class="col-sm-6 col-md-4 col-lg-3">
                        <x-public.card>
                            <x-public.link href="{{ route('page.show', $item->slug) }}">
                                <x-public.card.image
                                    src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                    class="vh-20" />
                            </x-public.link>
                            <x-public.card.body>
                                <x-public.card.text class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                </x-public.card.text>
                                <x-public.link href="{{ route('page.show', $item->slug) }}">
                                    {{ Str::limit(strip_tags($item->title), 100, '...') }}
                                </x-public.link>
                            </x-public.card.body>
                        </x-public.card>
                    </x-public.col>
                @endforeach
            </x-public.row>
            <x-public.row>
                <x-public.col>
                    <x-public.pagination>
                        <x-public.pagination.current href=" {{ $data->currentPage() }} / {{ $data->lastPage() }}" />
                        <x-public.pagination.previous href="{{ $data->previousPageUrl() }}" />
                        <x-public.pagination.next href="{{ $data->nextPageUrl() }}" />
                    </x-public.pagination>
                </x-public.col>
            </x-public.row>
        @endif
    </x-public.section>
</x-public.app-layout>
