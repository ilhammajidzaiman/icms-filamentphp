<x-public.app-layout>
    <x-public.section>
        <x-public.row class="justify-content-between">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">
                            {{ Str::ucfirst(__('beranda')) }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ Str::ucfirst(__('cari')) }}
                    </li>
                </ul>

                @livewire('public.search.search-input')

                <h3 class="fs-3 my-4">
                    <a href="{{ route('search.show', $keyword) }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        {{ Str::headline(__('pencarian:')) }}
                        {{ $keyword }}
                    </a>
                </h3>
                <ul class="list-group list-group-flush">
                    @if ($article->isNotEmpty())
                        @foreach ($article as $item)
                            <li class="list-group-item px-0">
                                <div class="fs-5 fw-normal">
                                    <a href="{{ route('article.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        <div class="badge text-bg-primary">
                                            {{ Str::headline(__('artikel')) }}
                                        </div>
                                        {{ $item->title }}
                                    </a>
                                    <small class="text-secondary">
                                        ({{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }})
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    @if ($category->isNotEmpty())
                        @foreach ($category as $item)
                            <li class="list-group-item px-0">
                                <div class="fs-5 fw-normal">
                                    <a href="{{ route('category.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        <div class="badge text-bg-primary">
                                            {{ Str::headline(__('kategori')) }}
                                        </div>
                                        {{ $item->title }}
                                    </a>
                                    <small class="text-secondary">
                                        ({{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }})
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    @if ($page->isNotEmpty())
                        @foreach ($page as $item)
                            <li class="list-group-item px-0">
                                <div class="fs-5 fw-normal">
                                    <a href="{{ route('page.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        <div class="badge text-bg-primary">
                                            {{ Str::headline(__('halaman')) }}
                                        </div>
                                        {{ $item->title }}
                                    </a>
                                    <small class="text-secondary">
                                        ({{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }})
                                    </small>
                                </div>
                            </li>
                        @endforeach
                    @endif
                    @if ($file->isNotEmpty())
                        @foreach ($file as $item)
                            <li class="list-group-item px-0">
                                <div class="fs-5 fw-normal">
                                    <a href="{{ route('file.show', $item->slug) }}"
                                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                        <div class="badge text-bg-primary">
                                            {{ Str::headline(__('file')) }}
                                        </div>
                                        {{ $item->title }}
                                    </a>
                                </div>
                                <small class="text-secondary">
                                    ({{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, j F Y') }})
                                </small>
                            </li>
                        @endforeach
                    @endif
                    @if ($article->isEmpty() && $category->isEmpty() && $page->isEmpty() && $file->isEmpty())
                        <div class="fs-5 fw-normal">
                            <p>
                                {{ Str::ucfirst(__('maaf, kami tidak menemukan hasil untuk pencarian anda.')) }}
                            </p>
                            <h5>
                                {{ Str::ucfirst(__('saran:')) }}
                            </h5>
                            <ul>
                                <li>{{ Str::ucfirst(__('pastikan semua kata dieja dengan benar.')) }}</li>
                                <li>{{ Str::ucfirst(__('coba kata kunci lain.')) }}</li>
                                <li>{{ Str::ucfirst(__('coba gunakan kata kunci yang lebih umum.')) }}</li>
                            </ul>
                        </div>
                    @endif
                </ul>
            </div>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
