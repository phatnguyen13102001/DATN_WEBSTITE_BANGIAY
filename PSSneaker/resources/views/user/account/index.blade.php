@extends('user.index')
@section('content')
<div class="wrap_acount">
    <div class="w3-content w3-margin-top" style="max-width:1400px;">
    <form class="validation-form" method="post" action="{{route('capnhatthongtin')}}" enctype="multipart/form-data">
    @csrf  <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <img src="/storage/{{$taikhoan->avatar}}" style="width:100%" alt="Avatar">
                        <input type="file" id="file" name="avatar">
                            <label for="file" id="uploadBtn">Chọn Ảnh</label>
                    </div>
                    <div class="w3-container">
                        <div class="accountcontent">
                            <div class="accountlist">
                                <ul class="list-unstyled">
                                    <li class="current">
                                        <a href="{{route('lichsudonhang',Auth::user()->id)}}">Đơn hàng của bạn</a>
                                    </li>
                                    <li class="current">
                                        <a href="{{route('doimatkhau')}}">Đổi mật khẩu</a>
                                    </li>
                                    <li class="current">
                                        <a href="{{route('logout')}}">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><br>
                <!-- End Left Column -->
            </div>
            <!-- Right Column -->
            <div class="w3-twothird">

                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-twothird_title_main">Tài khoản của bạn</h2>
                </div>
          
                   
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                    @endif
                    <div class="form-row">
                        <div class="contact-input col-sm-12">
                            <p class="txt_name_profile">Họ và tên:</p>
                            <input type="text" class="form-control text-sm" name="name" placeholder="" value="{{$taikhoan->name}}" required />
                            @if($errors->has('name'))
                <p class="mb-1 bg-danger"> {{$errors->first('name')}}</p>
                @endif
                        </div>
                        <div class="contact-input col-sm-12">
                            <p class="txt_name_profile">Số điện thoại:</p>
                            <input type="number" class="form-control text-sm" name="phone" placeholder="" value="{{$taikhoan->phone}}" required />
                            @if($errors->has('phone'))
                <p class="mb-1 bg-danger"> {{$errors->first('phone')}}</p>
                @endif
                        </div>
                        <div class="contact-input col-sm-12">
                            <p class="txt_name_profile">Email:</p>
                            <input type="email" class="form-control text-sm" placeholder="" value="{{$taikhoan->email}}" disabled />
                        </div>
                        <div class="contact-input col-sm-12">
                            <p class="txt_name_profile">Giới tính:</p>
                            <select class="custom-select text-sm" name="gender" id="gender">
                                <option value="">Chọn giới tính</option>
                                <option {{ $taikhoan->gender == 1 ? "selected" : "" }} value="1">Nam</option>
                                <option {{ $taikhoan->gender == 0 ? "selected" : "" }} value="0">Nữ</option>
                            </select>
                        </div>
                        <!--  -->
                        <div class="contact-input col-sm-12">
                            <div class="ngaysinh col-sm-6">
                                <p class="txt_name_profile">Ngày sinh:</p>
                                <input type="date" class="form-control text-sm" name="birthday" placeholder="" value="{{$taikhoan->birthday}}" required />
                                @if($errors->has('birthday'))
                                 <p class="mb-1 bg-danger"> {{$errors->first('birthday')}}</p>
                                @endif
                            </div>
                            <div class=" ngaysinh col-sm-5">
                                <div class="ngaysinhprofile">{{$taikhoan->birthday}}</div>
                            </div>
                        </div>
                        <div class="contact-input col-sm-12">

                        </div>
                        <!--  -->
                        <div class="contact-input col-sm-12">
                            <p class="txt_name_profile">Địa chỉ:</p>
                            <input type="text" class="form-control text-sm" name="address" placeholder="" value="{{$taikhoan->address}}" required />
                            @if($errors->has('address'))
                                 <p class="mb-1 bg-danger"> {{$errors->first('address')}}</p>
                                @endif
                        </div>
                    </div>
                    <div class="btn_profile_update">
                        <button class="btn btn-fefault cart_view01" type="submit">Cập nhật</button>
                    </div>
               
            </div>
            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
        </form>
    </div>
   
</div>
@endsection