@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="{{route('product.index')}}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        @if($errors->has('name') || $errors->has('SKU') || $errors->has('image'))
        <div class="card bg-gradient-danger">
            <div class="card-header">
                <h3 class="card-title">Thông báo</h3>
                <div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
            </div>
            <div class="card-body" style="display: block;">
                @if($errors->has('name'))
                <p class="mb-1">- {{$errors->first('name')}}</p>
                @endif
                @if($errors->has('SKU'))
                <p class="mb-1">- {{$errors->first('SKU')}}</p>
                @endif
                @if($errors->has('image'))
                <p class="mb-1">- {{$errors->first('image')}}</p>
                @endif
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-xl-8">
                <div class="card card-primary card-outline text-sm" id="card_content">
                    <div class="card-header">
                        <h3 class="card-title">Nội dung sản phẩm</h3>
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
                                            <input type="text" class="form-control for-seo text-sm" name="name" id="name" placeholder="Tiêu đề" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc_cke">Mô tả:</label>
                                            <textarea class="form-control for-seo text-sm" name="desc_cke" id="desc_cke" rows="5" placeholder="Mô tả"></textarea>
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
                        <h3 class="card-title">Danh mục sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group-category row">
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="lstmanufacturer">Danh mục hãng:</label>
                                <select class="form-select" aria-label="Default select example" name="lstmanufacturer" id="lstmanufacturer">
                                    @foreach($lstmanufacturer as $manufacturer)
                                    <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="lstcolor">Danh mục màu:</label>
                                <select class="form-select" aria-label="Default select example" name="lstcolor" id="lstcolor">
                                    @foreach($lstcolor as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline text-sm" id="card_image">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="photoUpload-zone">
                            <div class="photoUpload-detail">
                                <img id="photoUpload-preview" src="{{asset('admin_pssneaker/images/noimage.png')}}" alt="Alt Photo">
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
                <h3 class="card-title">Thông tin sản phẩm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group" id="form_outstanding">
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="noibat-checkbox" class="d-inline-block align-middle mb-0 mr-2">Nổi bật:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input noibat-checkbox" name="outstanding" id="outstanding" value="1" checked>
                            <label for="outstanding" class="custom-control-label"></label>
                        </div>
                    </div>
                </div>
                <div class="row" id="row_price">
                    <div class="form-group col-md-4">
                        <label class="d-block" for="code">Mã sản phẩm:</label>
                        <input type="text" class="form-control text-sm" name="SKU" id="SKU" placeholder="Mã sản phẩm">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="regular_price">Giá bán:</label>
                        <div class="input-group">
                            <input type="text" class="form-control format-price regular_price text-sm" name="regular_price" id="regular_price" value="0" placeholder="Giá bán">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="sale_price">Giá mới:</label>
                        <div class="input-group">
                            <input type="text" class="form-control format-price sale_price text-sm" name="sale_price" id="sale_price" value="0" placeholder="Giá mới">
                            <div class=" input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="discount">Chiết khấu:</label>
                        <div class="input-group">
                            <input type="text" class="form-control discount text-sm" name="discount" id="discount" placeholder="Chiết khấu" maxlength="3" readonly="">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>%</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection