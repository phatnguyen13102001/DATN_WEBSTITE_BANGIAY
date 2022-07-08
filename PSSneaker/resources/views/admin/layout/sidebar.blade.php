<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="{{route('admin')}}">
        <img class="brand-image" src="{{asset('admin_pssneaker/images/LogoShoes.png')}}" alt="PSSneaker">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('account.index')}}" class="nav-link {{ (request()->is('admin/account')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Quản lý tài khoản
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link {{ (request()->is('admin/product')) || (request()->is('admin/product/create')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Quản lý sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('manufacturer.index')}}" class="nav-link {{ (request()->is('admin/manufacturer')) || (request()->is('admin/manufacturer/edit')) || (request()->is('admin/manufacturer/create')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Quản lý hãng sản xuất
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('size.index')}}" class="nav-link {{ (request()->is('admin/size')) || (request()->is('admin/size/edit')) || (request()->is('admin/size/create')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Quản lý size
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('color.index')}}" class="nav-link {{ (request()->is('admin/color')) || (request()->is('admin/color/edit')) || (request()->is('admin/color/create')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Quản lý màu
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('admin/about')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/about')) ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-bookmark"></i>
                        <p>
                            Quản lý trang tĩnh
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('about.index')}}" class="nav-link {{ (request()->is('admin/about')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Giới thiệu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('admin/logo')) || (request()->is('admin/slideshow')) || (request()->is('admin/social')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/logo')) || (request()->is('admin/slideshow')) || (request()->is('admin/social')) ? 'active' : '' }}">
                        <i class=" nav-icon fas fa-images"></i>
                        <p>
                            Quản lý hình ảnh
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('logo.index')}}" class="nav-link {{ (request()->is('admin/logo')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('slideshow.index'))}}" class="nav-link {{ (request()->is('admin/slideshow')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slideshow</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('social.index'))}}" class="nav-link {{ (request()->is('admin/social')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('admin/news')) || (request()->is('admin/policy')) || (request()->is('admin/payment')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/news')) || (request()->is('admin/policy')) || (request()->is('admin/payment')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{(route('news.index'))}}" class="nav-link {{ (request()->is('admin/news')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{(route('policy.index'))}}" class="nav-link {{ (request()->is('admin/policy')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Chính sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('payment.index')}}" class="nav-link {{ (request()->is('admin/payment')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hình thức thanh toán</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link {{ (request()->is('admin/order')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Quản lý đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('setting.index')}}" class="nav-link {{ (request()->is('admin/setting')) ? 'active' : '' }}">
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