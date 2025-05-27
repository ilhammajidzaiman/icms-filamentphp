<div class="modal fade" id="modalSearch" tabindex="-1" aria-labelledby="modalSearchLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit="search">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalSearchLabel">{{ Str::ucfirst(__('search box')) }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modalSearch" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="search" id="search" wire:model="keyword" class="form-control"
                        placeholder="{{ Str::ucfirst(__('type here')) }}" autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modalSearch">
                        <i class="bi-x-lg"></i>
                        {{ Str::headline(__('close')) }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi-search"></i>
                        {{ Str::headline(__('search')) }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
