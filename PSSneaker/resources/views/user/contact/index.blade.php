@extends('user.index')
@section('content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Liên hệ</h2>
                <div id="gmap" class="contact-map">
                    <iframe src="{{$setting->iframeggmap}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                    <h2 class="title text-center">Social Networking</h2>
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection