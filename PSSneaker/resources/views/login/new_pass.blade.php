@extends('user.index')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row_none">
            <div class="col-sm-4 col-sm-offset-1">
                @if(session()->has('message'))
                <div class="alert alert-success">
                {!! session()->get('message')!!}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                {!! session()->get('error')!!}
                </div>
                @elseif(session()->has('errort'))
                <div class="alert alert-danger">
                {!! session()->get('errort')!!}
                </div>
                @endif
                <div class="login-form">
                    @php
                    $token = $_GET['token'];
                    $email = $_GET['email'];
                    @endphp
                    <!--login form-->
                    <h2>Nhập mật khẩu mới</h2>
                    <form method="post" action="{{url('/reset-new-pass')}}">
                        @csrf   
                        <input type="hidden" name="email" value="{{$email}}"/>
                        <input type="hidden" name="token" value="{{$token}}"/>
                        <input type="text" name="password" placeholder="Nhập mật khẩu mới..." />
                        @if($errors->has('email'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-default">Cập nhật</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
@endsection