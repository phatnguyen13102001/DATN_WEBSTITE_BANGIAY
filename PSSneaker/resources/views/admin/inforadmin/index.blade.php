@extends('admin.index')
@section('content')
<section class="content">
    <form class="validation-form" novalidate="" method="post" action="index.php?com=user&amp;act=info_admin" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary submit-check"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin admin</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="username">Tài khoản: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-sm" name="data[username]" id="username" placeholder="Tài khoản" value="admin" required="">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="fullname">Họ tên: <span class="text-danger">*</span></label>
                        <input type="text" class="form-control text-sm" name="data[fullname]" id="fullname" placeholder="Họ tên" value="Administrator" required="">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control text-sm" name="data[email]" id="email" placeholder="Email" value="admin@gmail.com">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="phone">Điện thoại:</label>
                        <input type="text" class="form-control text-sm" name="data[phone]" id="phone" placeholder="Điện thoại" value="0939513667">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="gender">Giới tính:</label>
                        <select class="custom-select text-sm" name="data[gender]" id="gender" required="">
                            <option value="">Chọn giới tính</option>
                            <option selected="" value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="birthday">Ngày sinh:</label>
                        <input type="text" class="form-control text-sm max-date" name="data[birthday]" id="birthday" placeholder="Ngày sinh" value="16/12/2020" required="" autocomplete="off">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="address">Địa chỉ:</label>
                        <input type="text" class="form-control text-sm" name="data[address]" id="address" placeholder="Địa chỉ" value="222 huỳnh thị na" required="">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection