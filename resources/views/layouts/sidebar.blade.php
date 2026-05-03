<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img
            src="{{ asset('adminlte3/dist/img/AdminLTELogo.png') }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle" />
        <span class="font-weight-light brand-text">Inventory App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="flex-column nav nav-pills nav-sidebar" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">SUPER ADMIN</li>
                <li class="nav-item">
                    <a
                        wire:navigate
                        href="{{ route('superadmin.user.index') }}"
                        class="nav-link @yield('menuSuperAdminUser')">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        wire:navigate
                        href="{{ route('superadmin.category.index') }}"
                        class="nav-link @yield('menuSuperAdminCategory')">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        wire:navigate
                        href="{{ route('superadmin.product.index') }}"
                        class="nav-link @yield('menuSuperAdminProduct')">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-header">ADMIN</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>Product</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
