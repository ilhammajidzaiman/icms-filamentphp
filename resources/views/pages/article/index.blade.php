<x-layouts.app title="{{ Str::title(__('artikel')) }}">
    <x-wrapper id="article" class="py-4">
        <x-container class="space-y-8">
            <x-sections.header class="text-start">
                <x-sections.header.title value="artikel" />
                <x-sections.header.hr class="ms-0" />
            </x-sections.header>
            <livewire:page-article />
        </x-container>
    </x-wrapper>
</x-layouts.app>
