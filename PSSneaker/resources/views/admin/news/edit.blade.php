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
                        <li class="breadcrumb-item active">Chỉnh sửa tin tức</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" novalidate="" method="post" action="{{route('news.update',['news'=>$news])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="{{route('news.index')}}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        @if($errors->has('name') || $errors->has('image'))
        <div class="card bg-gradient-danger">
            <div class="card-header">
                <h3 class="card-title">Thông báo</h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
            </div>
            <div class="card-body" style="display: block;">
                @if($errors->has('name'))
                <p class="mb-1">- {{$errors->first('name')}}</p>
                @endif
                @if($errors->has('image'))
                <p class="mb-1">- {{$errors->first('image')}}</p>
                @endif
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung Tin tức</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-body card-article">
                                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                                    <div class="tab-pane fade show active" id="tabs-lang-vi" role="tabpanel" aria-labelledby="tabs-lang">
                                        <div class="form-group">
                                            <label for="name">Tiêu đề:</label>
                                            <input type="text" class="form-control for-seo text-sm" name="name" id="name" placeholder="Tiêu đề" value="{{$news->name}}" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="describe">Mô tả:</label>
                                            <textarea class="form-control for-seo text-sm " name="describe" id="describe" rows="5" placeholder="Mô tả">{{$news->describe}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Nội dung:</label>
                                            <textarea class="form-control for-seo text-sm form-control-ckeditor" name="content" id="content" rows="5" placeholder="Nội dung">{{$news->content}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh Tin tức</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="photoUpload-zone">
                            <div class="photoUpload-detail">
                                <img id="photoUpload-preview" src="{{$news->image}}" alt="Alt Photo">
                            </div>
                            <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                <input type="file" name="image" id="file-zone">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin Tin tức</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="noibat-checkbox" class="d-inline-block align-middle mb-0 mr-2">Nổi bật:</label>
                        @if(($news->outstanding)===1)
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input noibat-checkbox" name="outstanding" id="outstanding" value="1" checked>
                            <label for="outstanding" class="custom-control-label"></label>
                        </div>
                        @else
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input noibat-checkbox" name="outstanding" id="outstanding" value="1">
                            <label for="outstanding" class="custom-control-label"></label>
                        </div>
                        @endif
                    </div>
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="hienthi-checkbox" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            @if(($news->show)===1)
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