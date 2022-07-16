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
                            <a href="{{route('index')}}"><img src="{{$lstlogo->image}}" alt="Logo" /></a>
                        </div>
                        <div class="btn-group clearfix">
                            <a class="title_backarrow sss" href="{{route('index')}}">
                                <img src="{{ asset('user/eshopper/images/home/banner.png')}}" alt="banner" />
                            </a>
                        </div>
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <p>{{session('user')}}</p>
                                @if(Auth::user()==true)
                                @auth <li><a href="{{route('thongtincanhanweb',Auth::user()->id)}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li> @endauth
                                @else
                                @endif
                                <li><a href="{{Illuminate\Support\Facades\Auth::check() ? route('showcart') : route('dangnhapweb')}}"> @if(Illuminate\Support\Facades\Auth::check())<span class="badge badge-danger">{{Cart::instance(Auth::user())->count()}}</span>@else @endif<i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                @if(Illuminate\Support\Facades\Auth::check())
                                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                @else
                                <li><a href="{{route('dangnhapweb')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
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
                            <li><a href="{{route('index')}}" class="{{ (request()->is('index')) ? 'active' : '' }}">TRANG CHỦ</a></li>
                            <li><a href="{{route('gioithieuweb')}}" class="{{ (request()->is('gioithieu')) ? 'active' : '' }}">GIỚI THIỆU</a></li>
                            <li class="dropdown"><a href="{{route('product')}}" class="{{ (request()->is('product')) || (request()->is('product_by_manufacturer/*')) || (request()->is('productdetail/*')) ? 'active' : '' }}">SẢN PHẨM<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($hangsx as $manu)
                                    <li><a href="{{route('productbymanu',$manu->id)}}">{{$manu->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('news')}}" class="{{ (request()->is('news')) || (request()->is('newsdetail/*')) ? 'active' : '' }}">TIN TỨC</a>

                            </li>
                            <li><a href="{{route('lienheweb')}}" class="{{ (request()->is('lienhe')) ? 'active' : '' }}">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <form action="{{route('timkiem')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" id="keywords" placeholder="Tìm kiếm sản phẩm..." required />
                            <input type="submit" name="search_item" class="btn btn-success btn-sm" style="border-top-left-radius:0px;border-bottom-left-radius:0px;" value="Tìm kiếm">
                            <div id="search_ajax"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>