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
                @endif
                
                <div class="login-form">
                    <!--login form-->
                    <h2>Điền Email để lấy lại mật khẩu</h2>
                    <form method="post" action="{{url('/recover-pass')}}">
                        @csrf
                        <input type="email" name="email" placeholder="Nhập Email..." />
                        @if($errors->has('email'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
        </div>
    </div>
</section>
@endsection