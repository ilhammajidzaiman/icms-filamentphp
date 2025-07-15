<x-public.app-layout title="{{ Str::headline(__($record->title ?? null)) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.link href="{{ route('image.index') }}" value="{{ Str::headline(__('gambar')) }}" />
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
            <x-public.row>
                <x-public.col class="col-md-5 col-lg-5">
                    <x-public.image
                        src="{{ $record->file ? asset('storage/' . $record->file) : asset('image/default-img.svg') }}" />
                    <div class="fs-5 fw-light text-dark-emphasis">
                        {!! $record->description !!}
                    </div>
                </x-public.col>
                <x-public.col class="col-md-7 col-lg-7">
                    <x-public.row data-masonry='{"percentPosition": true }'>
                        @if ($record->attachment)
                            @foreach ($record->attachment as $record)
                                <x-public.col class="col-sm-6 col-md-6 col-lg-6">
                                    <x-public.image
                                        src="{{ $record ? asset('storage/' . $record) : asset('image/default-img.svg') }}" />
                                </x-public.col>
                            @endforeach
                        @endif
                    </x-public.row>
                </x-public.col>
            </x-public.row>
        @endif
    </x-public.section>

    @push('scripts')
        <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    @endpush
</x-public.app-layout>
