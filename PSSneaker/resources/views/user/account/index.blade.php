@extends('user.index')
@section('content')
<div class="wrap_acount">
        <div class="w3-content w3-margin-top" style="max-width:1400px;">

            <!-- The Grid -->
            <div class="w3-row-padding">

                <!-- Left Column -->
                <div class="w3-third">

                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container">
                            <img src=" {{ asset('user/eshopper/images//cart/poduct-8-5296-7311.png')}}" style="width:100%" alt="Avatar">
                        </div>
                        <div class="w3-container">
                            <div class="accountcontent">
                                <div class="accountlist">
                                    <ul class="list-unstyled">
                                        <li class="current">
                                            <a href="">Đơn hàng của bạn</a>
                                        </li>
                                        <li class="current">
                                            <a href="">Đăng xuất</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-twothird">

                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="w3-twothird_title_main">Tài khoản của bạn</h2>
                    </div>
                    <div class="w3-container w3-card w3-white">
                        <div class="form_inf_acount">
                            <p class="title_inf_account">Họ tên: <span> Võ minh sanh</span></p>
                            <p class="title_inf_account">Số điện thoại:<span>0387418648</span></p>
                            <p class="title_inf_account">Email: <span>Minhsanh@gmail.com</span></p>
                            <p class="title_inf_account">Địa chỉ: <span>TX An Nhơn, Tỉnh Bình Định</span></p>
                        </div>
                    </div>
                </div>

                <!-- End Grid -->
            </div>

            <!-- End Page Container -->
        </div>

    </div>
    @endsection