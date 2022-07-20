@extends('user.index')
@section('content')
<div class="wrap_cart_main">
    <div class="container">
        <form class="form-cart validation-cart" method="post" action="{{route('order')}}" enctype="multipart/form-data">
            <div class="wrap-cart">
                @if((Cart::instance(Auth::user())->count())!=0)
                <a href="{{route('index')}}" class="btn btn-dark">
                    <i class="fas fa-backward"></i> Tiếp tục mua hàng</a>
                <div class="row">
                    <?php $content = Cart::instance(Auth::user())->content();
                    // echo '<pre>';
                    // print_r($content);
                    // echo '</pre>';
                    ?>
                    <div class="top-cart col-12 col-lg-7">
                        <p class="title-cart">Giỏ hàng của bạn:</p>
                        <div class="list-procart">
                            <div class="procart procart-label">
                                <div class="form-row">
                                    <div class="pic-procart col-2 col-md-2">Hình ảnh</div>
                                    <div class="info-procart col-2 col-md-2">Tên</div>
                                    <div class="size-procart col-2 col-md-2">Size</div>
                                    <div class="color-procart col-2 col-md-2">Màu</div>
                                    <div class="quantity-procart col-2 col-md-2">
                                        <p>Số lượng</p>
                                        <p>Thành tiền</p>
                                    </div>
                                    <div class="price-procart col-2 col-md-2">Thành tiền</div>
                                </div>
                            </div>
                            @foreach($content as $v_content)
                            <div class="procart_item">
                                <div class="form-row">
                                    <div class="pic-procart col-2 col-md-2">
                                        <a class="text-decoration-none" href="{{route('productdetail',$v_content->id)}}" target="_blank" title="{{$v_content->name}}">
                                            <img class="lazy loaded" src="/storage/{{$v_content->options->image}}" alt="{{$v_content->name}}">
                                        </a>
                                        <div class="del-procart" data-id="{{$v_content->rowId}}">
                                            <i class="fa fa-times-circle"></i>
                                            <span>Xóa</span>
                                        </div>
                                    </div>
                                    <div class="info-procart col-2 col-md-2">
                                        <h3 class="name-procart"><a class="text-decoration-none" href="{{route('productdetail',$v_content->id)}}" target="_blank" title="{{$v_content->name}}">{{$v_content->name}}</a></h3>
                                    </div>
                                    <div class="size-procart col-2 col-md-2">
                                        <p class="size-procart">{{$v_content->options->size}}</p>
                                    </div>
                                    <div class="color-procart col-2 col-md-2">
                                        <p class="color-procart">{{$v_content->options->color}}</p>
                                    </div>
                                    <div class="quantity-procart col-2 col-md-2">
                                        <div class="quantity-pro-detail">
                                            <span class="quantity-minus-pro-detail update_procart" data-id="{{$v_content->rowId}}">-</span>
                                            <input type="number" class="qty-pro input-quantity" name="quantity" id="quantity_{{$v_content->rowId}}" min="1" value="{{$v_content->qty}}" autocomplete="off" readonly>
                                            <span class="quantity-plus-pro-detail update_procart" data-id="{{$v_content->rowId}}">+</span>
                                        </div>
                                    </div>
                                    <div class="price-procart col-2 col-md-2">
                                        @if($v_content->price !=0)
                                        <p class="price-new-cart">
                                            <?php $subtotal = $v_content->price * $v_content->qty;
                                            echo number_format($subtotal) . '₫';
                                            ?>
                                        </p>
                                        <p class="price-old-cart">
                                            <?php $subtotal = $v_content->options->regular_price * $v_content->qty;
                                            $subtotalsale = $v_content->price * $v_content->qty;
                                            if ($subtotal == 0 && $subtotalsale != 0) {
                                                '';
                                            } else if ($subtotal != 0 && $subtotalsale == 0) {
                                                '';
                                            } else if ($subtotal != 0 && $subtotalsale != 0) {
                                                echo number_format($subtotal) . '₫';
                                            }
                                            ?>
                                        </p>
                                        @else
                                        <p class="price-new-cart">
                                            <?php $subtotal = $v_content->options->regular_price * $v_content->qty;
                                            if ($subtotal != 0) {
                                                echo number_format($subtotal) . '₫';
                                            } else {
                                                '';
                                            }
                                            ?>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="money-procart">
                            <div class="total-procart d-flex align-items-center justify-content-between">
                                <p>Tổng tiền:</p>
                                <p class="total-price load-price-total">{{Cart::total().'₫'}}</p>
                            </div>
                            <input type="hidden" name="total" value="{{Cart::total()}}" />
                        </div>
                    </div>
                    <div class="bottom-cart col-12 col-lg-5">
                        <div class="section-cart">
                            <p class="title-cart">Hình thức thanh toán:</p>
                            <div class="information-cart">
                                @foreach($lstpayment as $payment)
                                <div class="payments-cart custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payments-{{$payment->id}}" name="payments" value="{{$payment->id}}" required>
                                    <label class="payments-label custom-control-label" for="payments-{{$payment->id}}" data-payments="{{$payment->id}}">{{$payment->name}}</label>
                                    <div class="payments-info payments-info-{{$payment->id}} transition">{{$payment->describe}}</div>
                                </div>
                                @endforeach
                                @if($errors->has('payments'))
                                <div class="alert alert-danger" style="margin-top:10px;">
                                    {{$errors->first('payments')}}
                                </div>
                                @endif
                            </div>
                            <p class="title-cart">Thông tin giao hàng:</p>
                            <div class="information-cart">
                                <div class="form-row">
                                    <div class="input-cart col-md-6">
                                        <input type="text" class="form-control text-ip" id="name" name="name" placeholder="Họ tên" required>
                                        @if($errors->has('name'))
                                        <div class="alert alert-danger" style="margin-top:10px;">
                                            {{$errors->first('name')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="input-cart col-md-6">
                                        <input type="number" class="form-control text-ip" id="phone" name="phone" placeholder="Số điện thoại" required>
                                        @if($errors->has('phone'))
                                        <div class="alert alert-danger" style="margin-top:10px;">
                                            {{$errors->first('phone')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="input-cart">
                                    <input type="email" class="form-control text-ip" id="email" name="email" placeholder="Email" required>
                                    @if($errors->has('email'))
                                    <div class="alert alert-danger" style="margin-top:10px;">
                                        {{$errors->first('email')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="input-cart col-md-4">
                                        <select class="select-city-cart custom-select text-ip address_city" id="city" name="city">
                                            <option value="">Tỉnh/thành phố</option>
                                            @foreach($lstcity as $key => $city)
                                            <option value="{{$key}}">{{$city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-cart col-md-4">
                                        <select class="select-district-cart select-district custom-select text-ip" required id="district" name="district">
                                            <option value="">Quận/huyện</option>
                                        </select>
                                    </div>
                                    @if($errors->has('district'))
                                    <div class="alert alert-danger" style="margin-top:10px;">
                                        {{$errors->first('district')}}
                                    </div>
                                    @endif
                                    <div class="input-cart col-md-4">
                                        <select class="select-ward-cart select-ward custom-select text-ip" required id="ward" name="ward">
                                            <option value="">Phường/xã</option>
                                        </select>
                                    </div>
                                    @if($errors->has('ward'))
                                    <div class="alert alert-danger" style="margin-top:10px;">
                                        {{$errors->first('ward')}}
                                    </div>
                                    @endif
                                    {{ csrf_field() }}
                                </div>
                                <div class="input-cart">
                                    <input type="text" class="form-control text-ip" id="address" name="address" placeholder="Địa chỉ" required>
                                    @if($errors->has('address'))
                                    <div class="alert alert-danger" style="margin-top:10px;">
                                        {{$errors->first('address')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="input-cart">
                                    <textarea class="form-control text-ip" id="requirements" name="requirements" placeholder="Yêu cầu khác (không bắt buộc)"></textarea>
                                </div>
                            </div>
                            <div class="input-cart1">
                                <input type="submit" class="btn btn-fefault cart_view01_main" name="thanhtoan" value="Thanh toán">
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <a href="{{route('index')}}" class="empty-cart text-decoration-none w-100">
                        <i class="fa fa-cart-arrow-down"></i>
                        <p>Không tồn tại sản phẩm nào trong giỏ hàng !</p>
                        <span>Về trang chủ</span>
                    </a>
                </div>
                @endif
        </form>
    </div>
</div>
</div>
@endsection