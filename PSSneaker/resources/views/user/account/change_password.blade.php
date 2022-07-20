@extends('user.index')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row_none">
            <div class="col-sm-4 col-sm-offset-1">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {!! session()->get('success')!!}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error')!!}
                </div>
                @endif
                <div class="login-form">
                    <!--login form-->
                    <h2>Đổi mật khẩu</h2>
                    <form method="post" action="{{route('capnhatmatkhau')}}">
                        @csrf
                        <input type="password" name="password" placeholder="Nhập mật khẩu cũ..." />
                        @if($errors->has('password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <input type="password" name="new_password" placeholder="Nhập mật khẩu mới..." />
                        @if($errors->has('new_password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('new_password')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-default">Cập nhật mật khẩu</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
@endsection