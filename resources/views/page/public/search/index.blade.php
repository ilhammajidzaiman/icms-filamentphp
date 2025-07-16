<x-public.app-layout title="{{ Str::title(__('page')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::title(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::title(__('cari')) }}" />
        </x-public.breadcrumb>
        @livewire('public.search.search-input')
        <x-public.row>
            <x-public.col>
                <div class="fs-5 fw-normal">
                    <p>
                        {{ Str::ucfirst(__('masukkan kata kunci untuk memulai pencarian.')) }}
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
            </x-public.col>
        </x-public.row>
    </x-public.section>
</x-public.app-layout>
