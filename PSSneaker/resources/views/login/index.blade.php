@extends('user.index')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row_none">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Đăng Nhập</h2>
                    <form method="post" action="{{route('dangnhapweb')}}">
                        @csrf
                        <input type="email" name="email" placeholder="Nhập Email" />
                        @if($errors->has('email'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <input type="password" name="password" placeholder="Nhập mật khẩu" />
                        @if($errors->has('password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-default">Đăng Nhập</button>
                    </form>
                    <div class="title_login_quenml">
                        <a href="{{url('/quen-mat-khau')}}">Quên mật khẩu</a>
                    </div>
                    <div class="title_login_quenml">
                        <a href="{{route('dangkiweb')}}">Đăng kí</a>
                    </div>
                    <div>
                        <div class="login_thanh_title">
                            <div class="line_login"></div>
                            <span class="login_title_hoặc">Hoặc</span>
                            <div class="line_login"></div>
                        </div>
                        <div class="soial_login_0">
                            <a href="{{url('auth/redirect/facebook')}}">
                                <button class="btn-ptdn">

                                    <div class="icon_btn_ptdn">
                                        <div class="png_ptdn"></div>
                                    </div>
                                    <div class="txt_ptdn">Face book</div>

                                </button>
                            </a>
                            <a href="{{url('/google')}}">
                                <button class="btn-ptdn">
                                    <div class="icon_btn_ptdn">
                                        <div class="png_ptgg"></div>
                                    </div>
                                    <div class="txt_ptdn">Google</div>
                                </button>
                            </a>
                        </div>
                    </div>

                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
@endsection