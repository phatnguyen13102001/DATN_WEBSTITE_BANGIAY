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
                    <a href="{{route('inforadmin')}}" class="dropdown-item">
                        <i class="fas fa-user-cog"></i>
                        <span>Thông tin admin</span>
                    </a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a href="{{route('changepassword')}}" class="dropdown-item">
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
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header p-0">Thông báo</span>
                <div class="dropdown-divider"></div>
                <a href="{{route('contact')}}" class="dropdown-item"><i class="fas fa-envelope mr-2"></i><span class="badge badge-danger mr-1">0</span> Liên hệ</a>
                <div class="dropdown-divider"></div>
                <a href="index.php?com=order&amp;act=man" class="dropdown-item"><i class="fas fa-shopping-bag mr-2"></i><span class="badge badge-danger mr-1">7</span> Đơn hàng</a>
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
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="index.php">
        <img class="brand-image" src="{{ asset('admin/images/LogoShoes.png') }}" alt="PSSneaker">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('account')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Quản lý tài khoản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product')}}" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Quản lý sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('manufacturer')}}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Quản lý hãng sản xuất
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            Quản lý trang tĩnh
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Giới thiệu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Quản lý hình ảnh
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{(route('logo'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('favicon'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Favicon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('slideshow'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slideshow</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('social'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{(route('news'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('policy'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chính sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('payment'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hình thức thanh toán</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{(route('order'))}}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Quản lý đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{(route('setting'))}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Cài đặt website
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>