<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="rowheader">
                <div class="col-sm-6">
                    <div class="sloganinfo">
                        <marquee class="slogan" behavior="" direction="">slogan</marquee>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav0 nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->
    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="flex_logo_title">
                        <div class="logo pull-left">
                            <a href="{{route('indexuser')}}"><img src="{{ asset('user/eshopper/images/home/logodoan.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group  clearfix">
                            <a class="title_backarrow" href="{{route('indexuser')}}">
                                <div class="title_header_middle">PS SNEAKEr</div>
                            </a>
                        </div>
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('thongtincanhanweb')}}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a id="test1"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <li><a href=""><i class="fa fa-lock"></i> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 clearfix">

                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('indexuser')}}" class="active">TRANG CHỦ</a></li>
                            <li><a href="{{route('gioithieuweb')}}">GIỚI THIỆU</a></li>
                            <li class="dropdown"><a href="{{route('sanphamweb')}}">SẢN PHẨM<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">list</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="login.html">Login</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('tintucweb')}}">TIN TỨC</a>

                            </li>
                            <li><a href="{{route('lienheweb')}}">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" />
                        <p onclick="onSearch('keyword');"><i class="fas fa-search"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>