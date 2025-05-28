<x-public.app-layout>
    <x-public.section>
        <x-public.row class="justify-content-between">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">

                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Cari
                    </li>
                </ul>


                @livewire('public.search.search-input')
                <h3 class="fs-3 my-4">
                    <a href="{{ route('search.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                    </a>
                </h3>

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

            </div>

        </x-public.row>
    </x-public.section>
</x-public.app-layout>
