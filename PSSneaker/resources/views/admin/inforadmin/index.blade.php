@extends('admin.index')
@section('content')
<section class="content">
    <form class="validation-form" method="post" action="{{route('information.update',['information'=>$user->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
        @if($errors->has('name') || $errors->has('phone'))
        <div class="card bg-gradient-danger">
            <div class="card-header">
                <h3 class="card-title">Thông báo</h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
            </div>
            <div class="card-body" style="display: block;">
                @if($errors->has('name'))
                <p class="mb-1">- {{$errors->first('name')}}</p>
                @endif
                @if($errors->has('phone'))
                <p class="mb-1">- {{$errors->first('phone')}}</p>
                @endif
            </div>
        </div>
        @endif
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin admin</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12 align-middle">
                        <div class="profile-pic-div">
                            <img src="{{$user->avatar}}" id="photo">
                            <input type="file" id="file" name="avatar">
                            <label for="file" id="uploadBtn">Chọn Ảnh</label>
                        </div>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="name">Họ tên: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-sm" name="name" id="name" placeholder="Họ tên" value="{{$user->name}}" required>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control text-sm" name="email" id="email" placeholder="Email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control text-sm" name="phone" id="phone" placeholder="Điện thoại" value="{{$user->phone}}" require>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="gender">Giới tính:</label>
                        <select class="custom-select text-sm" name="gender" id="gender">
                            <option value="">Chọn giới tính</option>
                            <option {{ $user->gender == 1 ? "selected" : "" }} value="1">Nam</option>
                            <option {{ $user->gender == 0 ? "selected" : "" }} value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="birthday">Ngày sinh:</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" name="birthday" value="{{ date('m/d/Y',strtotime($user->birthday)) }}">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control text-sm" name="address" id="address" placeholder="Địa chỉ" value="{{$user->address}}">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection