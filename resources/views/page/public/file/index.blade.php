<x-public.app-layout title="{{ Str::headline(__('dokumen')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::headline(__('dokumen')) }}" />
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('file.index') }}" value="{{ Str::headline(__('dokumen')) }}" />
        @livewire('public.search.search-input')
        @if ($record->isEmpty())
            <x-public.empty-record />
        @else
            <x-public.row>
                <x-public.col>
                    <ul class="list-group list-group-flush">
                        @foreach ($record as $item)
                            <li class="list-group-item px-0">
                                <a href="{{ route('file.category', $item->fileCategory->slug) }}"
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
                </x-public.col>
            </x-public.row>
            <x-public.row>
                <x-public.col>
                    <x-public.pagination>
                        <x-public.pagination.current
                            href=" {{ $record->currentPage() }} / {{ $record->lastPage() }}" />
                        <x-public.pagination.previous href="{{ $record->previousPageUrl() }}" />
                        <x-public.pagination.next href="{{ $record->nextPageUrl() }}" />
                    </x-public.pagination>
                </x-public.col>
            </x-public.row>
        @endif
    </x-public.section>
</x-public.app-layout>
