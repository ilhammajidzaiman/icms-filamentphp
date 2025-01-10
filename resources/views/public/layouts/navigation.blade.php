<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white text-dark bg-opacity-75 fw-medium">
    <div class="container py-2">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ $page->logo }}" alt="Logo" height="35" class="d-inline-block align-text-center me-3" />
            {{ $page->name ? $page->name : env('APP_NAME') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
            aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-light bg-opacity-100" tabindex="-1" id="offcanvasNavbar2"
            aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">
                    MENU
                    {{-- <img src="{{ $page->logo }}" alt="Logo" height="35" class="align-text-center me-2"> --}}
                    {{-- {{ $page->name ? $page->name : env('APP_NAME') }} --}}
                </h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close">
                </button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 text-capitalize">
                    @foreach ($page->navMenus as $parent)
                        @if (count($parent->children) > 0)
                            <li class="nav-item dropdown">
                                <a role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="nav-link dropdown-toggle">
                                    {{ $parent->title }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach ($parent->children as $child)
                                        <li>
                                            @if ($child->modelable_type == 'App\Models\Post\Link')
                                                @php
                                                    $url = $child->link->url;
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Post\BlogCategory')
                                                @php
                                                    $url = url('kategori/' . $child->blogCategory->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Post\BlogArticle')
                                                @php
                                                    $url = url('/' . $child->blogArticle->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Post\Page')
                                                @php
                                                    $url = url('halaman/' . $child->page->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == 'App\Models\Media\FileCategory')
                                                @php
                                                    $url = url('dokumen/kategori/' . $child->fileCategory->slug);
                                                @endphp
                                            @endif
                                            <a href="{{ $url }}" class="dropdown-item">
                                                {{ $child->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            @if ($parent->modelable_type == 'App\Models\Post\Link')
                                @php
                                    $url = $parent->link->url;
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Post\BlogCategory')
                                @php
                                    $url = url('kategori/' . $parent->category->slug);
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Post\BlogArticle')
                                @php
                                    $url = url('/' . $parent->article->slug);
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Post\Page')
                                @php
                                    $url = url('halaman/' . $parent->page->slug);
                                @endphp
                            @elseif ($parent->modelable_type == 'App\Models\Media\FileCategory')
                                @php
                                    $url = url('dokumen/kategori/' . $parent->fileCategory->slug);
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ $url }}" aria-current="page" class="nav-link">
                                    {{ $parent->title }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @livewire('public.search')
            </div>
        </div>
    </div>
</nav>
