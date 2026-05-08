<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>
                        <i class="mr-1 fas fa-home"></i>
                        Data Dashboard
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="float-sm-right breadcrumb">
                        <li class="breadcrumb-item">
                            <a wire:navigate href="{{ route('dashboard') }}"
                                ><i class="mr-1 fas fa-home"></i>Dashboard</a
                            >
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalUsers }}</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a wire:navigate href="{{ route('superadmin.user.index') }}" class="small-box-footer"
                            >More info <i class="fas fa-arrow-circle-right"></i
                        ></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalSuperAdmins }}</h3>
                            <p>Super Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a wire:navigate href="{{ route('superadmin.user.index') }}" class="small-box-footer"
                            >More info <i class="fas fa-arrow-circle-right"></i
                        ></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalAdmins }}</h3>
                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a wire:navigate href="{{ route('superadmin.user.index') }}" class="small-box-footer"
                            >More info <i class="fas fa-arrow-circle-right"></i
                        ></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalCategories }}</h3>
                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <a wire:navigate href="{{ route('superadmin.category.index') }}" class="small-box-footer"
                            >More info <i class="fas fa-arrow-circle-right"></i
                        ></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{ $totalProducts }}</h3>
                            <p>Product</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <a wire:navigate href="{{ route('superadmin.product.index') }}" class="small-box-footer"
                            >More info <i class="fas fa-arrow-circle-right"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
