<footer class="wrapper bg-body-secondary mt-5">
    <div class="container pt-5">
        <div class="row justify-content-between">
            <div class="col-12 col-md-3 mb-3">
                <a href="{{ route('index') }}"
                    class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <img src="{{ $settingSite->logo }}" alt="Logo" height="50">
                </a>
                <h4 class="fw-semibold">
                    {{ $settingSite->name ? $settingSite->name : env('APP_NAME') }}
                </h4>
                <ul class="list-unstyled">
                    <li>Alamat: {{ $settingSite->address ? $settingSite->address : env('APP_NAME') }}</li>
                    <li>Telp: {{ $settingSite->phone ? $settingSite->phone : env('APP_NAME') }}</li>
                    <li>Email: {{ $settingSite->email ? $settingSite->email : env('APP_NAME') }}</li>
                </ul>
            </div>


            <div class="col-12 col-md-3 mb-3">
                <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                    Tautan Terkait
                </h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('file.index') }}" target="" class="nav-link p-0 text-body-secondary">
                            Dokumen
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('feedback.index') }}" target="" class="nav-link p-0 text-body-secondary">
                            Kritik Saran
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('contacus.index') }}" target="" class="nav-link p-0 text-body-secondary">
                            Kontak Kami
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-5 mb-3">
                <h4 class="fw-semibold border-start border-5 border-secondary-subtle mb-4 ps-2">
                    Lokasi
                </h4>
                @php
                    $defaultMap =
                        'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16328182.633267699!2d107.22171031843773!3d-2.3813608494441247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4c07d7496404b7%3A0xe37b4de71badf485!2sIndonesia!5e0!3m2!1sid!2sid!4v1722322760161!5m2!1sid!2sid';
                @endphp
                <iframe src="{{ $settingSite->map ? $settingSite->map : $defaultMap }}" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded-4 shadow-sm w-100 vh-50">
                </iframe>
            </div>
        </div>
    </div>
    <div class="container pt-5">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="{{ route('index') }}" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                    <img src="{{ $settingSite->logo }}" alt="Logo" height="35">
                </a>
                <span class="mb-3 mb-md-0 text-body-secondary">
                    {{ $settingSite->name ? $settingSite->name : env('APP_NAME') }} &copy; {{ date('Y') }}
                </span>
            </div>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                @if ($settingSite->socialMedia)
                    @foreach ($settingSite->socialMedia as $item)
                        <li class="ms-3">
                            <a href="{{ $item['sosmed_url'] }}" target="_blank" class="text-body-secondary">
                                <i class="{{ $item['sosmed_icon'] }} fs-5"></i>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="ms-3">
                        <a href="#" class="text-body-secondary">
                            <i class="bi-facebook fs-5"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="#" class="text-body-secondary">
                            <i class="bi-instagram fs-5"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="#" class="text-body-secondary">
                            <i class="bi-youtube fs-5"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a href="#" class="text-body-secondary">
                            <i class="bi-twitter-x fs-5"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</footer>
