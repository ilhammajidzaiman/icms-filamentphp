<x-public.app-layout title="{{ Str::headline(__('tim')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::headline(__('tim')) }}" />
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('people.index') }}" value="{{ Str::headline(__('tim')) }}" />

        @if ($record->isEmpty())
            <x-public.empty-record />
        @else
            <x-public.row>
                <x-public.col>
                    @foreach ($record as $item)
                        <x-public.row
                            class="flex-lg-row-reverse justify-content-between align-items-center g-5 mb-5 pb-5">
                            <x-public.col class="col-md-4">
                                @if ($item->file)
                                    <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-user.svg') }}"
                                        class="d-block mx-auto img-fluid w-100 rounded-3" alt="image">
                                @endif
                            </x-public.col>
                            <x-public.col class="col-md-6">
                                <h1 class="display-6 fw-medium">
                                    <a href="{{ route('people.show', $item->uuid) }}"
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
                            </x-public.col>
                        </x-public.row>
                    @endforeach
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
