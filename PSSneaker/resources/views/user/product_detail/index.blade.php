@extends('user.index')
@section('content')
<section>
    <div class="container">
        @if(session('success'))
        <div class="alert_success">
            <span class="fas fa-check-circle"></span>
            <span class="msg">Thông báo: {{session('success')}}</span>
        </div>
        @endif
        @if(session('fail'))
        <div class="alert_fail">
            <span class="fas fa-times-circle"></span>
            <span class="msg">Thông báo: {{session('fail')}}</span>
        </div>
        @endif
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
                                    <p class="qty_rating">Đánh giá: <span class="number_rating">{{number_format($rating ,1)}}/5 <i class="fas fa-star"></i></span></p>
                                    <p>Thương hiệu: <span class="name_brand">PS SNEAKER®</span></p>
                                    <span class="title_hang_sx">Hãng sản xuất:</span>
                                    <span class="name_manufacturer">{{$lstproduct->manufacturer->name}}</span>
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
                                        <span style="color:{{$lstproduct->color->code}}">{{$lstproduct->color->name}}</span>
                                    </div>
                                    <div class="box-size">
                                        <table class="variations" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    @if(($qtystock->quantity)!=0)
                                                    <td class="label_size"><label>Kích thước:</label></td>
                                                    <td class="value">
                                                        <div class="swatch clearfix" data-option-index="0">
                                                            @foreach($lststock as $key => $stock)
                                                            @if(($stock->quantity)===0)
                                                            <div data-value="{{$stock->size->size}}" class="swatch-element">
                                                                <input id="swatch-0-{{$stock->size->size}}" type="radio" name="option-size" value="{{$stock->id_size}}" disabled>
                                                                <img class="crossed-out" src="https://file.hstatic.net/1000344185/file/864393_3ad46eb34cd84d379f431e2f4db16556.png">
                                                                <label for="swatch-0-{{$stock->size->size}}">{{$stock->size->size}}</label>
                                                            </div>
                                                            @else
                                                            <div data-value="{{$stock->size->size}}" class="swatch-element">
                                                                <input id="swatch-0-{{$stock->size->size}}" type="radio" name="option-size" checked value="{{$stock->id_size}}">
                                                                <label for="swatch-0-{{$stock->size->size}}">{{$stock->size->size}}</label>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </td>
                                                    @else
                                                    <div class="pro-soldout">
                                                        <p>Hết hàng</p>
                                                    </div>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        @if(($qtystock->quantity)!=0)
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
                                        @else
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->
                    <div class="tabs-pro-detail">
                        <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
                            <li class="nav-link active">
                                <a class="nav-item" id="info-pro-detail-tab" data-toggle="tab" href="#info-pro-detail" role="tab">Thông tin sản phẩm</a>
                            </li>
                            <li class="nav-link">
                                <a class="nav-item" id="commentfb-pro-detail-tab" data-toggle="tab" href="#commentfb-pro-detail" role="tab">Bình luận</a>
                            </li>
                            <li class="nav-link">
                                <a class="nav-item" id="rating-pro-detail-tab" data-toggle="tab" href="#rating-pro-detail" role="tab">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
                            <div class="tab-pane fade show active" id="info-pro-detail" role="tabpanel">
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
                            <div class="tab-pane fade" id="commentfb-pro-detail" role="tabpanel">
                                <div id="fb-root"></div>
                                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=1619936111724930&autoLogAppEvents=1" nonce="lMAIxCGt"></script>
                                <div class="fb-comments" data-href="{{url($lstproduct->id)}}" data-width="1080" data-numposts="5"></div>
                            </div>
                            <div class="tab-pane fade" id="rating-pro-detail" role="tabpanel">
                                @if(Illuminate\Support\Facades\Auth::check())
                                @if($checkrating != 0)
                                <ul class="list-inline rating" title="Average Rating">
                                    @for($count=1; $count<=5; $count++) @php if($count <=$rating){ $color='color:#ffcc00;' ; } else { $color='color:#ccc;' ; } @endphp <li title="star_rating" id="{{$lstproduct->id}}-{{$count}}" data-index="{{$count}}" data-product-id="{{$lstproduct->id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer;{{$color}} font-size:30px;"><i class="fas fa-star"></i></li>
                                        @endfor
                                </ul>
                                @endif
                                @endif
                                <p>{{number_format($rating ,1)}} sao trên {{$lstrating->count()}} người đánh giá.</p>
                                <hr style="border:3px solid #f1f1f1">
                                <div class="row">
                                    <div class="side">
                                        <div>5 sao</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-5" style="width: {{$avg5star}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{$rating5star}}</div>
                                    </div>
                                    <div class="side">
                                        <div>4 sao</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-4" style="width: {{$avg4star}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{$rating4star}}</div>
                                    </div>
                                    <div class="side">
                                        <div>3 sao</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-3" style="width: {{$avg3star}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{$rating3star}}</div>
                                    </div>
                                    <div class="side">
                                        <div>2 sao</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-2" style="width: {{$avg2star}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{$rating2star}}</div>
                                    </div>
                                    <div class="side">
                                        <div>1 sao</div>
                                    </div>
                                    <div class="middle">
                                        <div class="bar-container">
                                            <div class="bar-1" style="width: {{$avg1star}}%;"></div>
                                        </div>
                                    </div>
                                    <div class="side right">
                                        <div>{{$rating1star}}</div>
                                    </div>
                                </div>
                                <hr style="border:3px solid #f1f1f1">
                                @foreach($lstrating as $v_rate)
                                <div class="lst-user-rate">
                                    <div class="box-user-rate">
                                        @if($v_rate->user->avatar != NULL)
                                        <img class="avatar_user" src="/storage/{{$v_rate->user->avatar}}">
                                        @else
                                        <img class="avatar_user" src="{{asset('Images/NoImage.jpg')}}">
                                        @endif
                                        <div class="box-name-rate">
                                            <p>{{$v_rate->user->name}}</p>
                                            <p>
                                            <ul class="list-inline">
                                                @for($count=1 ; $count<=5; $count++) @php if($count <=$v_rate->rate){ $color='color:#ffcc00;' ; } else { $color='color:#ccc;' ; } @endphp <li style="{{$color}}; font-size:15px;"><i class="fas fa-star"></i></li>
                                                    @endfor
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="box-date-rate">
                                        {{ date("h:i:s A - d/m/Y", strtotime($v_rate->created_at)) }}
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--/category-tab-->
                    @if(count($lstproductsame)===0)
                    <h2 class="title text-center">SẢN PHẨM CÙNG LOẠI</h2>
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
</section>
@endsection