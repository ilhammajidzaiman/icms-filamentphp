<x-public.app-layout title="{{ Str::headline(__('gambar')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::headline(__('gambar')) }}" />
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('image.index') }}" value="{{ Str::headline(__('gambar')) }}" />

        @if ($record->isEmpty())
            <x-public.empty-record />
        @else
            <div class="row g-3" data-masonry='{"percentPosition": true }'>
                @foreach ($record as $item)
                    <x-public.col class="col-sm-6 col-md-4 col-lg-4">
                        <x-public.link href="{{ route('image.show', $item->slug) }}">
                            <x-public.image
                                src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}" />
                        </x-public.link>
                    </x-public.col>
                @endforeach
            </div>
            <x-public.row>
                <x-public.col>
                    <x-public.pagination>
                        <x-public.pagination.current href=" {{ $record->currentPage() }} / {{ $record->lastPage() }}" />
                        <x-public.pagination.previous href="{{ $record->previousPageUrl() }}" />
                        <x-public.pagination.next href="{{ $record->nextPageUrl() }}" />
                    </x-public.pagination>
                </x-public.col>
            </x-public.row>
        @endif
    </x-public.section>

    @push('scripts')
        <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    @endpush
</x-public.app-layout>
