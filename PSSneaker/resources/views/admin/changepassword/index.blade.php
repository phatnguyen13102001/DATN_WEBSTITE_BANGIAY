@extends('admin.index')
@section('content')
<section class="content">
    <form class="validation-form" novalidate="" method="post" action="index.php?com=user&amp;act=info_admin&amp;changepass=1" enctype="multipart/form-data">
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
                        <label for="old-password">Mật khẩu cũ:</label>
                        <input type="password" class="form-control text-sm" name="old-password" id="old-password" placeholder="Mật khẩu cũ">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="old-password">Mật khẩu mới:</label>
                        <input type="password" class="form-control text-sm" name="new-password" id="new-password" placeholder="Mật khẩu mới">
                    </div>
                    <div class="form-group col-xl-4 col-lg-6 col-md-6">
                        <label for="renew-password">Nhập lại mật khẩu mới:</label>
                        <input type="password" class="form-control text-sm" name="renew-password" id="renew-password" placeholder="Nhập lại mật khẩu mới">
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection