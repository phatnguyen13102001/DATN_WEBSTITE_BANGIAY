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
                        <li class="breadcrumb-item active">Chỉnh sửa Slideshow</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" novalidate="" method="post" action="{{route('slideshow.update',['slideshow'=> $slideshow])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="{{route('slideshow.index')}}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        @if($errors->has('link') || $errors->has('image'))
        <div class="card bg-gradient-danger">
            <div class="card-header">
                <h3 class="card-title">Thông báo</h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
            </div>
            <div class="card-body" style="display: block;">
                @if($errors->has('image'))
                <p class="mb-1">- {{$errors->first('image')}}</p>
                @endif
                @if($errors->has('link'))
                <p class="mb-1">- {{$errors->first('link')}}</p>
                @endif
            </div>
        </div>
        @endif
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết Slideshow</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="upload-file">
                        <p>Upload hình ảnh:</p>
                        <label class="upload-file-label mb-2" for="file">
                            <div class="upload-file-image rounded mb-3">
                                <img class="rounded img-upload" id="photoUpload-preview" src="{{$slideshow->image}}" alt="Alt Photo">
                            </div>
                            <div class="custom-file my-custom-file">
                                <input type="file" class="custom-file-input" name="image" id="file-zone">
                                <label class="custom-file-label mb-0" data-browse="Chọn" for="file">Chọn file</label>
                            </div>
                        </label>
                        <strong class="d-block text-sm">Width: 1440 px - Height: 450 px (.jpg|.gif|.png|.jpeg|.gif)</strong>
                    </div>
                </div>
                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control text-sm" name="link" id="link" placeholder="Link" value="{{$slideshow->link}}" required>
                </div>
                <div class="form-group">
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="show" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            @if(($slideshow->show)===1)
                            <input type="checkbox" class="custom-control-input hienthi-checkbox" name="show" id="show" value="1" checked>
                            <label for="show" class="custom-control-label"></label>
                            @else
                            <input type="checkbox" class="custom-control-input hienthi-checkbox" name="show" id="show" value="1">
                            <label for="show" class="custom-control-label"></label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection