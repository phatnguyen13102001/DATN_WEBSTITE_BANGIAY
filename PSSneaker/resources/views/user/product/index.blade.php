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

            <div class="stickymenu col-sm-3">
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
                                    <div class="col col-4 ">
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
                    <!--/category-productsr-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">SẢN PHẨM</h2>
                <div class="features_items">
                    <!--features_items-->
                    @foreach($lstproduct as $product)
                    <div class="features_items_spnb">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$product->image}}" alt="{{$product->name}}" />
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
                    @endforeach
                    <div class="col-sm-12">
                        <div class="flex_ajax">
                            <ul class="pagination">
                                <li class="active"><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection