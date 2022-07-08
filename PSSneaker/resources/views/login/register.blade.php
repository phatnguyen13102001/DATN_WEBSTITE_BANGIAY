@extends('user.index')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row_none">
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Đăng kí</h2>
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
                        <select id="gender" name="gender">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                        @if($errors->has('gender'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('gender')}}
                        </div>
                        @endif
                        <input type="date" name="birthday" placeholder="Ngày sinh" />
                        @if($errors->has('birthday'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('birthday')}}
                        </div>
                        @endif
                        <input type="text" name="address" placeholder="Địa chỉ" />
                        @if($errors->has('address'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('address')}}
                        </div>
                        @endif
                        <!--  -->
                        <div class="card card-primary card-outline text-sm" id="card_image">
                    
                    <div class="card-body">
                        <div class="photoUpload-zone">
                            <div class="photoUpload-detail">
                                <img id="photoUpload-preview" src="{{asset('admin_pssneaker/images/noimage.png')}}" alt="Alt Photo">
                            </div>
                            <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                <input type="file" name="avatar" id="file-zone">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                            </label>
                        </div>
                    </div>
                </div>
                        <!--  -->
                        <input type="password" name="password" placeholder="Mật khẩu" />
                        @if($errors->has('password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <button type="submit" class="btn btn-default">Đăng kí</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
@endsection