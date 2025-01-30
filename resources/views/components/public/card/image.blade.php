<a href="{{ $href ?? null }}">
    <img src="{{ $src ?? null }}" alt="image"
        {{ $attributes->merge(['class' => 'w-100 rounded-2 vh-20 bg-secondary-subtle']) }}>
</a>
