@extends('admin.index')
@section('content')
<section class="content">
    <form method="post" action="{{route('order.update',['order'=>$order])}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-footer text-sm sticky-top">
            <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i>Lưu</button>
            <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i>Làm lại</button>
            <a class="btn btn-sm bg-gradient-danger" href="{{route('order.index')}}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
        </div>
        <div class="card card-primary card-outline text-sm">
            <div class="card-header">
                <h3 class="card-title">Thông tin chính</h3>
            </div>
            <div class="card-body row">
                <div class="form-group col-md-4 col-sm-6">
                    <label>Mã đơn hàng:</label>
                    <p class="text-primary">{{$order->code}}</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Hình thức thanh toán:</label>
                    <p class="text-info">{{$order->payment->name}}</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Họ tên:</label>
                    <p class="font-weight-bold text-uppercase text-success">{{$order->name_customer}}</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Điện thoại:</label>
                    <p>{{$order->phone}}</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Email:</label>
                    <p>{{$order->email}}</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Địa chỉ:</label>
                    <p>{{$order->address}}, {{$order->ward->level}} {{$order->ward->name}}, {{$order->district->level}} {{$order->district->name}}, {{$order->city->level}} {{$order->city->name}}</p>
                </div>
                <div class="form-group col-md-4 col-sm-6">
                    <label>Ngày đặt:</label>
                    <p>{{ date("h:i:s A - d/m/Y", strtotime($order->created_at)) }}</p>
                </div>
                <div class="form-group col-12">
                    <label for="requirements">Yêu cầu khác:</label>
                    <textarea class="form-control text-sm" name="requirements" id="requirements" rows="5" placeholder="Yêu cầu khác">{{$order->note}}</textarea>
                </div>
                <div class="form-group col-12">
                    <label for="order_status" class="mr-2">Tình trạng:</label>
                    <select id="order_status" name="order_status" class="form-control custom-select text-sm">
                        <option value="0">Chọn tình trạng</option>
                        @foreach($orderstatus as $os)
                        <option value="{{$os->id}}">{{$os->name}}</option>
                        @endforeach
                    </select>
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
                            <th class="align-middle text-center">SKU</th>
                            <th class="align-middle text-center">Hình ảnh</th>
                            <th class="align-middle text-center" style="width:20%">Tên sản phẩm</th>
                            <th class="align-middle text-center">Hãng sản xuất</th>
                            <th class="align-middle text-center">Màu</th>
                            <th class="align-middle text-center">Size</th>
                            <th class="align-middle text-center">Đơn giá</th>
                            <th class="align-middle text-center">Số lượng</th>
                            <th class="align-middle text-right">Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lstorderdetail as $key => $orderdetail)
                        <tr>
                            <td class="align-middle text-center">{{$key+1}}</td>
                            <td class="align-middle text-center">
                                <p class="mb-1">{{$orderdetail->SKU}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <a title="{{$orderdetail->name_product}}">
                                    <img class="rounded img-preview" src="{{$orderdetail->image}}" alt="{{$orderdetail->name_product}}">
                                </a>
                            </td>
                            <td class="align-middle text-center">
                                <p class="text-primary mb-1">{{$orderdetail->name_product}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <p class="mb-1">{{$orderdetail->name_manufacturer}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <p class="mb-1">{{$orderdetail->name_color}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <p class="mb-1">{{$orderdetail->size}}</p>
                            </td>
                            <td class="align-middle text-center">
                                <div class="price-cart-detail">
                                    <span class="price-new-cart-detail">{{number_format($orderdetail->sale_price).'₫'}}</span>
                                    <span class="price-old-cart-detail">{{number_format($orderdetail->regular_price).'₫'}}</span>
                                </div>
                            </td>
                            <td class="align-middle text-center">{{$orderdetail->quantity}}</td>
                            <td class="align-middle text-right">
                                <div class="price-cart-detail">
                                    <span class="price-new-cart-detail">{{number_format($orderdetail->sale_price*$orderdetail->quantity).'₫'}}</span>
                                    <span class="price-old-cart-detail">{{number_format($orderdetail->regular_price*$orderdetail->quantity).'₫'}}</span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="9" class="title-money-cart-detail">Tổng giá trị đơn hàng:</td>
                            <td colspan="2" class="cast-money-cart-detail">{{number_format($order->total).'₫'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</section>
@endsection