    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title card-title-order d-inline-block align-middle float-none">Danh sách đơn hàng</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Mã đơn hàng</th>
                        <th class="align-middle text-center" style="width:15%">Họ tên</th>
                        <th class="align-middle text-center">Ngày đặt</th>
                        <th class="align-middle text-center">Tổng giá</th>
                        <th class="align-middle text-center">Tình trạng</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lstorder) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstorder as $order)
                    <tr>
                        <td class="align-middle text-center">
                            <a class="text-primary" href="{{route('order.edit',['order'=>$order])}}" title="{{$order->code}}">{{$order->code}}</a>
                        </td>
                        <td class="align-middle text-center">
                            <a class="text-primary" href="{{route('order.edit',['order'=>$order])}}" title="{{$order->name_customer}}">{{$order->name_customer}}</a>
                        </td>
                        <td class="align-middle text-center">{{ date("h:i:s A - d/m/Y", strtotime($order->created_at)) }}</td>
                        <td class="align-middle text-center">
                            <span class="text-danger font-weight-bold">{{number_format($order->total).'₫'}}</span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="order_status">
                                {{$order->orderdetail->name}}
                            </span>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('order.edit',['order'=>$order])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <a class="text-danger" id="delete-item" data-url="index.php?com=order&amp;act=delete&amp;id=6" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
    <div class="pagination flex-wrap justify-content-center">
        {!! $lstorder->links() !!}
    </div>