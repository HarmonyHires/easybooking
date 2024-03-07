<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="bi bi-info-circle-fill"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media align-items-center">
                        <i class="bi bi-person-fill-gear mr-3"></i>
                        <h3 class="dropdown-item-title">
                            {{ Auth::user()->roles[0]['name'] }}
                        </h3>
                    </div>
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media align-items-center">
                        <i class="bi bi-person-circle mr-3"></i>
                        <h3 class="dropdown-item-title">
                            {{ Auth::user()->name }}
                        </h3>
                    </div>
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media align-items-center">
                        <i class="bi bi-gear-fill mr-3"></i>
                        <h3 class="dropdown-item-title">
                            Settings
                        </h3>
                    </div>
                </a>

                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <div class="media align-items-center">
                        <i class="bi bi-gear-fill mr-3"></i>
                        <h3 class="dropdown-item-title text-red">
                            {{ __('Logout') }}
                        </h3>
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
