@php
    use App\Models\Post\Link;
    use App\Models\Post\Page;
    use App\Models\Media\File;
    use App\Models\Media\Image;
    use App\Models\Media\Video;
    use App\Models\Post\BlogTag;
    use App\Models\Post\BlogArticle;
    use App\Models\Media\Information;
    use App\Models\Post\BlogCategory;
    use App\Models\Media\FileCategory;
@endphp
<nav
    class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm bg-white text-dark bg-opacity-75 fw-medium border-primary border-bottom border-2 border-opacity-50">
    <div class="container py-2">
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ $sitePage->logo }}" alt="Logo" height="35" class="d-inline-block align-text-center me-3" />
            {{ $sitePage->name ? $sitePage->name : env('APP_NAME') }}
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
                    {{-- <img src="{{ $sitePage->logo }}" alt="Logo" height="35" class="align-text-center me-2"> --}}
                    {{-- {{ $sitePage->name ? $sitePage->name : env('APP_NAME') }} --}}
                </h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close">
                </button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 text-capitalize">
                    @foreach ($sitePage->navMenus as $parent)
                        @if (count($parent->children) > 0)
                            <li class="nav-item dropdown">
                                <a role="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    class="nav-link dropdown-toggle">
                                    {{ $parent->title }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @foreach ($parent->children as $child)
                                        <li>
                                            @if ($child->modelable_type === Link::class)
                                                @php
                                                    $url = $child->link->url;
                                                @endphp
                                            @elseif ($child->modelable_type == BlogArticle::class)
                                                @php
                                                    $url = url('/' . $child->blogArticle->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == BlogCategory::class)
                                                @php
                                                    $url = url('kategori/' . $child->blogCategory->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == BlogTag::class)
                                                @php
                                                    $url = url('tag/' . $child->blogTag->slug);
                                                @endphp
                                            @elseif ($child->modelable_type === Page::class)
                                                @php
                                                    $url = url('halaman/' . $child->page->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == File::class)
                                                @php
                                                    $url = url('dokumen/' . $child->file->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == FileCategory::class)
                                                @php
                                                    $url = url('dokumen/kategori/' . $child->fileCategory->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == Information::class)
                                                @php
                                                    $url = url('dokumen/kategori/' . $child->fileCategory->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == Image::class)
                                                @php
                                                    $url = url('image' . $child->fileCategory->slug);
                                                @endphp
                                            @elseif ($child->modelable_type == Video::class)
                                                @php
                                                    $url = url('video/' . $child->fileCategory->slug);
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
                            @if ($parent->modelable_type == Link::class)
                                @php
                                    $url = $parent->link->url;
                                @endphp
                            @elseif ($parent->modelable_type == BlogArticle::class)
                                @php
                                    $url = url('/' . $parent->article->slug);
                                @endphp
                            @elseif ($parent->modelable_type == BlogCategory::class)
                                @php
                                    $url = url('kategori/' . $parent->category->slug);
                                @endphp
                            @elseif ($parent->modelable_type == BlogTag::class)
                                @php
                                    $url = url('tag/' . $parent->category->slug);
                                @endphp
                            @elseif ($parent->modelable_type == Page::class)
                                @php
                                    $url = url('halaman/' . $parent->page->slug);
                                @endphp
                            @elseif ($parent->modelable_type == File::class)
                                @php
                                    $url = url('dokumen/' . $parent->fileCategory->slug);
                                @endphp
                            @elseif ($parent->modelable_type == FileCategory::class)
                                @php
                                    $url = url('dokumen/kategori/' . $parent->fileCategory->slug);
                                @endphp
                            @elseif ($parent->modelable_type == Information::class)
                                @php
                                    $url = url('informasi/' . $parent->category->slug);
                                @endphp
                            @elseif ($parent->modelable_type == Image::class)
                                @php
                                    $url = url('dokumen/kategori/' . $parent->fileCategory->slug);
                                @endphp
                            @elseif ($parent->modelable_type == Video::class)
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
