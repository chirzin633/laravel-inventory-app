<div
    wire:ignore.self
    class="modal fade"
    id="deleteModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">Name</div>
                    <div class="col-8">: {{ $name }}</div>
                </div>
                <div class="row">
                    <div class="col-4">Email</div>
                    <div class="col-8">: {{ $email }}</div>
                </div>

                <div class="row">
                    <div class="col-4">Role</div>
                    <div class="col-8">
                        :
                        @if ($role === 'Super Admin')
                            <span class="badge badge-info"> {{ $role }} </span>
                        @else
                            <span class="badge badge-light"> {{ $role }} </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    <i class="fas fa-times mr-1"></i>Close
                </button>
                <button wire:click="destroy" type="button" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash mr-1"></i>Delete
                </button>
            </div>
        </div>
    </div>
</div>
