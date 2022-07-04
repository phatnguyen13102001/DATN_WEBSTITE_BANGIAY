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
                                          <label class="checkbox "><input type="checkbox " name="checkbox " checked=" "><i></i>ADIDAS</label>
                                      </div>
                                      <div class="col col-4 ">
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>VANS</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>NIKE</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>BITIS</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>PUMA</label>
                                      </div>
                                  </div>
                              </section>
                              <section class="sky-form1 ">
                                  <h4>SIZE</h4>
                                  <div class="row1 scroll-pane ">
                                      <div class="col col-4 ">
                                          <label class="checkbox "><input type="checkbox " name="checkbox " checked=" "><i></i>37</label>
                                      </div>
                                      <div class="col col-4">
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>38</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>39</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>40</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>41</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>42</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>43</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>44</label>
                                          <label class="checkbox "><input type="checkbox " name="checkbox "><i></i>45</label>
                                      </div>
                                  </div>
                              </section>
                              <section class="sky-form1 ">
                                  <h4>MÀU SẮC</h4>
                                  <ul class="color-list1 ">
                                      <li>
                                          <a href="# "> <span class="color1 "> </span>
                                              <p class="red ">ĐỎ</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="# "> <span class="color2 "> </span>
                                              <p class="red ">XANH LÁ CÂY</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="# "> <span class="color3 "> </span>
                                              <p class="red ">XANH DƯƠNG</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="# "> <span class="color4 "> </span>
                                              <p class="red ">VÀNG</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="# "> <span class="color5 "> </span>
                                              <p class="red ">TÍM</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="# "> <span class="color6 "> </span>
                                              <p class="red ">CAM</p>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="# "> <span class="color7 "> </span>
                                              <p class="red ">BẠC</p>
                                          </a>
                                      </li>
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
                  <select name="xemay" id="xemay">
                      <option value="jupiter">Tên: A-Z</option>
                      <option value="wave">Giá: Tăng dần</option>
                      <option value="exciter">Giá: giảm dần</option>
                      <option value="suzuki">Tên: Z-A</option>
                      <option value="suzuki">Cũ nhất</option>
                      <option value="suzuki">Mới nhất</option>
                      <option value="suzuki">Bán chạy nhất</option>
                  </select>
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
                                      <span class="sale_price_sp">{{number_format($product->sale_price)}}</span>
                                      <span class="regular_price_sp"><del>{{number_format($product->regular_price)}}</del></span>
                                      @else
                                      <span class="price-new">{{($product->regular_price)!=0 ? number_format($product->regular_price) : 'Liên Hệ'}}</span>
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
                          <div class="col-sm-4">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <a href="{{route('tintucweb')}}">
                                          <div class="productinfo text-center">
                                              <img src="images/home/poduct-4-1646-2779.jpg" alt="" />
                                              <div class="title_tintuc">
                                                  <div class="title_tintuc_txt_01 text-split-2">Các mẫu mới 2022</div>
                                                  <div class="title_tintuc_txt_02 text-split-1">Ngày đăng: 13/05/2022</div>
                                                  <div class="title_tintuc_txt_03 text-split-3">Shopee - ứng dụng mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Shopee là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á, Việt Nam,Singapore,Malaysia,Indonesia,Thái Lan, Philipin, Đài
                                                      Loan và Brazil. Với sự đảm bảo của Shopee, bạn sẽ mua hàng trực tuyến an tâm và nhanh chóng hơn bao giờ hết!</div>
                                              </div>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/poduct-3-5224-6755.jpg" alt="" />
                                          <div class="title_tintuc">
                                              <div class="title_tintuc_txt_01">Các mẫu mới 2022</div>
                                              <div class="title_tintuc_txt_01">Ngày đăng: 13/05/2022</div>
                                              <div class="title_tintuc_txt_01">......................................................</div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/brand-3-1828-5079.jpg" alt="" />
                                          <div class="title_tintuc">
                                              <div class="title_tintuc_txt_01">Các mẫu mới 2022</div>
                                              <div class="title_tintuc_txt_01">Ngày đăng: 13/05/2022</div>
                                              <div class="title_tintuc_txt_01">......................................................</div>
                                          </div>
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
                                          <img src="images/home/brand-4-3020-1744.jpg" alt="" />
                                          <div class="title_tintuc">
                                              <div class="title_tintuc_txt_01">Các mẫu mới 2022</div>
                                              <div class="title_tintuc_txt_01">Ngày đăng: 13/05/2022</div>
                                              <div class="title_tintuc_txt_01">......................................................</div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/poduct-6-4025-8782.jpg" alt="" />
                                          <div class="title_tintuc">
                                              <div class="title_tintuc_txt_01">Các mẫu mới 2022</div>
                                              <div class="title_tintuc_txt_01">Ngày đăng: 13/05/2022</div>
                                              <div class="title_tintuc_txt_01">......................................................</div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-4">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/poduct-11-1612-3215.jpg" alt="" />
                                          <div class="title_tintuc">
                                              <div class="title_tintuc_txt_01">Các mẫu mới 2022</div>
                                              <div class="title_tintuc_txt_01">Ngày đăng: 13/05/2022</div>
                                              <div class="title_tintuc_txt_01">......................................................</div>
                                          </div>
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

  @endsection