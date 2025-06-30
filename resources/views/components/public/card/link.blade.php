{{-- <div class="card-text">
    <a href="{{ $href ?? null }}"
        class="text-reset link-dark link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
        {{ $value ?? null }}
    </a>
</div> --}}
<div class="card-text">
    <x-public.link href="{{ $href ?? null }}">
        {{ $slot }}
    </x-public.link>
</div>




{{-- <div class="card">
    <img src="" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </p>
    </div>
</div>
buatkan 
component card.
component card-image.
component card-body.
component card-title.
component card-text.
component link untuk anchor. --}}
