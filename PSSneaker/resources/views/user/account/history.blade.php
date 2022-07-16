@extends('user.index')
@section('content')
<div class="container">
<div class="wrap_acount">
    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">
            <!-- Right Column -->
            <div class="col-md-12">

                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-twothird_title_main">Đơn hàng của bạn</h2>
                    <div style="overflow-x:auto;">
                    </div>
                </div>
            </div>

            <!-- End Grid -->
        </div>
        <table class="tablehistory">
    <thead>
    <tr class="trhistory">
      <th>Mã Đơn hàng</th>
      <th>Ngày đặt</th>
      <th>Khách hàng</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Địa chỉ</th>
      <th>Thanh toán</th>
      <th>Giao hàng</th>
      <th>Tổng tiền</th>
      <th>Xem chi tiết</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lichsu as $key)
    <tr class="trtdhistory">
      <td>{{$key->code}}</td>
      <td>{{$key->created_at}}</td>
      <td>{{$key->name_customer}}</td>
      <td>{{$key->phone}}</td>
      <td>{{$key->email}}</td>
      <td>{{$key->address}}</td>
      <td>{{$key->payment->name}}</td>
      <td>{{$key->orderdetail->name}}</td>
      <td>{{number_format($key->total)}}₫</td>
      
      <td>
        <a href="{{route('chitietdonhang',$key->id)}}">Xem chi tiết</a>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>

        <!-- End Page Container -->
    </div>

</div>
</div>
@endsection