<x-public.app-layout title="{{ Str::headline(__('kontak')) }}">
    <x-public.section>
        <x-public.breadcrumb>
            <x-public.breadcrumb.link href="{{ route('index') }}" value="{{ Str::headline(__('dashboard')) }}" />
            <x-public.breadcrumb.item value="{{ Str::headline(__('kontak')) }}" />
        </x-public.breadcrumb>
        <x-public.heading.link.h3 href="{{ route('contacus.index') }}" value="{{ Str::title(__('hubungi kami')) }}" />

        <x-public.row>
            <x-public.col class="col-md-5">
                <p class="fw-light fs-5 text-secondary">
                    Anda dapat menghubungi kami dengan mengisi form di bawah, dan akan segera kami respon
                    melalui email yang anda masukkan.
                </p>
                <p class="fw-light fs-5 text-secondary mb-5">
                    Atau Anda bisa menghubungi kami melalui email atau sosial media kami.
                </p>
                <form action="{{ route('contacus.store') }}" method="post">
                    @csrf
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
                        <label for="subject" class="form-label">
                            Subject
                        </label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                            class="form-control @error('subject')is-invalid @enderror">
                        @error('subject')
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
            </x-public.col>
        </x-public.row>
    </x-public.section>

    @pushOnce('scripts')
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
    @endPushOnce
</x-public.app-layout>
