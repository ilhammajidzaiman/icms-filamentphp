<a href="{{ $href ?? null }}"
    {{ $attributes->merge(['class' => 'badge rounded-pill link-underline link-underline-opacity-0']) }}>
    {{ $value ?? null }}
</a>
