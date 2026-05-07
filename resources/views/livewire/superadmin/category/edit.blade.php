<div
    wire:ignore.self
    class="modal fade"
    id="editModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-4">
                        <label for="category_name" class="form-label">Category Name</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="category_name"
                            type="text"
                            class="form-control @error ('category_name') is-invalid @enderror"
                            placeholder="Input category name..." />
                        @error ('category_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>Close
                </button>
                <button wire:click="update" type="button" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit mr-1"></i>Update
                </button>
            </div>
        </div>
    </div>
</div>
