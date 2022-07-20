@extends('user.index')
@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Liên hệ</h2>
                <div id="gmap" class="contact-map">
                    <?= htmlspecialchars_decode($setting->iframeggmap) ?>
                </div>
            </div>
        </div>
        <form action="{{route('lienheweb.post')}}" method="POST" role="form">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" name="phone" class="form-control" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="topic" class="form-control" placeholder="Chủ đề">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="content" id="message" class="form-control" rows="8" placeholder="Nội dung"></textarea>
                        </div>
                        <div class="form-group1 col-md-12">
                            <button type="submit" class="btnpull-right_gui">Gửi</button>
                        </div>
                    </div>
                </div>
        </form>
        <div class="col-sm-4">
            <div class="contact-info">
                <h2 class="title text-center">Thông tin liên hệ</h2>
                <address>
                    <p>PS SNEAKER</p>
                    <p>Địa chỉ:{{$setting->address}}</p>
                    <p>Số điện thoại:{{$setting->phone}}</p>
                    <p>Email: {{$setting->email}}</p>
                    <p>Fangage:<a href="{{$setting->fanpage}}">{{$setting->fanpage}}</a></p>
                </address>
                <div class="social-networks">
                    <h2 class="title text-center">Mạng xã hội</h2>
                    <ul>
                        @foreach($mangxh as $key)
                        <li class="d-inline-block align-top mr-1">
                            <a href="{{$key->link}}" target="_blank">
                                <img src="{{$key->image}}" alt="social" />
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection