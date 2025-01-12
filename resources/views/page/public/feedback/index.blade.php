<x-public.app-layout>
    <section class="container pt-2">
        <div class="row my-5 pt-5">
            <div class="mb-5">
                <ul class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                        <a wire:navigate.hover href="{{ route('index') }}">
                            Beranda
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Kritik Saran
                    </li>
                </ul>
                <h3 class="fs-3">
                    <a wire:navigate.hover href="{{ route('feedback.index') }}"
                        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                        Kritik Saran
                    </a>
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-5">
                    <h3 class="fw-light lead text-secondary mb-5">
                        Berikan kritik dan saran anda untuk kemajuan website ini kedepannya
                    </h3>
                    @php
                        $message = session('message');
                        $alert = session('alert');
                        $icon = session('icon');
                    @endphp
                    @if ($message)
                        <div class="alert alert-{{ $alert }} alert-dismissible fade show mb-5" role="alert">
                            <div class="fs-5">
                                <i class="{{ $icon }} me-2"></i>
                                {{ $message }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('feedback.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="feedback_category_id" class="form-label">
                                Kategori
                                <span class="text-danger fw-bold">*</span>
                            </label>
                            <select name="feedback_category_id" id="feedback_category_id"
                                class="form-select @error('feedback_category_id')is-invalid @enderror">
                                <option value="" selected disabled>Pilih...</option>
                                @foreach ($feedbackCategory as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('feedback_category_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('feedback_category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama
                                <span class="text-danger fw-bold">*</span>
                            </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name')is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                                <span class="text-danger fw-bold">*</span>
                            </label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}"
                                class="form-control @error('email')is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">
                                Pesan
                                <span class="text-danger fw-bold">*</span>
                            </label>
                            <textarea name="message" id="message" rows="10" class="form-control @error('message')is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="submit" class="btn btn-primary">
                                <span id="spinner" class="spinner-border spinner-border-sm d-none"></span>
                                <i id="icon" class="bi bi-send me-2"></i>
                                Kirim
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-public.app-layout>

@push('script')
    @include('sweetalert::alert')
    <script>
        const submit = document.getElementById('submit');
        const icon = document.getElementById('icon');
        const spinner = document.getElementById('spinner');
        document.addEventListener('DOMContentLoaded', function() {
            submit.addEventListener('click', function() {
                icon.classList.add('d-none');
                spinner.classList.remove('d-none');
            });
        });
    </script>
@endpush
