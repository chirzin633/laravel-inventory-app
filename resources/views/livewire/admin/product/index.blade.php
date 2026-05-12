<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>
                            <i class="mr-1 fas fa-warehouse"></i>
                            {{ $title }}
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="float-sm-right breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="mr-1 fas fa-home"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <button
                                wire.click="create"
                                data-toggle="modal"
                                data-target="#createModal"
                                class="btn btn-sm btn-primary">
                                <i class="mr-1 fas fa-plus"></i>Add Data
                            </button>
                        </div>
                        <div class="btn-group dropleft">
                            <button
                                type="button"
                                class="btn btn-warning btn-sm dropdown-toggle"
                                data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mr-1 fas fa-print"></i>
                                Cetak
                            </button>
                            <div class="dropdown-menu">
                                <a class="text-success dropdown-item" href="#"
                                    ><i class="mr-2 fas fa-file-excel"></i>Excel</a
                                >
                                <a class="text-danger dropdown-item" href="#"
                                    ><i class="mr-2 fas fa-file-pdf"></i>PDF</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2 d-flex justify-content-between">
                        <div class="col-2">
                            <select wire:model.live="paginate" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input wire:model.live="search" type="text" placeholder="Search..." class="form-control" />
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Stock</th>
                                    <th><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $products->firstItem() + $loop->index }}</td>
                                        <td>{{ $product->categories->category_name ?? 'Uncategorized' }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->stock }}</td>

                                        <td class="text-center">
                                            <button
                                                wire:click="edit({{ $product->id }})"
                                                data-toggle="modal"
                                                data-target="#editModal"
                                                class="btn btn-sm btn-warning">
                                                <i class="mr-1 fas fa-edit"></i>Edit
                                            </button>
                                            <button
                                                wire:click="confirm({{ $product->id }})"
                                                class="btn btn-sm btn-danger"
                                                data-toggle="modal"
                                                data-target="#deleteModal">
                                                <i class="mr-1 fas fa-trash"></i>Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->

        {{-- Create Modal --}}
        @include ('livewire.admin.product.create')
        {{-- Create Modal --}}

        {{-- Edit Modal --}}
        @include ('livewire.admin.product.edit')
        {{-- Edit Modal --}}

        {{-- Delete Modal --}}
        @include ('livewire.admin.product.delete')
        {{-- Delete Modal --}}

        {{-- Close Create Modal --}}
        @script
            <script>
                $wire.on('closeCreateModal', () => {
                    $('#createModal').modal('hide');
                });
            </script>
        @endscript
        {{-- Close Create Modal --}}

        {{-- Close Edit Modal --}}
        @script
            <script>
                $wire.on('closeEditModal', () => {
                    $('#editModal').modal('hide');
                });
            </script>
        @endscript
        {{-- Close Edit Modal --}}

        {{-- Close Delete Modal --}}
        @script
            <script>
                $wire.on('closeDeleteModal', () => {
                    $('#deleteModal').modal('hide');
                });
            </script>
        @endscript
        {{-- Close Delete Modal --}}

        {{-- Sweet Alert --}}
        @include ('sweetalert2::index')
        {{-- Sweet Alert --}}
    </div>
</div>
