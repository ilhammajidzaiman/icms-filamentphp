{{-- <form class="d-flex" wire:submit="search">
    <input type="search" wire:model="keyword" placeholder="Cari" class="form-control border-secondary-subtle me-2">
    <button type="submit" class="btn btn-light border-secondary-subtle">
        <i class="bi-search"></i>
    </button>
</form> --}}


<div class="d-flex flex-wrap">
    <form class="d-flex col-12 col-lg-auto" wire:submit="search">
        <input type="search" wire:model="keyword" placeholder="Cari" class="form-control border-secondary-subtle me-2">
        <button type="submit" class="btn btn-light border-secondary-subtle">
            <i class="bi-search"></i>
        </button>
    </form>
</div>
