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
                        <li class="breadcrumb-item active">Quản lý trang tĩnh</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" method="post" action="{{route('about.update',['about'=>$about])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
        @if($errors->has('title'))
        <div class="card bg-gradient-danger">
            <div class="card-header">
                <h3 class="card-title">Thông báo</h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
            </div>
            <div class="card-body" style="display: block;">
                @if($errors->has('title'))
                <p class="mb-1">- {{$errors->first('title')}}</p>
                @endif
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung Giới thiệu</h3>
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
                                            <label for="title">Tiêu đề:</label>
                                            <input type="text" class="form-control for-seo text-sm" name="title" id="title" placeholder="Tiêu đề" value="{{$about->title}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Nội dung:</label>
                                            <textarea class="form-control for-seo text-sm form-control-ckeditor" name="content" id="content" rows="5" placeholder="Nội dung">{{$about->content}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection