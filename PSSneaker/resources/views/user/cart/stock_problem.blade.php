@extends('user.index')
@section('content')
<div class="wrap_cart_main">
    <div class="container">
        <div class="main">
            <div class="wrap">
                <div class="main__header">
                    <div class="icon icon--inventory-issues">
                        <img src="//hstatic.net/0/0/global/design/imgs/inventory_issues.png">
                    </div>
                    <h2>Vấn đề tồn kho</h2>
                    <p>Một số sản phẩm trong giỏ hàng của bạn đã không còn hợp lệ trong quá trình thanh toán.</p>
                </div>
                <div class="subsection">
                    <table class="inventory-issues-table">
                        <thead>
                            <tr>
                                <th class="cell--products">Sản phẩm</th>
                                <th class="cell--size">Kích thước</th>
                                <th class="cell--quantity">Số lượng</th>
                                <th class="cell--price">Giá</th>
                                <th class="cell--status">Trạng thái</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product_stock">
                                        <div class="product-image">
                                            <img src="storage/{{$v_content1->options->image}}" alt="{{$v_content1->name}}" class="product__image">
                                        </div>
                                        <div class="product__info">
                                            <span class="product__info__name"><strong>{{$v_content1->name}}</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cell--size">
                                    <span class="size">{{$v_content1->options->size}}</span>
                                </td>
                                <td class="cell--quantity">
                                    <span class="quantity">{{$v_content1->qty}} → {{$stock->quantity}}</span>
                                </td>
                                <td class="cell--price">
                                    <p class="price-new-cart">{{number_format($v_content1->price)}}₫
                                    </p>
                                    <del class="price-old-cart">{{number_format($v_content1->options->regular_price)}}₫
                                    </del>
                                </td>
                                <td class="cell--status">
                                    <span class="status-label status-label--reduced">
                                        Vượt tồn kho
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="call-to-action">
                    <a href="{{route('showcart')}}" class="btn btn-dark">
                        <i class="fas fa-backward"></i> Quay lại giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection