<h3 class="fs-3 fw-normal">
    <a href="{{ $href ?? null }}"
        {{ $attributes->merge(['class' => 'text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover']) }}>
        {{ $value ?? null }}
    </a>
</h3>
