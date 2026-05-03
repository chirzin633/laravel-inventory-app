<div>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1>
                            <i class="mr-1 fas fa-list"></i>
                            @yield ('title')
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="float-sm-right breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="mr-1 fas fa-home"></i>Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">@yield ('title')</li>
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
                            <button class="btn btn-sm btn-primary"><i class="mr-1 fas fa-plus"></i>Add Data</button>
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
                <div class="card-body">DATA CATEGORY</div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
</div>
