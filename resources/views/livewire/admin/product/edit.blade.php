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
                        <label for="category_id" class="form-label">Product Category</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <select wire:model="category_id" name="category_id" class="form-control">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error ('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="product_name" class="form-label">Product Name</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="product_name"
                            type="text"
                            class="form-control @error ('product_name') is-invalid @enderror"
                            placeholder="Input product name..." />
                        @error ('product_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="stock" class="form-label">Stock</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="stock"
                            type="text"
                            class="form-control @error ('stock') is-invalid @enderror"
                            placeholder="Input product stock..." />
                        @error ('stock')
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
