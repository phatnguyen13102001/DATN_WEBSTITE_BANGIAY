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
                        <li class="breadcrumb-item active">Quản lý bài viết</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <form class="validation-form" novalidate="" method="post" action="index.php?com=setting&amp;act=save" enctype="multipart/form-data">
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
                        <label for="nameshop">Tên shop:</label>
                        <input type="text" class="form-control text-sm" name="nameshop" id="nameshop" placeholder="Tên shop" required="">
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="slogan">Slogan:</label>
                        <input type="text" class="form-control text-sm" name="slogan" id="slogan" placeholder="Slogan" required="">
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control text-sm" name="address" id="address" placeholder="Địa chỉ" required="">
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control text-sm" name="email" id="email" placeholder="Email" required="">
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control text-sm" name="phone" id="phone" placeholder="Điện thoại" required="">
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="hotline">Hotline:</label>
                        <input type="text" class="form-control text-sm" name="hotline" id="hotline" placeholder="Hotline" required="">
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="zalo">Zalo:</label>
                        <input type="text" class="form-control text-sm" name="zalo" id="zalo" placeholder="Zalo">
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="website">Website:</label>
                        <input type="text" class="form-control text-sm" name="website" id="website" placeholder="Website" required="">
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="fanpage">Fanpage:</label>
                        <input type="text" class="form-control text-sm" name="fanpage" id="fanpage" placeholder="Fanpage">
                    </div>
                </div>
                <div class="form-group">
                    <label for="coords_iframe">
                        <span>Tọa độ google map iframe:</span>
                        <a class="text-sm font-weight-normal ml-1" href="https://www.google.com/maps" target="_blank" title="Lấy mã nhúng google map">(Lấy mã nhúng)</a>
                    </label>
                    <textarea class="form-control text-sm" name="coords_iframe" id="coords_iframe" rows="5" placeholder="Tọa độ google map iframe"></textarea>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection