<x-public.app-layout>
    <section class="container pt-2">
        <div class="row g-3 justify-content-between mt-5 pt-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                @if (!$record)
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a wire:navigate.hover href="/">Beranda</a></li>
                        <li class="breadcrumb-item">Baca</li>
                    </ul>
                    <h1 class="mb-5">
                        Baca
                    </h1>
                    <div class="col-12">
                        <p class="fs-5 text-danger mb-5 pb-5">
                            Hasil tidak ditemukan.
                        </p>
                    </div>
                @else
                    <div class="col-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a wire:navigate.hover href="{{ route('index') }}">
                                    Beranda
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a wire:navigate.hover href="{{ route('file.index') }}">
                                    Dokumen
                                </a>
                            </li>
                            <li class="breadcrumb-item d-inline-block text-truncate">
                                {{ Str::limit(strip_tags($record->title), 50, '...') }}
                            </li>
                        </ul>
                        <div class="ratio ratio-1x1 my-5">
                            <embed type="application/pdf" src=" {{ asset('storage/' . $record->attachment) }}"></embed>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-3">
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
                                alt="image {{ $record->title }}" class="w-100 rounded-2 bg-secondary-subtle mb-3">
                            <h6 class="text-secondary">Judul</h6>
                            <h6 class="mb-4">{{ $record->title }} </h6>
                            <h6 class="text-secondary">Kategori</h6>
                            <h6 class="mb-4">{{ $record->fileCategory->title }}</h6>
                            <h6 class="text-secondary">Jumlah pengunduh</h6>
                            <h6 class="mb-4">{{ $record->downloader }}</h6>
                            <h6 class="text-secondary">Dibuat Pada</h6>
                            <h6 class="mb-4">
                                {{ \Carbon\Carbon::parse($record->created_at)->translatedFormat('l, j F Y') }}</h6>
                            <h6 class="text-secondary">Terakhir Diperbarui</h6>
                            <h6 class="mb-4">
                                {{ \Carbon\Carbon::parse($record->updated_at)->translatedFormat('l, j F Y') }}</h6>
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
        </div>
    </section>
</x-public.app-layout>
