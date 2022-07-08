<footer id="footer">
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="single-widget">
                        <div class="title_footer_0">
                            <h2>THÔNG TIN LIÊN HỆ</h2>
                        </div>
                        <div class="title_footer_01">PS SNEAKEr</div>
                        <div class="title_footer_02">
                            <p>Địa chỉ: {{$setting->address}}</p>
                            <p>Số điện thoại: {{$setting->phone}}</p>
                            <p>Email: {{$setting->email}}</p>
                            <p>Fanpage: {{$setting->fanpage}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
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
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
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