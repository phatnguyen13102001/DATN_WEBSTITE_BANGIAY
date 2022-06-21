@extends('admin.index')
@section('content')
<section class="content">
    <form method="post" action="index.php?com=order&amp;act=save" enctype="multipart/form-data">
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="index.php?com=order&amp;act=man" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin chính</h3>
            </div>
            <div class="card-body row">
                <div class="form-group col-md-4 col-sm-6">
                    <label>Mã đơn hàng:</label>
                    <p class="text-primary">9RD7GL</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Hình thức thanh toán:</label>
                    <p class="text-info">hasgcj</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Họ tên:</label>
                    <p class="font-weight-bold text-uppercase text-success">abc123</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Điện thoại:</label>
                    <p>0374895637</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Email:</label>
                    <p>abc123@gmail.com</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Địa chỉ:</label>
                    <p>ádsdsd342342, Phường 12, Quận Bình Thạnh, Thành phố Hồ Chí Minh</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Ngày đặt:</label>
                    <p>08:42:59 AM - 16/05/2022</p>
                </div>
                <div class="form-group col-12">
                    <label for="requirements">Yêu cầu khác:</label>
                    <textarea class="form-control text-sm" name="data[requirements]" id="requirements" rows="5" placeholder="Yêu cầu khác">1234rfgv</textarea>
                </div>
                <div class="form-group col-12">
                    <label for="order_status" class="mr-2">Tình trạng:</label>
                    <select id="order_status" name="data[order_status]" class="form-control custom-select text-sm">
                        <option value="0">Chọn tình trạng</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label for="notes">Ghi chú:</label>
                    <textarea class="form-control text-sm" name="data[notes]" id="notes" rows="5" placeholder="Ghi chú"></textarea>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Chi tiết đơn hàng</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="align-middle text-center" width="10%">STT</th>
                            <th class="align-middle">Hình ảnh</th>
                            <th class="align-middle" style="width:30%">Tên sản phẩm</th>
                            <th class="align-middle text-center">Đơn giá</th>
                            <th class="align-middle text-right">Số lượng</th>
                            <th class="align-middle text-right">Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center">1</td>
                            <td class="align-middle">
                                <a title="Nước Rửa Chén – Rửa Tay Bồ Hòn Chai 500 ml">
                                    <img class="rounded img-preview" onerror="this.src='http://localhost/TranVanTiep_742922W/thumbs/100x100x1/assets/images/noimage.png';" src="http://localhost/TranVanTiep_742922W/thumbs/100x100x1/upload/product/imgspbc-7645.jpg" alt="Nước Rửa Chén – Rửa Tay Bồ Hòn Chai 500 ml">
                                </a>
                            </td>
                            <td class="align-middle">
                                <p class="text-primary mb-1">Nước Rửa Chén – Rửa Tay Bồ Hòn Chai 500 ml</p>
                            </td>
                            <td class="align-middle text-center">
                                <div class="price-cart-detail">
                                    <span class="price-new-cart-detail">800.000đ</span>
                                    <span class="price-old-cart-detail">1.000.000đ</span>
                                </div>
                            </td>
                            <td class="align-middle text-right">1</td>
                            <td class="align-middle text-right">
                                <div class="price-cart-detail">
                                    <span class="price-new-cart-detail">800.000đ</span>
                                    <span class="price-old-cart-detail">1.000.000đ</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="title-money-cart-detail">Tổng giá trị đơn hàng:</td>
                            <td colspan="1" class="cast-money-cart-detail">800.000đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</section>
@endsection