<button type="button" class="btn btn-light border-secondary-subtle" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="bi-search"></i>
</button>

@push('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="d-flex" wire:submit="search">
                        <input type="search" wire:model="keyword" placeholder="Cari"
                            class="form-control border-secondary-subtle me-2" autofocus>
                        <button type="submit" class="btn btn-light border-secondary-subtle">
                            <i class="bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
