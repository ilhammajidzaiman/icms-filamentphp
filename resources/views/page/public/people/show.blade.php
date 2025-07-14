<x-public.app-layout title="{{ Str::headline(__('page')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.link href="{{ route('people.index') }}" value="{{ Str::headline(__('tim')) }}" />
            @if ($record)
                <x-public.breadcrumb.item value="{{ Str::limit(strip_tags($record->name ?? null), 50, '...') }}" />
            @endif
        </x-public.breadcrumb>

        <x-public.row>
            <x-public.col>
                @if (!$record)
                    <x-public.empty-record />
                @else
                    <div class="row g-3 flex-lg-row-reverse justify-content-between">
                        <div class="col-md-4">
                            @if ($record->file)
                                <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('image/default-user.svg') }}"
                                    class="d-block mx-auto img-fluid w-100 rounded-3" alt="image">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h1 class="display-6 fw-medium">
                                <a href="{{ route('people.show', $record->uuid) }}"
                                    class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    {{ $record->name }}
                                </a>
                            </h1>
                            <p class="lead text-secondary">
                                {{ $record->peoplePosition->title }}
                            </p>
                            <p class="lead">
                                {!! $record->description !!}
                            </p>
                        </div>
                    </div>
                @endif
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
