@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Quản lý cài đặt</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form class="validation-form" method="post" action="{{route('setting.update',['setting'=>$setting])}}">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin chung</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="slogan">Slogan:</label>
                        <input type="text" class="form-control text-sm" name="slogan" id="slogan" placeholder="Slogan" value="{{$setting->slogan}}" required>
                        @if($errors->has('slogan'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('slogan')}}
                        </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control text-sm" name="address" id="address" placeholder="Địa chỉ" value="{{$setting->address}}" required>
                        @if($errors->has('address'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('address')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control text-sm" name="email" id="email" placeholder="Email" value="{{$setting->email}}" required>
                        @if($errors->has('email'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control text-sm" name="phone" id="phone" placeholder="Điện thoại" value="{{$setting->phone}}" required>
                        @if($errors->has('phone'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('phone')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="hotline">Hotline:</label>
                        <input type="text" class="form-control text-sm" name="hotline" id="hotline" placeholder="Hotline" value="{{$setting->hotline}}" required>
                        @if($errors->has('hotline'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('hotline')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="zalo">Zalo:</label>
                        <input type="text" class="form-control text-sm" name="zalo" id="zalo" placeholder="Zalo" value="{{$setting->zalo}}">
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="fanpage">Fanpage:</label>
                        <input type="text" class="form-control text-sm" name="fanpage" id="fanpage" placeholder="Fanpage" value="{{$setting->fanpage}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="coords_iframe">
                        <span>Tọa độ google map iframe:</span>
                        <a class="text-sm font-weight-normal ml-1" href="https://www.google.com/maps" target="_blank" title="Lấy mã nhúng google map">(Lấy mã nhúng)</a>
                    </label>
                    <textarea class="form-control text-sm" name="coords_iframe" id="coords_iframe" rows="5" placeholder="Tọa độ google map iframe">{{$setting->iframeggmap}}</textarea>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection