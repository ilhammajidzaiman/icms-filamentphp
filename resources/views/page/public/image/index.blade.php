<x-public.app-layout title="{{ Str::headline(__('gambar')) }}">
    <x-public.section>
        <x-public.row>
            <x-public.col>
                <x-public.breadcrumb>
                    <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
                    <x-public.breadcrumb.item value="{{ Str::headline(__('gambar')) }}" />
                </x-public.breadcrumb>
                <x-public.heading.link.h3 href="{{ route('image.index') }}" value="{{ Str::headline(__('gambar')) }}" />

                @if ($record->isEmpty())
                    <x-public.empty-record />
                @else
                    <x-public.row data-masonry='{"percentPosition": true }'>
                        @foreach ($record as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                                <div class="card border-0 shadow-sm">
                                    <a href="{{ route('image.show', $item->slug) }}">
                                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('image/default-img.svg') }}"
                                            class="card-img-top" alt="image {{ $item->title }}">
                                    </a>
                                    <div class="card-body">
                                        <div>
                                            <small class="text-secondary">
                                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                            </small>
                                        </div>
                                        <p class="card-text">
                                            <a href="{{ route('image.show', $item->slug) }}"
                                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                                {{ Str::limit(strip_tags($item->description), 100, '...') }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>

@push('scripts')
    <script src="{{ asset('/js/masonry.pkgd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endpush
