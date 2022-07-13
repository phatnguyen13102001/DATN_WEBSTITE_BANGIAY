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
                            <form action="{{route('addtocart')}}" method="POST">
                                @csrf
                                <div class="product-information">
                                    <!--/product-information-->
                                    <h2 class="title_categoridetail_txt">{{$lstproduct->name}}</h2>
                                    <p>Thương hiệu: <span class="name_brand">PS SNEAKER®</span></p>
                                    <span class="title_hang_sx">Hãng sản xuất:</span>
                                    <span>{{$lstproduct->manufacturer->name}}</span>
                                    <input type="hidden" name="name_manu" value="{{$lstproduct->manufacturer->name}}">
                                    <input type="hidden" name="SKU" value="{{$lstproduct->SKU}}">
                                    <div class="border_giaandtien">
                                        @if(($lstproduct->discount)!=0)
                                        <span class="pro-sale">{{$lstproduct->discount}}%</span>
                                        @else
                                        @endif
                                        <div class="formmoneyproductdetail">
                                            @if(($lstproduct->sale_price)!=0)
                                            <span class="moneynew">{{number_format($lstproduct->sale_price)}}₫</span>
                                            <span class="moneyold"><del>{{($lstproduct->regular_price) != 0 ? number_format($lstproduct->regular_price).'₫' : '' }}</del></span>
                                            @else
                                            <span class="moneynew">{{($lstproduct->regular_price)!=0 ? number_format($lstproduct->regular_price) : 'Liên Hệ'}}{{($lstproduct->regular_price)!=0 ? '₫' : ''}}</span>
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
                                                            <div data-value="{{$stock->size->size}}" class="swatch-element">
                                                                <input id="swatch-0-{{$stock->size->size}}" type="radio" name="option-size" {{($key==0) ?'checked' :''}} value="{{$stock->size->size}}">
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
                                                    <input type="number" class="qty-pro" name="quantity" min="1" value="1" readonly="">
                                                    <span class="quantity-plus-pro-detail">+</span>
                                                </div>
                                                <input name="productid_hidden" type="hidden" value="{{$lstproduct->id}}" />
                                            </div>
                                            <div class="btn-add-cart">
                                                @if(Illuminate\Support\Facades\Auth::check())
                                                <button id="test1" type="submit" class="btn btn-fefault cart BtnAddToCart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Thêm Vào Giỏ Hàng
                                                </button>
                                                @else
                                                <a href="{{route('dangnhapweb')}}">
                                                    <button id="test1" type="button" class="btn btn-fefault cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        Thêm Vào Giỏ Hàng
                                                    </button>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->
                    <div class="category-tab shop-details-tab">
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <div class="title_gioithieu_product_detail">THÔNG TIN SẢN PHẨM</div>
                                <div class="content-container">
                                    @if(($lstproduct->describe)!=NULL)
                                    <div id="editor">
                                        {!! htmlspecialchars_decode(nl2br($lstproduct->describe)) !!}
                                    </div>
                                    @else
                                    <div class="alert alert-warning w-100" role="alert">
                                        <p>Nội dung đang được cập nhập</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=1619936111724930&autoLogAppEvents=1" nonce="lMAIxCGt"></script>
                                <div class="fb-comments" data-href="{{url($lstproduct->id)}}" data-width="1000" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->
                    @if(count($lstproductsame)===0)
                    <div class="alert alert-warning w-100" role="alert">
                        <p>Không có sản phẩm cùng loại nào</p>
                    </div>
                    @else
                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">SẢN PHẨM CÙNG LOẠI</h2>
                        <div class="grid-container-sp-index">
                            @foreach($lstproductsame as $productsame)
                            <div class="grid-item-sp">
                                <a href="{{route('productdetail',$productsame->id)}}" title="{{$productsame->name}}">
                                    <div class="img-sp">
                                        <p class="scale-img img_hover"><img src="{{$productsame->image}}" alt="{{$productsame->name}}"></p>
                                        @if(($productsame->discount)!=0)
                                        <div class="discount-sp">
                                            <p>{{$productsame->discount}}%</p>
                                        </div>
                                        @else
                                        @endif
                                    </div>
                                </a>
                                <div class="info-product">
                                    <a href="{{route('productdetail',$productsame->id)}}" title="{{$productsame->name}}">
                                        <div class="name-sp">
                                            <p class="text-split-1">{{$productsame->name}}</p>
                                        </div>
                                    </a>
                                    <a href="{{route('productdetail',$productsame->id)}}" title="{{$productsame->name}}">
                                        <div class="price-sp">
                                            @if(($productsame->discount)!=0)
                                            <span>Giá: </span>
                                            <span class="sale_price_sp">{{number_format($productsame->sale_price)}}₫</span>
                                            <span class="regular_price_sp"><del>{{number_format($productsame->regular_price)}}₫</del></span>
                                            @else
                                            <span>Giá: </span>
                                            <span class="price-new">{{($productsame->regular_price)!=0 ? number_format($productsame->regular_price) : 'Liên Hệ'}}{{($productsame->regular_price)!=0 ? '₫' : ''}}</span>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="box-cart">
                                        <a href="{{route('productdetail',$productsame->id)}}">
                                            XEM CHI TIẾT
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!--/recommended_items-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="AddCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-check-circle text-success"></i> Thông Báo</h5>
                </div>
                <div class="modal-body">
                    Thêm vào giỏ hàng thành công...
                </div>
            </div>
        </div>
    </div>
</section>
@endsection