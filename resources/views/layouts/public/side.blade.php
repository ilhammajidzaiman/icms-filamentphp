<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button bg-body-tertiary bg-gradient" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                <div class="fs-6 fw-semibold border-start border-5 border-secondary-subtle ps-2">
                    {{ Str::headline(__('tetap terhubung')) }}
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body p-3">
                <div class="d-grid gap-2">
                    @if ($settingSite->socialMedia)
                        @foreach ($settingSite->socialMedia as $item)
                            <a href="{{ $item['sosmed_url'] }}" target="_blank"
                                class="btn btn-primary text-start rounded-pill px-3 py-2">
                                <i class="{{ $item['sosmed_icon'] }} me-2"></i>
                                {{ $item['sosmed_name'] }}
                            </a>
                        @endforeach
                    @else
                        <a href="https://facebook.com" target="_blank"
                            class="btn btn-primary text-start rounded-pill px-3 py-2">
                            <i class="bi-facebook me-2"></i>
                            Facebook
                        </a>
                        <a href="https://www.instagram.com" target="_blank"
                            class="btn btn-secondary text-start rounded-pill px-3 py-2">
                            <i class="bi-instagram me-2"></i>
                            Instagram
                        </a>
                        <a href="https://www.youtube.com" target="_blank"
                            class="btn btn-danger text-start rounded-pill px-3 py-2">
                            <i class="bi-youtube me-2"></i>
                            Youtube
                        </a>
                        <a href="https://twitter.com" target="_blank"
                            class="btn btn-dark text-start rounded-pill px-3 py-2">
                            <i class="bi-twitter-x me-2"></i>
                            X
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button bg-body-tertiary bg-gradient" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseTwo">
                <div class="fs-6 fw-semibold border-start border-5 border-secondary-subtle ps-2">
                    {{ Str::headline(__('artikel populer')) }}
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <ul class="list-group list-group-flush">
                    @if ($popular->isEmpty())
                        <li class="list-group-item px-0">
                            <div class="fw-medium">
                                Not found!
                            </div>
                        </li>
                    @else
                        @foreach ($popular as $item)
                            <li class="list-group-item px-0">
                                <small class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                </small>
                                <a href="{{ route('article.show', $item->slug) }}"
                                    class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    <div class="fw-medium">
                                        {{ Str::limit(strip_tags($item->title), 50, '...') }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button bg-body-tertiary bg-gradient" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseThree">
                <div class="fs-6 fw-semibold border-start border-5 border-secondary-subtle ps-2">
                    {{ Str::headline(__('artikel terbaru')) }}
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <ul class="list-group list-group-flush">
                    @if ($latest->isEmpty())
                        <li class="list-group-item px-0">
                            <div class="fw-medium">
                                Not found!
                            </div>
                        </li>
                    @else
                        @foreach ($latest as $item)
                            <li class="list-group-item px-0">
                                <small class="text-secondary">
                                    {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                                </small>
                                <a href="{{ route('article.show', $item->slug) }}"
                                    class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                    <div class="fw-medium">
                                        {{ Str::limit(strip_tags($item->title), 50, '...') }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button bg-body-tertiary bg-gradient" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseFour">
                <div class="fs-6 fw-semibold border-start border-5 border-secondary-subtle ps-2">
                    {{ Str::headline(__('kategori')) }}
                </div>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
            <div class="accordion-body">
                @if ($category->isEmpty())
                    <a href="{{ route('index') }}" class="btn btn-secondary rounded-pill">
                        Not found!
                    </a>
                @else
                    @foreach ($category as $item)
                        <a href="{{ route('category.show', $item->slug) }}"
                            class="btn btn-secondary rounded-pill mb-2">
                            {{ $item->title }}
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>



{{-- <div class="card border-2">
    <div class="card-body">
        <div>
            <h1 class="fs-5 fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Tetap Terhubung
            </h1>
            <div class="d-grid gap-2">
                @if ($settingSite->socialMedia)
                    @foreach ($settingSite->socialMedia as $item)
                        <a href="{{ $item['sosmed_url'] }}" target="_blank"
                            class="btn btn-primary text-start rounded-pill px-3 py-2">
                            <i class="{{ $item['sosmed_icon'] }} me-2"></i>
                            {{ $item['sosmed_name'] }}
                        </a>
                    @endforeach
                @else
                    <a href="https://facebook.com" target="_blank"
                        class="btn btn-primary text-start rounded-pill px-3 py-2">
                        <i class="bi-facebook me-2"></i>
                        Facebook
                    </a>
                    <a href="https://www.instagram.com" target="_blank"
                        class="btn btn-secondary text-start rounded-pill px-3 py-2">
                        <i class="bi-instagram me-2"></i>
                        Instagram
                    </a>
                    <a href="https://www.youtube.com" target="_blank"
                        class="btn btn-danger text-start rounded-pill px-3 py-2">
                        <i class="bi-youtube me-2"></i>
                        Youtube
                    </a>
                    <a href="https://twitter.com" target="_blank"
                        class="btn btn-dark text-start rounded-pill px-3 py-2">
                        <i class="bi-twitter-x me-2"></i>
                        X
                    </a>
                @endif
            </div>
        </div>
        <div class="mt-5">
            <h1 class="fs-5 fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Artikel Populer
            </h1>
            <ul class="list-group list-group-flush">
                @if ($popular->isEmpty())
                    <li class="list-group-item px-0">
                        <div class="fw-medium">
                            Not found!
                        </div>
                    </li>
                @else
                    @foreach ($popular as $item)
                        <li class="list-group-item px-0">
                            <small class="text-secondary">
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                            </small>
                            <a href="{{ route('article.show', $item->slug) }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="fw-medium">
                                    {{ Str::limit(strip_tags($item->title), 50, '...') }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="mt-5">
            <h1 class="fs-5 fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Artikel Terbaru
            </h1>
            <ul class="list-group list-group-flush">
                @if ($latest->isEmpty())
                    <li class="list-group-item px-0">
                        <div class="fw-medium">
                            Not found!
                        </div>
                    </li>
                @else
                    @foreach ($latest as $item)
                        <li class="list-group-item px-0">
                            <small class="text-secondary">
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('l, j F Y') }}
                            </small>
                            <a href="{{ route('article.show', $item->slug) }}"
                                class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="fw-medium">
                                    {{ Str::limit(strip_tags($item->title), 50, '...') }}
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="mt-5">
            <h1 class="fs-5 fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                Kategori
            </h1>
            @if ($category->isEmpty())
                <a href="{{ route('index') }}" class="btn btn-secondary rounded-pill">
                    Not found!
                </a>
            @else
                @foreach ($category as $item)
                    <a href="{{ route('category.show', $item->slug) }}" class="btn btn-secondary rounded-pill mb-2">
                        {{ $item->title }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div> --}}
