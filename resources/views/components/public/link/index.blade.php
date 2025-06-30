<a
    {{ $attributes->merge([
        'href' => null,
        'class' => 'text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover',
    ]) }}>
    {{ $slot }}
</a>
