<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-widget">
                        <div class="title_footer_0">
                            <h2>THÔNG TIN LIÊN HỆ</h2>
                        </div>
                        <div class="title_footer_01">PS SNEAKEr</div>
                        <div class="title_footer_02">
                            <div class="icon-content-footer">
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <span>Địa chỉ: {{$setting->address}}</span>
                            </div>
                            <div class="icon-content-footer">
                                <span><i class="fas fa-phone"></i></span>
                                <span>Hotline: {{$setting->phone}}</span>
                                <span> - </span>
                                <span>{{$setting->hotline}}</span>
                            </div>
                            <div class="icon-content-footer">
                                <span><i class="fas fa-envelope"></i></span>
                                <span>Email: {{$setting->email}}</span>
                            </div>
                            <div class="icon-content-footer">
                                <span><i class="fab fa-facebook-f"></i></span>
                                <span>Fanpage: <a href="{{$setting->fanpage}}" target="_blank">{{$setting->fanpage}}</a></span>
                            </div>
                        </div>
                        <div class="flex_mangxh">
                            <div class="title_footer_mangxh">Mạng xã hội</div>
                            <div class="soial_footer_mangxh">

                                <li class="d-inline-block align-top mr-1">
                                    <a href="" target="_blank">
                                        <img class="thumb_social" src="" alt="" />
                                    </a>
                                </li>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Chính sách</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($chinhsach as $cs)
                            <li><a href="{{route('chinhsach',$cs->id)}}">{{$cs->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-0">
                    <div class="single-widget">
                        <h2>face book</h2>
                        <!-- <div class="pluginfacebook">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=1619936111724930&autoLogAppEvents=1" nonce="7necH2eG"></script>
                            <div class="fb-page" data-href="{{$setting->fanpage}}" data-tabs="timeline" data-width="400" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="{{$setting->fanpage}}" class="fb-xfbml-parse-ignore"><a href="{{$setting->fanpage}}">Giày Sneaker</a></blockquote>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="rowfooter">
                <p class="pull-left">Copyright © 2022 PS SNEAKER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Minh sanh</a></span></p>
            </div>
        </div>
    </div>
</footer>