<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/images/LogoShoes.png')}}" alt="AdminLTELogo" height="150" width="200">
</div> -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-sm-inline-block">
            <a href="../" target="_blank" class="nav-link"><i class="fas fa-reply"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu-info" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-cogs"></i></a>
            <ul aria-labelledby="dropdownSubMenu-info" class="dropdown-menu dropdown-menu-right border-0 shadow" style="left: inherit; right: 0px;">
                <li>
                    <a href="{{route('information.index')}}" class="dropdown-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Thông tin admin</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="" class="dropdown-item">
                        <i class="fas fa-key"></i>
                        <span>Đổi mật khẩu</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
            </ul>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fas fa-bell"></i>
                <span class="badge badge-danger">{{$lstorder1}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header p-0">Thông báo</span>
                <div class="dropdown-divider"></div>
                <a href="{{route('order.index')}}" class="dropdown-item"><i class="fas fa-shopping-bag mr-2"></i><span class="badge badge-danger mr-1">{{$lstorder1}}</span> Đơn hàng</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item d-sm-inline-block">
            <a href="{{route('logout')}}" class="nav-link"><i class="fas fa-sign-out-alt mr-1"></i></a>
        </li>
    </ul>
</nav>