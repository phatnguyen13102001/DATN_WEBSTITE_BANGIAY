@extends('user.index')
@section('content')
<section>
    <div class="container">
        <div>
            <div class="padding_category">
                <div class="col-sm-12 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="grid images_3_of_2">
                                <ul id="etalage">
                                    @if(count($lstlibrary) === 0)
                                    <li>
                                        <img class="etalage_source_image" src="{{$lstproduct->image}}" class="img-responsive" />
                                        <img class="etalage_thumb_image" src="{{$lstproduct->image}}" class="img-responsive" />
                                    </li>
                                    @else
                                    <li>
                                        <img class="etalage_source_image" src="{{$lstproduct->image}}" class="img-responsive" />
                                        <img class="etalage_thumb_image" src="{{$lstproduct->image}}" class="img-responsive" />
                                    </li>
                                    @foreach($lstlibrary as $library)
                                    <li>
                                        <img class="etalage_source_image" src="{{$library->image}}" class="img-responsive" />
                                        <img class="etalage_thumb_image" src="{{$library->image}}" class="img-responsive" />
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <h2 class="title_categoridetail_txt">{{$lstproduct->name}}</h2>
                                <p>Thương hiệu: <span class="name_brand">PS SNEAKER®</span></p>
                                <span class="title_hang_sx">Hãng sản xuất:</span>
                                <span>{{$lstproduct->manufacturer->name}}</span>
                                <div class="border_giaandtien">
                                    @if(($lstproduct->discount)!=0)
                                    <span class="pro-sale">{{$lstproduct->discount}}%</span>
                                    @else
                                    @endif
                                    <div class="formmoneyproductdetail">
                                        @if(($lstproduct->sale_price)!=0)
                                        <span class="moneynew">{{number_format($lstproduct->sale_price)}}₫</span>
                                        <span class="moneyold"><del>{{number_format($lstproduct->regular_price)}}₫</del></span>
                                        @else
                                        <span class="moneynew">{{($lstproduct->regular_price)!=0 ? number_format($lstproduct->regular_price) : 'Liên Hệ'}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <span>Màu:</span>
                                    <span>{{$lstproduct->color->name}}</span>
                                </div>
                                <div class="box-size">
                                    <table class="variations" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td class="label_size"><label>Kích thước:</label></td>
                                                <td class="value">
                                                    <div class="swatch clearfix" data-option-index="0">
                                                        @foreach($lststock as $key => $stock)
                                                        <div data-value="{{$stock->size->size}}" class="swatch-element  S available">
                                                            <input id="swatch-0-{{$stock->size->size}}" type="radio" name="option-0" {{($key==0) ?'checked' :''}} value="{{$stock->size->size}}">
                                                            <label for="swatch-0-{{$stock->size->size}}">{{$stock->size->size}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="form_soluong">
                                        <div class="attr-content-pro-detail d-block">
                                            <label>Số lượng:</label>
                                            <div class="quantity-pro-detail">
                                                <span class="quantity-minus-pro-detail">-</span>
                                                <input type="number" class="qty-pro" min="1" value="1" readonly="">
                                                <span class="quantity-plus-pro-detail">+</span>
                                            </div>
                                        </div>
                                        <div class="btn-add-cart">
                                            <button id="test1" type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm Vào Giỏ Hàng
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->
                    <div class="category-tab shop-details-tab">
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <div class="title_gioithieu_product_detail">THÔNG TIN SẢN PHẨM</div>
                                <div class="content-container">
                                    <div id="editor">
                                        {!! htmlspecialchars_decode(nl2br($lstproduct->describe)) !!}
                                    </div>
                                </div>
                                <form action="#">

                                    <textarea name=""></textarea>

                                    <button type="button" class="btn btn-default pull-right">
                                        Gửi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--/category-tab-->
                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">SẢN PHẨM CÙNG LOẠI</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/poduct-1-1318-1352.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/poduct-1-1318-1352.png" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/poduct-2-3013-1627.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/poduct-6-4025-8782.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/poduct-8-5296-7311.png" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/poduct-9-6725-1848.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection