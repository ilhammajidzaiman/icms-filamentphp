<x-public.app-layout title="{{ Str::headline(__('dokumen')) }}">
    <x-public.section>
        <x-public.row class="justify-content-between">
            <x-public.col class="col-lg-8">
                <x-public.breadcrumb>
                    <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
                    <x-public.breadcrumb.link href="{{ route('file.index') }}"
                        value="{{ Str::headline(__('dokumen')) }}" />
                    @if ($record)
                        <x-public.breadcrumb.item
                            value="{{ Str::limit(strip_tags($record->title ?? null), 50, '...') }}" />
                    @endif
                </x-public.breadcrumb>
                @if (!$record)
                    <x-public.empty-record />
                @else
                    <x-public.heading.link.h3 href="{{ route('article.show', $record->slug) }}"
                        value="{{ $record->title ?? null }}" />
                    <div class="ratio ratio-1x1 my-5">
                        <embed type="application/pdf" src="{{ asset('storage/' . $record->attachment) }}"></embed>
                    </div>
                @endif
            </x-public.col>

            <x-public.col class="col-lg-3">
                @if (!$record)
                    <x-public.empty-record />
                @else
                    <div class="card bg-transparent border-2">
                        <div class="card-body">
                            <div>
                                <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                                    Informasi
                                </h4>
                                @if (!$record)
                                    <h6>Tidak ada data yang ditampilkan</h6>
                                @else
                                    <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('image/default-img.svg') }}"
                                        alt="image {{ $record->title }}"
                                        class="w-100 rounded-2 bg-secondary-subtle mb-3">
                                    <h6 class="text-secondary">Judul</h6>
                                    <h6 class="mb-4">{{ $record->title }} </h6>
                                    <h6 class="text-secondary">Kategori</h6>
                                    <h6 class="mb-4">{{ $record->fileCategory->title }}</h6>
                                    <h6 class="text-secondary">Jumlah pengunduh</h6>
                                    <h6 class="mb-4">{{ $record->downloader }}</h6>
                                    <h6 class="text-secondary">Dibuat Pada</h6>
                                    <h6 class="mb-4">
                                        {{ \Carbon\Carbon::parse($record->created_at)->translatedFormat('l, j F Y') }}
                                    </h6>
                                    <h6 class="text-secondary">Terakhir Diperbarui</h6>
                                    <h6 class="mb-4">
                                        {{ \Carbon\Carbon::parse($record->updated_at)->translatedFormat('l, j F Y') }}
                                    </h6>
                                    <div class="d-grid gap-2 mt-4">
                                        <a href="{{ route('file.download', $record->slug) }}"
                                            class="btn btn-primary rounded-pill px-3 py-2">
                                            <i class="bi-download me-2"></i>
                                            Unduh
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
