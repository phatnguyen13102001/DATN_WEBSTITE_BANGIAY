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
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free E-Commerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/giay1.png" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>100% Responsive Design</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="images/home/poduct-8-5296-7311.png" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png" class="pricing" alt="" />
                                </div>
                            </div>
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
                                            <label class="checkbox "><input type="checkbox " name="checkbox "
											checked=" "><i></i>ADIDAS</label>
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
                                            <label class="checkbox "><input type="checkbox " name="checkbox "
											checked=" "><i></i>37</label>
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
                    <div class="features_items">
                        <!--features_items-->
                        <div class="features_items_spnb">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="images/home/giay1.png" alt="" />
                                        <p class="text-split-2">GIÀY NIKE</p>
                                        <h2>560000đ</h2>
                                        <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <p class="text-split-2">GIÀY NIKE</p>
                                            <h2>560000đ</h2>

                                            <a href="{{route('chitietsanphamweb')}}" class="btn btn-default product-details1">Xem Chi Tiết</a>
                                            <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features_items_spnb">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="images/home/giay1.png" alt="" />
                                        <h2>560000đ</h2>
                                        <p class="text-split-2">GIÀY NIKE</p>
                                        <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>560000đ</h2>
                                            <p class="text-split-2">GIÀY NIKE</p>
                                            <a href="product-details.html" class="btn btn-default product-details1">Xem Chi Tiết</a>
                                            <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="features_items_spnb">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="images/home/giay1.png" alt="" />
                                        <h2>560000đ</h2>
                                        <p class="text-split-2">GIÀY NIKE</p>
                                        <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>560000đ</h2>
                                            <p class="text-split-2">GIÀY NIKE</p>
                                            <a href="product-details.html" class="btn btn-default product-details1">Xem Chi Tiết</a>
                                            <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features_items_spnb">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="images/home/giay1.png" alt="" />
                                        <h2>560000đ</h2>
                                        <p class="text-split-2">GIÀY NIKE</p>
                                        <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>560000đ</h2>
                                            <p class="text-split-2">GIÀY NIKE</p>
                                            <a href="product-details.html" class="btn btn-default product-details1">Xem Chi Tiết</a>
                                            <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="features_items_spnb">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="images/home/giay1.png" alt="" />
                                        <h2>560000đ</h2>
                                        <p class="text-split-2">GIÀY NIKE</p>
                                        <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>560000đ</h2>
                                            <p class="text-split-2">GIÀY NIKE</p>
                                            <a href="product-details.html" class="btn btn-default product-details1">Xem Chi Tiết</a>
                                            <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="features_items_spnb">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="images/home/giay1.png" alt="" />
                                        <h2>560000đ</h2>
                                        <p class="text-split-2">GIÀY NIKE</p>
                                        <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>560000đ</h2>
                                            <p class="text-split-2">GIÀY NIKE</p>
                                            <a href="product-details.html" class="btn btn-default product-details1">Xem Chi Tiết</a>
                                            <a href="cart.html" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

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