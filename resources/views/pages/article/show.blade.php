<x-layouts.app title="{{ $record->title ?? null }}">
    <x-wrapper id="article" class="py-4">
        <x-container>
            <div class="w-full grid grid-cols-12 gap-12">
                <div class="w-full col-span-full md:col-span-8 space-y-4">
                    <div class="flex items-center space-x-2 text-slate-500">
                        <a wire:navigate href="{{ route('article.index') }}"class="whitespace-nowrap hover:underline">
                            {{ Str::ucfirst(__('artikel')) }}
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a wire:navigate href="{{ route('article.index') }}"class="whitespace-nowrap hover:underline">
                            {{ $record->category->title ?? null }}
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        <a wire:navigate href="{{ route('article.index') }}"class=" hover:underline line-clamp-1">
                            {{ $record->title ?? null }}
                        </a>
                    </div>
                    <h1 class="font-bold text-3xl">
                        {{ $record->title ?? null }}
                    </h1>
                    <h6 class="text-slate-500">
                        {{ $record->published_at ? $record->formatDayDate($record->published_at) : null }}.
                        {{ Str::ucfirst(__('waktu baca')) }}
                        {{ $record->content ? $record->readTimeFormatted($record->content) : null }}.
                    </h6>
                    @if ($record->file)
                        <div class="aspect-video overflow-hidden bg-slate-200 rounded-xl">
                            <img src="{{ $record->file ? asset('storage/' . $record->file) : asset('/images/default-img.svg') }}"
                                alt="image" class="w-full h-full object-contain">
                        </div>
                    @endif
                    @if ($record->description)
                        <h6 class="text-slate-500">
                            {{ $record->description ?? null }}
                        </h6>
                    @endif
                    @if ($record->attachment)
                        <div class="border border-slate-300 bg-slate-200 rounded-xl">
                            <div class="flex gap-4 overflow-x-auto mx-4 my-4 hide-scrollbar snap-x scroll-smooth">
                                @foreach ($record->attachment as $image)
                                    <div class="flex-none w-auto rounded-xl overflow-hidden snap-center">
                                        <img src="{{ $image ? asset('storage/' . $image) : asset('/images/default-img.svg') }}"
                                            alt="image"
                                            class="w-auto h-32 hover:scale-110 transition duration-300 ease-in-out" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="content">
                        {!! $record->content ?? null !!}
                    </div>
                    @if ($record->tags)
                        <div class="space-y-2">
                            <p class="text-slate-500">
                                {{ Str::ucfirst(__('topik')) }}
                            </p>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($record->tags as $tag)
                                    <div class="w-fit rounded-xl bg-slate-200  line-clamp-1 px-2 py-1">
                                        {{ $tag->title ?? null }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="w-full col-span-full md:col-span-4 space-y-4">
                    <div class="sticky top-[30%] self-start space-y-8">
                        <div class="space-y-2">
                            <p class="text-slate-500">
                                {{ Str::ucfirst(__('bagikan')) }}
                            </p>
                            <x-sections.share />
                        </div>
                        <div class="space-y-2">
                            <p class="text-slate-500">
                                {{ Str::ucfirst(__('ditulis oleh')) }}
                            </p>
                            <div class="flex justify-center md:justify-start items-center">
                                <a href="" class="h-full inline-flex items-center gap-4">
                                    <img src="{{ $record->user->profile->file ? asset('storage/' . $record->user->profile->file) : asset('/images/default-user.svg') }}"
                                        alt="image" class="aspect-square w-10 h-10 rounded-full">
                                    <div>
                                        <h1 class="font-bold">
                                            {{ $record->user->name ?? null }}
                                        </h1>
                                        <h3 class="text-xs">
                                            programmer
                                        </h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h1 class="text-2xl font-semibold">
                                {{ Str::ucfirst(__('lainnya')) }}
                            </h1>
                            <div class="w-12 h-1 rounded-full bg-sky-500 "></div>
                            @foreach ($other as $item)
                                <h3 class="line-clamp-1">
                                    <a href="{{ route('article.show', $item->slug) }}"
                                        title="{{ $item->title ?? null }}" class="hover:underline">
                                        {{ $item->title ?? null }}
                                    </a>
                                </h3>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </x-container>
    </x-wrapper>
</x-layouts.app>
