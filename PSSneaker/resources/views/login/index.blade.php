@extends('user.index')
@section('content')
<section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Đăng nhập</h2>
                        <form action="#">
                            <input type="email" placeholder="Nhập Email" />
                            <input type="password" placeholder="Nhập mật khẩu" />
                            <button type="submit" class="btn btn-default">Login</button>
                            <div class="title_login_quenml">
                                <a href="">Quên mật khẩu</a>
                            </div>
                            <div>
                                <div class="login_thanh_title">
                                    <div class="line_login"></div>
                                    <span class="login_title_hoặc">Hoặc</span>
                                    <div class="line_login"></div>
                                </div>
                                <div class="soial_login_0">
                                    <button class="btn-ptdn">
										<div class="icon_btn_ptdn">
											<div class="png_ptdn"></div>
										</div>
										<div class="txt_ptdn">Face book</div>
									</button>
                                    <button class="btn-ptdn">
										<div class="icon_btn_ptdn">
											<div class="png_ptgg"></div>
										</div>
										<div class="txt_ptdn">Google</div>
									</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or"></h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng kí</h2>
                        <form action="#">
                            <input type="text" placeholder="Họ và tên" />
                            <input type="email" placeholder="Email" />
                            <input type="number" placeholder="Số điện thoại" />
                            <input type="text" placeholder="Địa chỉ" />
                            <input type="password" placeholder="Mật khẩu" />
                            <button type="submit" class="btn btn-default">Đăng kí</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
 </section>
 @endsection