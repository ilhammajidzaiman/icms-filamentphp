<div class="d-flex justify-content-between align-items-end border-bottom mb-3">
    <h3 class="fs-3">
        {{ Str::ucfirst($value ?? null) }}
    </h3>
    <h6 class="fs-6 fw-normal">
        <a href="{{ $href ?? null }}" class="text-decoration-none link-secondary">
            Selengkapnya
            <i class="bi bi-box-arrow-up-right"></i>
        </a>
    </h6>
</div>
