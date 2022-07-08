@extends('user.index')
@section('content')
<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title text-center">SẢN PHẨM</h2>
                <div class="features_items">
                    <!--features_items-->
                    <div class="grid-container-sp-index">
                        @foreach($lstproductbymanu as $product)
                        <div class="grid-item-sp">
                            <a href="{{route('productdetail',$product->id)}}" title="{{$product->name}}">
                                <div class="img-sp">
                                    <p class="scale-img img_hover"><img src="{{$product->image}}" alt="{{$product->name}}"></p>
                                    @if(($product->discount)!=0)
                                    <div class="discount-sp">
                                        <p>{{$product->discount}}%</p>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </a>
                            <div class="info-product">
                                <a href="" title="{{$product->name}}">
                                    <div class="name-sp">
                                        <p class="text-split-1">{{$product->name}}</p>
                                    </div>
                                </a>
                                <a href="" title="{{$product->name}}">
                                    <div class="price-sp">
                                        @if(($product->discount)!=0)
                                        <span>Giá: </span>
                                        <span class="sale_price_sp">{{number_format($product->sale_price)}}₫</span>
                                        <span class="regular_price_sp"><del>{{number_format($product->regular_price)}}₫</del></span>
                                        @else
                                        <span>Giá: </span>
                                        <span class="price-new">{{($product->regular_price)!=0 ? number_format($product->regular_price) : 'Liên Hệ'}}{{($product->regular_price)!=0 ? '₫' : ''}}</span>
                                        @endif
                                    </div>
                                </a>
                                <div class="box-cart">
                                    <a href="">
                                        THÊM VÀO GIỎ HÀNG <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection