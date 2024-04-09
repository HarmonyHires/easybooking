<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('theme/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header">Insight Analytics</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Data Master</li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->routeIs('categories.index', 'categories.create', 'categories.edit') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('venues.index') }}"
                        class="nav-link {{ request()->routeIs('venues.index') }}">
                        <i class="nav-icon bi bi-geo-fill"></i>
                        <p>
                            Venues
                        </p>
                    </a>
                </li>

                <li class="nav-header">User Managements</li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.index', 'users.create', 'users.edit') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('roles.index') }}"
                        class="nav-link {{ request()->routeIs('roles.index', 'roles.create', 'roles.edit') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-fill-gear"></i>
                        <p>
                            Roles
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permissions.index') }}"
                        class="nav-link {{ request()->routeIs('permissions.index', 'permissions.create', 'permissions.edit') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-shield-lock-fill"></i>
                        <p>
                            Permissions
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
