@extends('user.index')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row_none">
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Đăng Kí</h2>
                    <form method="post" action="{{route('dangkiweb')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Họ và tên" />
                        @if($errors->has('name'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('name')}}
                        </div>
                        @endif
                        <input type="email" name="email" placeholder="Email" />
                        @if($errors->has('email'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <input type="number" name="phone" placeholder="Số điện thoại" />
                        @if($errors->has('phone'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('phone')}}
                        </div>
                        @endif
                        <input type="text" name="address" placeholder="Địa chỉ" />
                        @if($errors->has('address'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('address')}}
                        </div>
                        @endif
                        <input type="password" name="password" placeholder="Mật khẩu" />
                        @if($errors->has('password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-default">Đăng Kí</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
@endsection