@extends('user.index')
@section('content')
<div class="wrapcthd">
    <div class="container">

        <div class="col-md-12">
            <div class="flex_kh">
                <div class="title_ctlichsu">
                    Sản Phẩm
                </div>
                <!--  -->
                <table class="tablehistory">
                    <thead>
                        <tr class="trhistory">
                            <th>Stt</th>
                            <th>Mã sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>size</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Giá mới</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $chitietdonhang as $value => $key)
                        <tr class="trtdhistory">
                            <td>{{$value+1}}</td>
                            <td>{{$key->SKU}}</td>
                            <td><img src="/storage/{{$key->image}}"/></td>
                            <td>{{$key->name_product}}</td>
                            <td>{{$key->size}}</td>
                            <td>{{$key->name_color}}</td>
                            <td>{{$key->quantity}}</td>
                            @if($key->sale_price !=0)
                            <td><del>{{number_format($key->regular_price)}}₫</del></td>
                            <td>{{$key->sale_price}}</td>
                            @else
                            <td>{{number_format($key->regular_price)}}₫</td>
                            <td>{{$key->sale_price}}</td>
                            @endif
                            @if($key->sale_price !=0 && $key->quantity !=0 )
                            <td>{{$tongtien= $key->sale_price * $key->quantity }}</td>
                            @elseif($key->sale_price ==0 && $key->quantity !=0 && $key->regular_price !=0)
                            <td>{{$tongtien= $key->regular_price* $key->quantity }}</td>
                            @else
                            <td>Liên hệ</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--  -->
            </div>
        </div>
    </div>
</div>
@endsection