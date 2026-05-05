<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>
                            <i class="mr-1 fas fa-user"></i>
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
                                wire:click="create"
                                type="button"
                                class="btn btn-sm btn-primary"
                                data-toggle="modal"
                                data-target="#createModal">
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role === 'Super Admin')
                                                <span class="badge badge-info">{{ $user->role }}</span>
                                            @else
                                                <span class="badge badge-light"> {{ $user->role }} </span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <button
                                                wire:click="edit({{ $user->id }})"
                                                data-toggle="modal"
                                                data-target="#editModal"
                                                class="btn btn-sm btn-warning">
                                                <i class="mr-1 fas fa-edit"></i>Edit
                                            </button>
                                            <button
                                                wire:click="confirm({{ $user->id }})"
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
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->

        {{-- Create Modal --}}
        @include ('livewire.superadmin.user.create')
        {{-- Create Modal --}}

        {{-- Edit Modal --}}
        @include ('livewire.superadmin.user.edit')
        {{-- Edit Modal --}}

        {{-- Delete Modal --}}
        @include ('livewire.superadmin.user.delete')
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
