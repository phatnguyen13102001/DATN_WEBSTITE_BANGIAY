@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý Slideshow</li>
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
            <a class="btn btn-sm bg-gradient-danger" href="index.php?com=photo&amp;act=man_photo&amp;type=slide" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
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
                                <img class="rounded img-upload" src="{{$slideshow->image}}" alt="Alt Photo">
                            </div>
                            <div class="custom-file my-custom-file">
                                <input accept="*.jpg,*.png" type="file" class="custom-file-input" name="image" id="image" lang="vi">
                                <label class="custom-file-label mb-0" data-browse="Chọn" for="image">Chọn file</label>
                                @if($errors->has('image'))
                                <div class="alert alert-danger" style="margin-top:10px;">
                                    {{$errors->first('image')}}
                                </div>
                                @endif
                            </div>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control text-sm" name="link" id="link" placeholder="Link" value="{{$slideshow->link}}">
                    @if($errors->has('link'))
                    <div class="alert alert-danger" style="margin-top:10px;">
                        {{$errors->first('link')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="show" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="show" class="custom-control-input hienthi-checkbox" name="show" id="show" checked="" value="{{$slideshow->show}}">
                            <label for="show" class="custom-control-label"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection