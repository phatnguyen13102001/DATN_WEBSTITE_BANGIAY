  <!-- wrap sanpham -->
  @extends('user.index')
  @section('content')
  <section id="slider">
      <!--slider-->
      <div class="container">
          <div class="row">
              <div id="slider" class="col-12">
                  <div class="owl-carousel">
                      @foreach($lstslideshow as $slideshow)
                      <a href="{{$slideshow->link}}" target="_blank">
                          <img src="{{$slideshow->image}}" alt="slideshow">
                      </a>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="wrapsanpham">
      <div class="container">
          <div class="row">
              <div class="col-sm-12">
                  <h2 class="title text-center">SẢN PHẨM</h2>
                  <div class="w-25 float-right">
                      <form>
                          @csrf
                          <select name="sort" id="sort" class="form-select" aria-label="Default select example">
                              <option value="">-- Thứ tự --</option>
                              <option value="{{Request::url()}}?sort_by=default">-- Mặc định --</option>
                              <option value="{{Request::url()}}?sort_by=tang_dan">-- Giá tăng dần --</option>
                              <option value="{{Request::url()}}?sort_by=giam_dan">-- Giá giảm dần --</option>
                              <option value="{{Request::url()}}?sort_by=kytu_az">A đến Z</option>
                              <option value="{{Request::url()}}?sort_by=kytu_za">Z đến A</option>
                          </select>
                      </form>
                  </div>
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
                              <a href="{{route('productdetail',$product->id)}}" title="{{$product->name}}">
                                  <div class="name-sp">
                                      <p class="text-split-1">{{$product->name}}</p>
                                  </div>
                              </a>
                              <a href="{{route('productdetail',$product->id)}}" title="{{$product->name}}">
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
                                  <a href="{{route('productdetail',$product->id)}}">
                                      XEM CHI TIẾT
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
              <div id="news">
                  <div class="owl-carousel">
                      @foreach($lsttintuc as $key)
                      <a href="{{route('newsdetail',$key->id)}}">
                          <div class="product-image-wrapper">
                              <div class="single-products">
                                  <div class="productinfo text-center">
                                      <p class="scale-img img_hover"><img src="{{$key->image}}" alt="{{$key->name}}" /></p>
                                      <div class="title_tintuc">
                                          <div class="title_tintuc_txt_01 text-split-1">{{$key->name}}</div>
                                          <div class="title_tintuc_txt_02">Ngày Đăng: {{ date("h:i:s A - d/m/Y", strtotime($key->created_at)) }}</div>
                                          <div class="title_tintuc_txt_03 text-split-2">{{$key->describe}}</div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </a>
                      @endforeach
                  </div>
              </div>
          </div>
          <!--/recommended_items-->
      </div>
  </div>
  @endsection