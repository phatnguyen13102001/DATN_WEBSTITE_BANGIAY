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
                        <li class="breadcrumb-item active">Quản lý hình ảnh</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" novalidate="" method="post" action="{{route('logo.update',['logo'=>$logo])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết Logo</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="upload-file">
                        <p>Upload hình ảnh:</p>
                        <label class="upload-file-label mb-2" for="file">
                            <div class="upload-file-image rounded mb-3">
                                <img class="rounded img-upload" id="photoUpload-preview" src="{{$logo->image}}" alt="Alt Photo">
                            </div>
                            <div class="custom-file my-custom-file">
                                <input type="file" class="custom-file-input" name="image" id="file-zone">
                                <label class="custom-file-label mb-0" data-browse="Chọn" for="file">Chọn file</label>
                            </div>
                        </label>
                        @if($errors->has('image'))
                        <div class="alert alert-danger" style="margin-top:10px;">
                            {{$errors->first('image')}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection