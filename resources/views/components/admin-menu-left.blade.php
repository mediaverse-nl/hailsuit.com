<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.detail.index')}}">
            <i class="fas fa-fw fa-info"></i>
            <span>Details</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.brand.index')}}">
            <i class="fas fa-fw fa-car"></i>
            <span>Brands</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.product.index')}}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Products</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-inbox"></i>
            <span>Orders</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="fas fa-fw fa-font"></i>
            <span>Texts</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.seo-manager.index')}}">
            <i class="fas fa-fw fa-search"></i>
            <span>SEO</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item active" href="blank.html">Blank Page</a>
        </div>
    </li>
</ul>