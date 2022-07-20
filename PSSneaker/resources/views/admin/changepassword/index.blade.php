@extends('admin.index')
@section('content')
<section class="content">
    <form class="validation-form" novalidate="" method="post" action="{{route('capnhatmatkhauadmin')}}" enctype="multipart/form-data">
       @csrf
    <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin admin</h3>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {!! session()->get('success')!!}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error')!!}
                </div>
                @endif
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="old-password">Mật khẩu cũ:</label>
                        <input type="password" class="form-control text-sm" name="password" placeholder="Mật khẩu cũ">
                        @if($errors->has('password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="old-password">Mật khẩu mới:</label>
                        <input type="password" class="form-control text-sm" name="new_password" placeholder="Mật khẩu mới">
                        @if($errors->has('new-password'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('new-password')}}
                        </div>
                        @endif
                    </div>
                  
                </div>
            </div>
        </div>
    </form>
</section>
@endsection