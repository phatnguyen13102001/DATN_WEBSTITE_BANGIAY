@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sửa sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <form class="validation-form" novalidate="" method="post" action="index.php?com=product&amp;act=save&amp;type=san-pham" enctype="multipart/form-data" data-select2-id="[object HTMLInputElement]">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="card card-primary card-outline text-sm">
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
                                            <label for="namevi">Tiêu đề:</label>
                                            <input type="text" class="form-control for-seo text-sm" name="name" id="name" placeholder="Tiêu đề" value="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="descvi">Mô tả:</label>
                                            <textarea class="form-control for-seo text-sm " name="desc_cke" id="desc_cke" rows="5" placeholder="Mô tả"></textarea>
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
                                <label class="d-block" for="id_list">Danh mục hãng:</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Chọn danh mục</option>
                                    <option value="1">Nike</option>
                                    <option value="2">Adidas</option>
                                    <option value="3">Convert</option>
                                </select>
                            </div>
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="id_list">Danh mục size:</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Chọn danh mục</option>
                                    <option value="1">38</option>
                                    <option value="2">39</option>
                                    <option value="3">40</option>
                                    <option value="4">41</option>
                                    <option value="5">42</option>
                                    <option value="6">43</option>
                                </select>
                            </div>
                            <div class="form-group col-xl-6 col-sm-4">
                                <label class="d-block" for="id_list">Danh mục màu:</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Chọn danh mục</option>
                                    <option value="1">Đỏ</option>
                                    <option value="2">Vàng</option>
                                    <option value="3">Xanh</option>
                                    <option value="4">Đen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary card-outline text-sm">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh sản phẩm</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="photoUpload-zone">
                            <div class="photoUpload-detail" id="photoUpload-preview">
                                <img class="rounded" src="{{asset('admin/images/noimage.png')}}" alt="Alt Photo">
                            </div>
                            <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                <input type="file" name="file" id="file-zone">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                                <p class="photoUpload-or">hoặc</p>
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
                <div class="form-group">
                    <div class="form-group d-inline-block mb-2 mr-2">
                        <label for="noibat-checkbox" class="d-inline-block align-middle mb-0 mr-2">Nổi bật:</label>
                        <div class="custom-control custom-checkbox d-inline-block align-middle">
                            <input type="checkbox" class="custom-control-input noibat-checkbox" name="status[noibat]" id="noibat-checkbox" checked="" value="noibat">
                            <label for="noibat-checkbox" class="custom-control-label"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="numb" class="d-inline-block align-middle mb-0 mr-2">Số lượng:</label>
                    <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="1" name="data[numb]" id="numb" placeholder="Số thứ tự" value="1">
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="d-block" for="code">Mã sản phẩm:</label>
                        <input type="text" class="form-control text-sm" name="code" id="code" placeholder="Mã sản phẩm" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="regular_price">Giá bán:</label>
                        <div class="input-group">
                            <input type="text" class="form-control format-price regular_price text-sm" name="regular_price" id="regular_price" placeholder="Giá bán" value="">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="sale_price">Giá mới:</label>
                        <div class="input-group">
                            <input type="text" class="form-control format-price sale_price text-sm" name="sale_price" id="sale_price" placeholder="Giá mới" value="">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>VNĐ</strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="d-block" for="discount">Chiết khấu:</label>
                        <div class="input-group">
                            <input type="text" class="form-control discount text-sm" name="discount" id="discount" placeholder="Chiết khấu" value="" maxlength="3" readonly="">
                            <div class="input-group-append">
                                <div class="input-group-text"><strong>%</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Bộ sưu tập sản phẩm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="filer-gallery" class="label-filer-gallery mb-3">Album hình</label>
                    <div class="jFiler jFiler-theme-dragdropbox"><input type="file" name="files[]" id="filer-gallery" multiple="multiple" data-params="Y29tPXByb2R1Y3QmYWN0PWVkaXQmdHlwZT1zYW4tcGhhbSZpZF9saXN0PTEmaWQ9OQ==" data-hash="pqwiP6b6qN" style="position: absolute; left: -9999px; top: -9999px; z-index: -9999;">
                        <div class="jFiler-input-dragDrop">
                            <div class="jFiler-input-inner">
                                <div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div>
                                <div class="jFiler-input-text">
                                    <h3>Kéo và thả hình vào đây</h3> <span style="display:inline-block; margin: 15px 0">hoặc</span>
                                </div><a class="jFiler-input-choose-btn blue">Chọn hình</a>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="col-filer" value="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
                    <input type="hidden" class="act-filer" value="man">
                    <input type="hidden" class="folder-filer" value="product">
                </div>
            </div>
        </div>
    </form>
</section>
@endsection