<x-layouts.app title="{{ Str::title(__('beranda')) }}">
    <x-wrapper class="space-y-4">
        @include('pages.home.carousel')
        @include('pages.home.technology')
        @include('pages.home.article')
        @include('pages.home.partner')
        @include('pages.home.service')
        @include('pages.home.people')
        @include('pages.home.file')
        @include('pages.home.galery')
    </x-wrapper>
</x-layouts.app>
