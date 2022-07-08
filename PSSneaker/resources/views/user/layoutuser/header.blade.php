<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="rowheader">
                <div class="col-sm-6">
                    <div class="sloganinfo">
                        <marquee class="slogan">{{$setting->slogan}}</marquee>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav0 nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>{{$setting->phone}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>{{$setting->email}}</a></li>
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
                        <div class="logo">
                            <a href="{{route('index')}}"><img src="{{$lstlogo->image}}" alt="" /></a>
                        </div>
                        <div class="btn-group  clearfix">
                            <a class="title_backarrow" href="{{route('index')}}">
                                <img src="{{ asset('user/eshopper/images/home/banner.png')}}" alt="" />
                            </a>
                        </div>
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <p>{{session('user')}}</p>
                                <li><a href="{{route('thongtincanhanweb')}}"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="{{Illuminate\Support\Facades\Auth::check() ? route('showcart') : route('dangnhapweb')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                @if(Illuminate\Support\Facades\Auth::check())
                                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                @else
                                <li><a href="{{route('dangnhapweb')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @endif
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
                            <li><a href="{{route('index')}}" class="active">TRANG CHỦ</a></li>
                            <li><a href="{{route('gioithieuweb')}}">GIỚI THIỆU</a></li>
                            <li class="dropdown"><a href="{{route('product')}}">SẢN PHẨM<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($hangsx as $manu)
                                    <li><a href="{{route('productbymanu',$manu->id)}}">{{$manu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('news')}}">TIN TỨC</a>

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