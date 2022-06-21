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
                        <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-bag"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-primary font-weight-bold text-capitalize text-sm">Mới đặt</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">6</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold">4.000.000đ</span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-info font-weight-bold text-capitalize text-sm">Đã xác nhận</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">0</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"></span></p>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-success font-weight-bold text-capitalize text-sm">Đã giao</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">0</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-danger font-weight-bold text-capitalize text-sm">Đã hủy</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">0</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="index.php?com=order&amp;act=delete" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="doEnter(event,'keyword','index.php?com=order&amp;act=man')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','index.php?com=order&amp;act=man')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm">
        <div class="card-header">
            <h3 class="card-title">Tìm kiếm đơn hàng</h3>
        </div>
        <div class="card-body row">
            <div class="form-group col-md-3 col-sm-3">
                <label>Ngày đặt:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control float-right text-sm" name="order_date" id="order_date" value="" readonly="">
                </div>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Tình trạng:</label>
                <select id="order_status" name="data[order_status]" class="form-control custom-select text-sm">
                    <option value="0">Chọn tình trạng</option>
                </select>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Hình thức thanh toán:</label>
                <select id="order_payment" name="order_payment" class="form-control custom-select text-sm">
                    <option value="0">Chọn hình thức thanh toán</option>
                    <option value="16">Thanh toán sau khi nhận hàng</option>
                    <option value="15">hasgcj</option>
                </select>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Tỉnh thành:</label>
                <select id="id_city" name="data[id_city]" data-level="0" data-table="#_district" data-child="id_district" class="form-control select2 select-place select2-hidden-accessible" data-select2-id="id_city" tabindex="-1" aria-hidden="true">
                    <option value="0" data-select2-id="2">Chọn danh mục</option>
                    <option value="1">Thành phố Hà Nội</option>
                    <option value="2">Tỉnh Hà Giang</option>
                    <option value="3">Tỉnh Cao Bằng</option>
                    <option value="4">Tỉnh Bắc Kạn</option>
                    <option value="5">Tỉnh Tuyên Quang</option>
                    <option value="6">Tỉnh Lào Cai</option>
                    <option value="7">Tỉnh Điện Biên</option>
                    <option value="8">Tỉnh Lai Châu</option>
                    <option value="9">Tỉnh Sơn La</option>
                    <option value="10">Tỉnh Yên Bái</option>
                    <option value="11">Tỉnh Hoà Bình</option>
                    <option value="12">Tỉnh Thái Nguyên</option>
                    <option value="13">Tỉnh Lạng Sơn</option>
                    <option value="14">Tỉnh Quảng Ninh</option>
                    <option value="15">Tỉnh Bắc Giang</option>
                    <option value="16">Tỉnh Phú Thọ</option>
                    <option value="17">Tỉnh Vĩnh Phúc</option>
                    <option value="18">Tỉnh Bắc Ninh</option>
                    <option value="19">Tỉnh Hải Dương</option>
                    <option value="20">Thành phố Hải Phòng</option>
                    <option value="21">Tỉnh Hưng Yên</option>
                    <option value="22">Tỉnh Thái Bình</option>
                    <option value="23">Tỉnh Hà Nam</option>
                    <option value="24">Tỉnh Nam Định</option>
                    <option value="25">Tỉnh Ninh Bình</option>
                    <option value="26">Tỉnh Thanh Hóa</option>
                    <option value="27">Tỉnh Nghệ An</option>
                    <option value="28">Tỉnh Hà Tĩnh</option>
                    <option value="29">Tỉnh Quảng Bình</option>
                    <option value="30">Tỉnh Quảng Trị</option>
                    <option value="31">Tỉnh Thừa Thiên Huế</option>
                    <option value="32">Thành phố Đà Nẵng</option>
                    <option value="33">Tỉnh Quảng Nam</option>
                    <option value="34">Tỉnh Quảng Ngãi</option>
                    <option value="35">Tỉnh Bình Định</option>
                    <option value="36">Tỉnh Phú Yên</option>
                    <option value="37">Tỉnh Khánh Hòa</option>
                    <option value="38">Tỉnh Ninh Thuận</option>
                    <option value="39">Tỉnh Bình Thuận</option>
                    <option value="40">Tỉnh Kon Tum</option>
                    <option value="41">Tỉnh Gia Lai</option>
                    <option value="42">Tỉnh Đắk Lắk</option>
                    <option value="43">Tỉnh Đắk Nông</option>
                    <option value="44">Tỉnh Lâm Đồng</option>
                    <option value="45">Tỉnh Bình Phước</option>
                    <option value="46">Tỉnh Tây Ninh</option>
                    <option value="47">Tỉnh Bình Dương</option>
                    <option value="48">Tỉnh Đồng Nai</option>
                    <option value="49">Tỉnh Bà Rịa - Vũng Tàu</option>
                    <option value="50">Thành phố Hồ Chí Minh</option>
                    <option value="51">Tỉnh Long An</option>
                    <option value="52">Tỉnh Tiền Giang</option>
                    <option value="53">Tỉnh Bến Tre</option>
                    <option value="54">Tỉnh Trà Vinh</option>
                    <option value="55">Tỉnh Vĩnh Long</option>
                    <option value="56">Tỉnh Đồng Tháp</option>
                    <option value="57">Tỉnh An Giang</option>
                    <option value="58">Tỉnh Kiên Giang</option>
                    <option value="59">Thành phố Cần Thơ</option>
                    <option value="60">Tỉnh Hậu Giang</option>
                    <option value="61">Tỉnh Sóc Trăng</option>
                    <option value="62">Tỉnh Bạc Liêu</option>
                    <option value="63">Tỉnh Cà Mau</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 292px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-id_city-container"><span class="select2-selection__rendered" id="select2-id_city-container" role="textbox" aria-readonly="true" title="Chọn danh mục">Chọn danh mục</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Quận huyện:</label>
                <select id="id_district" name="data[id_district]" data-level="1" data-table="#_ward" data-child="id_ward" class="form-control select2 select-place select2-hidden-accessible" data-select2-id="id_district" tabindex="-1" aria-hidden="true">
                    <option value="0" data-select2-id="4">Chọn danh mục</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 292px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-id_district-container"><span class="select2-selection__rendered" id="select2-id_district-container" role="textbox" aria-readonly="true" title="Chọn danh mục">Chọn danh mục</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Phường xã:</label>
                <select id="id_ward" name="data[id_ward]" class="form-control select2 select-place select2-hidden-accessible" data-select2-id="id_ward" tabindex="-1" aria-hidden="true">
                    <option value="0" data-select2-id="6">Chọn danh mục</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 292px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-id_ward-container"><span class="select2-selection__rendered" id="select2-id_ward-container" role="textbox" aria-readonly="true" title="Chọn danh mục">Chọn danh mục</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <div class="form-group col-md-6 col-sm-6">
                <label>Khoảng giá:</label>
                <span class="irs irs--flat js-irs-0"><span class="irs"><span class="irs-line" tabindex="0"></span><span class="irs-min" style="visibility: hidden;">1 đ</span><span class="irs-max" style="visibility: hidden;">800 000 đ</span><span class="irs-from" style="visibility: visible; left: -0.66778%;">1 đ</span><span class="irs-to" style="visibility: visible; left: 94.1569%;">800 000 đ</span><span class="irs-single" style="visibility: hidden; left: 44.2404%;">1 đ — 800 000 đ</span></span><span class="irs-grid"></span><span class="irs-bar" style="left: 1.33556%; width: 97.3289%;"></span><span class="irs-shadow shadow-from" style="display: none;"></span><span class="irs-shadow shadow-to" style="display: none;"></span><span class="irs-handle from type_last" style="left: 0%;"><i></i><i></i><i></i></span><span class="irs-handle to" style="left: 97.3289%;"><i></i><i></i><i></i></span></span><input type="text" class="primary irs-hidden-input" id="range_price" name="range_price" tabindex="-1" readonly="">
            </div>
            <div class="form-group text-center mt-2 mb-0 col-12">
                <a class="btn btn-sm bg-gradient-success text-white" onclick="actionOrder('index.php?com=order&amp;act=man')" title="Tìm kiếm"><i class="fas fa-search mr-1"></i>Tìm kiếm</a>
                <a class="btn btn-sm bg-gradient-danger text-white ml-1" href="index.php?com=order&amp;act=man" title="Hủy lọc"><i class="fas fa-times mr-1"></i>Hủy lọc</a>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title card-title-order d-inline-block align-middle float-none">Danh sách đơn hàng</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="align-middle">Mã đơn hàng</th>
                        <th class="align-middle" style="width:15%">Họ tên</th>
                        <th class="align-middle">Ngày đặt</th>
                        <th class="align-middle">Tổng giá</th>
                        <th class="align-middle">Tình trạng</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-6" value="6">
                                <label for="select-checkbox-6" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a class="text-primary" href="{{route('order-detail')}}" title="9RD7GL">9RD7GL</a>
                        </td>
                        <td class="align-middle">
                            <a class="text-primary" href="{{route('order-detail')}}" title="abc123">abc123</a>
                        </td>
                        <td class="align-middle">08:42:59 AM - 16/05/2022</td>
                        <td class="align-middle">
                            <span class="text-danger font-weight-bold">800.000đ</span>
                        </td>
                        <td class="align-middle">
                            <span class="">
                                Đang giao
                            </span>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('order-detail')}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <a class="text-danger" id="delete-item" data-url="index.php?com=order&amp;act=delete&amp;id=6" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection