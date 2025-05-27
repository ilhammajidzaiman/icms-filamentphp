<a href="{{ $href ?? null }}">
    <img src="{{ $src ?? null }}" alt="image"
        {{ $attributes->merge(['class' => 'w-100 rounded-2 bg-secondary-subtle vh-20']) }}>
</a>
