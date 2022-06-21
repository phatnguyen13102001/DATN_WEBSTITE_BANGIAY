@extends('admin.index')
@section('content')
<section class="content">
    <form class="validation-form" novalidate="" method="post" action="index.php?com=contact&amp;act=save" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="index.php?com=contact&amp;act=man" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin liên hệ</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="fullname">Họ tên:</label>
                        <input type="text" class="form-control text-sm" name="data[fullname]" id="fullname" placeholder="Họ tên" value="wrwer" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control text-sm" name="data[email]" id="email" placeholder="Email" value="ptphong07@gmail.com" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control text-sm" name="data[phone]" id="phone" placeholder="Điện thoại" value="0378998673" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control text-sm" name="data[address]" id="address" placeholder="Địa chỉ" value="adfghj" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="subject">Chủ đề:</label>
                        <input type="text" class="form-control text-sm" name="data[subject]" id="subject" placeholder="Chủ đề" value="ádf" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung:</label>
                    <textarea class="form-control text-sm" name="data[content]" id="content" rows="5" placeholder="Nội dung" required="">fsadfsdf</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer text-sm">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="index.php?com=contact&amp;act=man" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
            <input type="hidden" name="id" value="12">
        </div>
        <input type="hidden" name="hash" value="s3wsM5uttI">
    </form>
</section>
@endsection