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
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">{{$lstorder1}}</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold">{{$lstordertotal1 == null ? '0₫' : number_format($lstordertotal1->total1).'₫' }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-info font-weight-bold text-capitalize text-sm">Đã xác nhận</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">{{$lstorder2}}</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold">{{$lstordertotal2 == null ? '0₫' : number_format($lstordertotal2->total2).'₫' }}</span></p>
                </div>
            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-success font-weight-bold text-capitalize text-sm">Đã giao</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">{{$lstorder3}}</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold">{{$lstordertotal3 == null ? '0₫' : number_format($lstordertotal3->total3).'₫' }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text text-danger font-weight-bold text-capitalize text-sm">Đã hủy</span>
                    <p class="info-box-text text-sm mb-0">Số lượng: <span class="text-danger font-weight-bold">{{$lstorder4}}</span></p>
                    <p class="info-box-text text-sm mb-0">Tổng giá: <span class="text-danger font-weight-bold">{{$lstordertotal3 == null ? '0₫' : number_format($lstordertotal3->total3).'₫' }}</span></p>
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
                </select>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Quận huyện:</label>
                <select id="id_district" name="data[id_district]" data-level="1" data-table="#_ward" data-child="id_ward" class="form-control select2 select-place select2-hidden-accessible" data-select2-id="id_district" tabindex="-1" aria-hidden="true">
                    <option value="0" data-select2-id="4">Chọn danh mục</option>
                </select>
            </div>
            <div class="form-group col-md-3 col-sm-3">
                <label>Phường xã:</label>
                <select id="id_ward" name="data[id_ward]" class="form-control select2 select-place select2-hidden-accessible" data-select2-id="id_ward" tabindex="-1" aria-hidden="true">
                    <option value="0" data-select2-id="6">Chọn danh mục</option>
                </select>
            </div>
            <div class="form-group text-center mt-2 mb-0 col-12">
                <a class="btn btn-sm bg-gradient-success text-white" onclick="actionOrder('index.php?com=order&amp;act=man')" title="Tìm kiếm"><i class="fas fa-search mr-1"></i>Tìm kiếm</a>
                <a class="btn btn-sm bg-gradient-danger text-white ml-1" href="index.php?com=order&amp;act=man" title="Hủy lọc"><i class="fas fa-times mr-1"></i>Hủy lọc</a>
            </div>
        </div>
    </div>
    <div id="table_data">
        @include('admin.order.pagination_data');
    </div>
</section>
@endsection