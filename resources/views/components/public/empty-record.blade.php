<x-public.row>
    <x-public.col>
        <div class="fs-5 fw-normal">
            {{-- <i class="bi bi-folder-x fs-1"></i> --}}
            <p>
                {{ Str::ucfirst(__('hasil tidak ditemukan.')) }}
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
