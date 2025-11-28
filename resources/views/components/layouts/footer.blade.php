@php
    use App\Models\Site\Page;
    use App\Models\Post\BlogArticle;
    use App\Models\Post\BlogCategory;
@endphp
<x-wrapper id="footer" class="bg-sky-950 text-slate-300 py-14">
    <x-container>
        <div class="space-y-4">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-full md:col-span-4 space-y-8">
                    <div class="flex justify-center md:justify-start items-center">
                        <a wire:navigate href="" class="h-full inline-flex items-center gap-2">
                            <img src="{{ $siteSetting->logo ? asset('storage/' . $siteSetting->logo) : asset('/images/laravel.svg') }}"
                                alt="logo" class="h-10 w-auto" />
                            <div>
                                <h1 class="font-bold">
                                    {{ $siteSetting->name ? $siteSetting->name : env('APP_NAME') }}
                                </h1>
                                <h3 class="text-xs">
                                    {{ $siteSetting->tagline ? $siteSetting->tagline : env('APP_NAME') }}
                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="space-y-2">
                        @php
                            $address = [
                                (object) [
                                    'title' => $siteSetting->address ?? 'Riau, Indonesia',
                                    'file' =>
                                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d=" m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" /></svg>',
                                ],
                                (object) [
                                    'title' => $siteSetting->phone ?? '+62812 3456 7890',
                                    'file' =>
                                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"><path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" /></svg>',
                                ],
                                (object) [
                                    'title' => $siteSetting->email ?? 'icms@gmail.com',
                                    'file' =>
                                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6"> <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" /> <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" /> </svg>',
                                ],
                            ];
                        @endphp
                        @foreach ($address as $item)
                            <div class="flex items-start space-x-4">
                                <div class="w-fit">
                                    {!! $item->file ?? null !!}
                                </div>
                                <h3>
                                    {{ $item->title ?? null }}
                                </h3>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-span-full md:col-span-8">
                    <div class="grid grid-cols-12 gap-4">
                        @foreach ($footer as $parent)
                            <div class="col-span-6 md:col-span-4">
                                @php
                                    if ($parent->modelable_type === BlogCategory::class):
                                        $urlParent = route('category.show', $parent->category->slug);
                                    elseif ($parent->modelable_type === BlogArticle::class):
                                        $urlParent = route('article.show', $parent->article->slug);
                                    elseif ($parent->modelable_type === Page::class):
                                        $urlParent = route('page.show', $parent->page->slug);
                                    endif;
                                @endphp
                                <div class="space-y-2">
                                    <h1 class="text-lg font-semibold">
                                        {{ $parent->title ?? null }}
                                    </h1>
                                    <div class="w-12 h-1 rounded-full bg-sky-500 "></div>
                                    @foreach ($parent->children as $child)
                                        @php
                                            if ($child->modelable_type === BlogCategory::class):
                                                $urlChild = route('category.show', $child->category->slug);
                                            elseif ($child->modelable_type === BlogArticle::class):
                                                $urlChild = route('article.show', $chil->article->slug);
                                            elseif ($child->modelable_type === Page::class):
                                                $urlChild = route('page.show', $child->page->slug);
                                            endif;
                                        @endphp
                                        <h3>
                                            <a wire:navigate href="{{ $urlChild ?? null }}" class="hover:underline">
                                                {{ $child->title ?? null }}
                                            </a>
                                        </h3>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="h-px w-full bg-white rounded-xl"></div>

            <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-4">
                <div class="flex flex-wrap justify-center md:justify-endtext-sm">
                    <div class="text-center md:text-left text-xs">
                        {{ Str::title(__('copyright')) }} &copy; {{ date('Y') }}
                        <a href="{{ route('index') }}" class="hover:underline">
                            {{ $siteSetting->name ? $siteSetting->name : env('APP_NAME') }}
                        </a>
                        {{ Str::title(__('all rights reserved')) }}.
                    </div>
                </div>
                <div class="flex flex-col items-center md:items-end space-y-2">
                    <h1 class="text-sm">
                        {{ Str::ucfirst(__('terhubung dengan kami')) }}
                    </h1>
                    <nav class="flex gap-4">
                        @if ($sosmed->isNotEmpty())
                            @foreach ($sosmed as $item)
                                <a href="{{ $item->link ?? null }}" title="{{ $item->title }}" target="_blank"
                                    class="w-10 aspect-square flex items-center justify-center overflow-hidden rounded-xl bg-sky-500 hover:bg-sky-600 text-white">
                                    @if ($item->type->value === SettingSiteTypeEnum::Text->value)
                                        {!! $item->file ?? null !!}
                                    @elseif ($item->type->value === SettingSiteTypeEnum::File->value)
                                        <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->title }}"
                                            class="w-auto h-auto">
                                    @endif
                                </a>
                            @endforeach
                        @else
                            @php
                                $sosmed = [
                                    (object) [
                                        'title' => 'youtube',
                                        'link' => 'https://youtube.com',
                                        'file' =>
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube size-6" viewBox="0 0 16 16"> <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" /></svg>',
                                    ],
                                    (object) [
                                        'title' => 'instagram',
                                        'link' => 'https://instagram.com',
                                        'file' =>
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram size-6" viewBox="0 0 16 16"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" /></svg>',
                                    ],
                                    (object) [
                                        'title' => 'facebook',
                                        'link' => 'https://facebook.com',
                                        'file' =>
                                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook size-6" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" /></svg>',
                                    ],
                                    (object) [
                                        'title' => 'twitter x',
                                        'link' => 'https://twitter.com',
                                        'file' => '
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x size-6" viewBox="0 0 16 16"><path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" /></svg>',
                                    ],
                                    // (object) [
                                    //     'title' => 'share',
                                    //     'link' => 'share()',
                                    //     'file' =>
                                    //         '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share size-6" viewBox="0 0 16 16"><path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3" /></svg>',
                                    // ],
                                ];
                            @endphp
                            @foreach ($sosmed as $item)
                                <a href="{{ $item->link ?? null }}" title="{{ $item->title ?? nul }}" target="_blank"
                                    class="w-10 aspect-square flex items-center justify-center overflow-hidden rounded-xl bg-sky-500 hover:bg-sky-600 text-white">
                                    {!! $item->file ?? null !!}
                                </a>
                            @endforeach
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </x-container>
</x-wrapper>
