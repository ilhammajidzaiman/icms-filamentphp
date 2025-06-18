<div class="d-flex flex-wrap mb-4">
    <form class="d-flex col-12 col-lg-auto" wire:submit="search">
        <input type="search" wire:model="keyword" placeholder="{{ Str::ucfirst(__('tulis kata kunci di sini…')) }}"
            class="form-control border-secondary-subtle me-2" autofocus>
        <button type="submit" class="btn btn-light border-secondary-subtle">
            <i class="bi-search"></i>
        </button>
    </form>
</div>
