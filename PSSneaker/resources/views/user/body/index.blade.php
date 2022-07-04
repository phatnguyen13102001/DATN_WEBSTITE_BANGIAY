  <!-- wrap sanpham -->
  @extends('user.index')
  @section('content')
  <section id="slider">
      <!--slider-->
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                          <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                          <li data-target="#slider-carousel" data-slide-to="1"></li>
                          <li data-target="#slider-carousel" data-slide-to="2"></li>
                      </ol>

                      <div class="carousel-inner">
                          @foreach($lstslideshow as $key => $slideshow)
                          @if($key === 0 )
                          <div class="item active">
                              <div class="col-sm-12">
                                  <a href="{{$slideshow->link}}" target="_blank">
                                      <img src="{{$slideshow->image}}" alt="Slideshow" />
                                  </a>
                              </div>
                          </div>
                          @else
                          <div class="item">
                              <div class="col-sm-12">
                                  <a href="{{$slideshow->link}}" target="_blank">
                                      <img src="{{$slideshow->image}}" alt="Slideshow" />
                                  </a>
                              </div>
                          </div>
                          @endif
                          @endforeach
                      </div>
                      <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                          <i class="fa fa-angle-left"></i>
                      </a>
                      <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                          <i class="fa fa-angle-right"></i>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="wrapsanpham">
      <div class="container">
          <div class="row">
              <div class=" stickymenu col-sm-3">
                  <div class="left-sidebar">
                      <h2>Sắp xếp & phân loại</h2>
                      <div class="panel-group category-products" id="accordian">
                          <!--category-productsr-->
                          <div class="rsingle1 span_1_of_single ">
                              <section class="sky-form1 ">
                                  <h4>Hãng</h4>
                                  <div class="row1 scroll-pane ">
                                      <div class="col col-4 ">
                                          @foreach($hangsx as $key)
                                          <label class="checkbox "><input type="checkbox" value="{{$key->id}}" name="checkbox"><i></i>{{$key->name}}</label>
                                          @endforeach
                                      </div>
                                  </div>
                              </section>
                              <section class="sky-form1 ">
                                  <h4>SIZE</h4>
                                  <div class="row1 scroll-pane ">

                                      <div class="col col-4">
                                          @foreach($kichthuoc as $key)
                                          <label class="checkbox "><input type="checkbox " value="{{$key->id}}" name="checkbox "><i></i>{{$key->size}}</label>
                                          @endforeach
                                      </div>
                                  </div>
                              </section>
                              <section class="sky-form1">
                                  <h4>MÀU SẮC</h4>
                                  <ul class="color-list1 ">
                                      @foreach($mau as $key)
                                      <li>
                                          <a href="{{$key->id}}"> <span class="" style="background-color: {{$key->code}}!important; padding: 5px 14px;"></span>
                                              <p class="red">{{$key->name}}</p>
                                          </a>
                                      </li>
                                      @endforeach
                                  </ul>
                              </section>
                              <script src="js/jquery.easydropdown.js "></script>
                          </div>
                      </div>
                      <!--/category-products-->
                  </div>
              </div>

              <div class="col-sm-9 padding-right">
                  <h2 class="title text-center">SẢN PHẨM</h2>
                  <form id="form_order" action="" method="get">
                      <select id="orderby" class="orderby">
                          <option value="1">Tên: A-Z</option>
                          <option value="2">Giá: Tăng dần</option>
                          <option value="3">Giá: giảm dần</option>
                          <option value="4">Tên: Z-A</option>
                          <option value="5">Cũ nhất</option>
                          <option value="6">Mới nhất</option>
                          <option value="7">Bán chạy nhất</option>
                      </select>

                  </form>
                  <div class="grid-container-sp">
                      @foreach($lstproduct as $product)
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
                                      <<<<<<< HEAD <span class="sale_price_sp">{{number_format($product->sale_price)}}</span>
                                          <span class="regular_price_sp"><del>{{number_format($product->regular_price)}}</del></span>
                                          @else
                                          <span class="price-new">{{($product->regular_price)!=0 ? number_format($product->regular_price) : 'Liên Hệ'}}</span>
                                          =======
                                          <span class="sale_price_sp">{{number_format($product->sale_price) }}VND</span>
                                          <span class="regular_price_sp"><del>{{number_format($product->regular_price) }}VND</del></span>
                                          @else
                                          <span class="price-new">{{($product->regular_price)!=0 ? $product->regular_price : 'Liên Hệ'}}</span>
                                          >>>>>>> 4d0c4580c3d0bcbb48adbd7f7cf7e0d9c5ad0df2
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
                  <div class="pagination flex-wrap justify-content-center">
                      {!! $lstproduct->links() !!}
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- wrap tin tuc -->
  <div class="wrap_tintuc">
      <div class="container">
          <div class="recommended_items">
              <!--recommended_items-->
              <h2 class="title text-center">tin tức</h2>
              <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                      <div class="item active">
                          @foreach($lsttintuc as $key)
                          <div class="col-sm-4">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center scale-img img_hover">
                                          <img src="{{$key->image}}" alt="" />
                                          <div class="title_tintuc">
                                              <div class="title_tintuc_txt_01 text-split-1">{{$key->name}}</div>
                                              <div class="title_tintuc_txt_02">Ngày Đăng: {{$key->created_at}}</div>
                                              <div class="title_tintuc_txt_03 text-split-2">{{$key->describe}}</div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
                      <!-- <div class="item">
                          
                      </div> -->
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
  @endsection
  <script type="text/javascript">
      $(function() {
          $("#orderby").on('change', function(e) {
              console.log(e);
              var status_id = e.target.value;
              alert(status_id)
          })
      });
  </script>