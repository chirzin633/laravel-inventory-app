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
                        <label for="name" class="form-label">Nama</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="name"
                            type="text"
                            class="form-control @error ('name') is-invalid @enderror"
                            placeholder="Input name..." />
                        @error ('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="email" class="form-label">Email</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="email"
                            type="email"
                            class="form-control @error ('email') is-invalid @enderror"
                            placeholder="Input email..." />
                        @error ('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="role" class="form-label">Role</label>
                        <span class="text-danger">*</span>
                    </div>
                    <div class="col-8">
                        <select name="role" wire:model="role" class="form-control @error('role') is-invalid @enderror">
                            <option selected>--Pilih Role--</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                        </select>
                        @error ('role')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="current_password" class="form-label">Current Password</label>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="current_password"
                            type="password"
                            class="form-control @error ('current_password') is-invalid @enderror"
                            placeholder="Input current password..." />
                        @error ('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="new_password" class="form-label">New Passsword</label>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="new_password"
                            type="password"
                            class="form-control @error ('new_password') is-invalid @enderror"
                            placeholder="Input new password..." />
                        @error ('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <label for="new_password_confirmation" class="form-label">New Password Confirmation</label>
                    </div>
                    <div class="col-8">
                        <input
                            wire:model="new_password_confirmation"
                            type="password"
                            class="form-control @error ('new_password_confirmation') is-invalid @enderror"
                            placeholder="Input new password confirmation..." />
                        @error ('new_password_confirmation')
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
