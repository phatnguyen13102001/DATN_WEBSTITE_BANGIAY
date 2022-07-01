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
                        <li class="breadcrumb-item active">Thêm mới chính sách</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" novalidate="" method="post" action="{{route('policy.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="index.php?com=news&amp;act=man&amp;type=chinh-sach" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung Chính sách</h3>
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
                                            <input type="text" class="form-control for-seo text-sm" name="name" id="name" placeholder="Tiêu đề" value="" required="">
                                            @if($errors->has('name'))
                                            <div class="alert alert-danger" style="margin-top:10px;">
                                                {{$errors->first('name')}}
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Nội dung:</label>
                                            <textarea class="form-control for-seo text-sm form-control-ckeditor" name="content" id="content" rows="5" placeholder="Nội dung"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin Chính sách</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="hienthi-checkbox" class="d-inline-block align-middle mb-0 mr-2">Hiển thị:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input hienthi-checkbox" name="show" id="show" value="1" checked>
                            <label for="show" class="custom-control-label"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection