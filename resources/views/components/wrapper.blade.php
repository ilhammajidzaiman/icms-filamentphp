<div {{ $attributes->merge(['class' => 'w-full']) }}>
    {{ $slot ?? null }}
</div>
