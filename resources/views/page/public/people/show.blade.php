<x-public.app-layout>
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
                        <a wire:navigate.hover href="{{ route('people.index') }}">
                            Tim
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Lihat
                    </li>
                </ul>
                @if (!$record)
                    <div class="row g-3 justify-content-center">
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <img src="{{ asset('image/notfound.svg') }}" alt="image" class="w-100">
                        </div>
                    </div>
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
                                <a wire:navigate.hover href="{{ route('people.show', $record->uuid) }}"
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
            </div>
        </div>
    </section>
</x-public.app-layout>
