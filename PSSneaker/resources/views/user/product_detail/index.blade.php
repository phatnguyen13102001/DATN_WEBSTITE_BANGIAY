@extends('user.index')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="padding_category">
                    <div class="col-sm-12 padding-right">
                        <div class="product-details">
                            <!--product-details-->
                            <div class="col-sm-5">
                                <div class="grid images_3_of_2">
                                    <ul id="etalage">
                                        <li>
                                            <img class="etalage_source_image" src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                            <img class="etalage_thumb_image"  src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                        </li>
                                        <li>
                                            <img class="etalage_source_image"  src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                            <img class="etalage_thumb_image"  src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                        </li>
                                        <li>
                                            <img class="etalage_source_image"  src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                            <img class="etalage_thumb_image"  src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                        </li>
                                        <li>
                                            <img class="etalage_source_image"  src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                            <img class="etalage_thumb_image" src="{{ asset('user/eshopper/images/product-details/poduct-1-1318-1352.jpg')}}" class="img-responsive" />
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div class="col-sm-7">
                                <div class="product-information">
                                    <!--/product-information-->
                                    <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2 class="title_categoridetail_txt">Giày Vans</h2>
                                    <span class="title_hang_sx">Hãng sản xuất: <span>Vans</span> </span>
                                    <div class="border_giaandtien">
                                        <label class="gia_detail" for="">Giá: </label>
                                        <div class="formmoneyproductdetail">
                                            <span class="moneynew">20000đ </span>
                                            <span class="moneyold">30000đ</span>
                                        </div>
                                    </div>
                                    <div class="border_giaandtien">
                                        <table class="variations" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="label_size"><label>Size</label></td>
                                                    <td class="value">
                                                        <div class="flex_lable_size">
                                                            <div class="size_option"><span>37</span></div>
                                                            <div class="size_option"><span>37</span></div>
                                                            <div class="size_option"><span>37</span></div>
                                                            <div class="size_option"><span>37</span></div>
                                                            <div class="size_option"><span>37</span></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="border_giaandtien">
                                        <table class="variations" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="label_size"><label>Màu</label></td>
                                                    <td class="value">
                                                        <div class="flex_lable_size">
                                                            <div class="mau_option"></div>
                                                            <div class="mau_option1"></div>
                                                            <div class="mau_option2"></div>
                                                            <div class="mau_option3"></div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="border_giaandtien">
                                        <div class="form_soluong">
                                            <label for="">Chọn số lượng: </label>
                                            <input type="number" value="3" />

                                        </div>
                                    </div>
                                    <span>
                                        <button id="test1" type="button" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Thêm Vào Giỏ Hàng
                                        </button>

                                        <a href="{{route('giohangweb')}}">
                                            <button type="button" class="btn btn-fefault cart01">
                                                Mua Ngay
                                            </button>
                                        </a>
                                    </span>
                                </div>
                                <!--/product-information-->
                            </div>
                        </div>
                        <!--  -->
                       
                        <!--  -->
                        <!--/product-details-->

                        <div class="category-tab shop-details-tab">
                            <div class="tab-pane fade active in" id="reviews">
                                <div class="col-sm-12">
                                    <div class="title_gioithieu_product_detail">THÔNG TIN SẢN PHẨM</div>
                                    <div class="content-container">
                                        <div id="editor">
                                            <p>😘 Hàng của shop rất nhiều luôn có sẵn</p>
                                            <p>😘 Shop nhập hàng trực tiếp không qua trung gian nên Giá Ưu Đãi nhất chất lượng nhất</p>
                                            <p>⭐️TỔNG KHO GIÀY SNEAKER MIỀN BẮC CAM KẾT VÀ BẢO ĐẢM ✅ TỔNG KHO GIÀY SNEAKER MIỀN BẮC</p>
                                            <p>CAM KẾT: HÌNH CHỤP THẬT 100% SẢN PHẨM</p>
                                            <p>✅ TỔNG KHO GIÀY SNEAKER MIỀN BẮC CAM KẾT: Giá tốt nhất thị trường, được kiểm tra hàng trước khi thanh toán </p>
                                            <p>✅ TỔNG KHO GIÀY SNEAKER MIỀN BẮC CAM KẾT: Giày đúng như hình,không đúng tặng miễn phí luôn đôi giày.</p>
                                            <p>*** CHÚ Ý: Nhấn "THEO DÕI" shop để cập nhật MẪU MỚI và các chương trình SALE OFF, lấy mã FREE SHIP, đặt 2 đôi trở lên để được hưởng KHUYẾN MÃI nhiều nhất !</p>
                                            <p>⚠ Lưu ý: 💖 [FREE SHIP] cho TẤT CẢ đơn hàng từ 150K, hỗ trợ tối đa 40K (đơn hàng nào có phí ship > 40K, sẽ tính phí ship sau khi trừ đi 40K)
                                            </p>
                                            <p>✅Các bạn đặt hàng nhớ chọn ĐÚNG MÀU, ĐÚNG SIZE như shop đã phân loại, nếu đặt nhầm thì HỦY đi và ĐẶT LẠI,đừng viết trong Ghi chú, tránh trường hợp giao nhầm ! </p>
                                            <p>✅ Các bạn muốn đặt thêm màu hoặc mua nhiều đôi size khác nhau thì chọn size -> nhấn thêm vào Giỏ hàng -> chọn đôi tiếp theo, sau khi chọn xong thì nhấn "Mua hàng" !</p>
                                            <p>✅ Thời gian giao hàng, phí ship, đơn hàng đang tới đâu sẽ được hệ thống hiển thị tự động khi các bạn ĐẶT HÀNG, nếu có thắc mắc hãy gọi hotline SHOPEE (chỉ SHOPEE mới kiểm tra và giải đáp chính xác vấn đề này
                                                được).
                                            </p>
                                            <p>=> Do nhiều đơn hàng và rất nhiều tin nhắn nên nếu Shop chưa trả lời ngay, mong mọi người thông cảm, Shop sẽ cố gắng sớm nhất. Xin cám ơn !
                                            </p>
                                            <p>✅CAM KẾT đổi hàng hoặc hoàn tiền nếu có vấn đề về đơn hàng, khi cần hãy gọi HOTLINE của NT Sneaker.</p>
                                            <p>#giaythethao #giayjodan #Jodantrangden #giayjodanxam #giayjodantrang #giayjodanxanh #giayjodanvang #jodan #giaythethao #giaynam #giaynu #giayfullbox #giaythethaonamnu #giayulzzang #giayhocsinh #giaysinhvien
                                                #sneaker #freeship #fullbox #giaynamnu #giaygiare #ulzzang #giaysneaker #nyvang #nyden #nydenau #boston #giaysneaker#giaynam #giaythethaonam #giaythethaogiare #giaysnesker #giaysneakernam #giaynamhot #giaynamgiare
                                                #giaynammoi #giaythethaonamdep #giaythoitrang #giaythoitrangnam #giaymreng #mreng #giaynamgiatot #giaynamthethao #giaythethaohot #giaythethaonamhot #giaythethao #giaynu #giayfullbox #giaythethaonamnu #giayulzzang
                                                #freeship #fullbox #giaynamnu #giaygiare #giaysneaker, #giayhoacuc #giaybata #giaynu #giaydep #giaythoitrang</p>

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
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i>Add to cart</button>
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