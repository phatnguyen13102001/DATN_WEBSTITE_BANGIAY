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
                            @if(($order->id_orderstatus) ===1 || ($order->id_orderstatus) ===2)
                            <button type="button" class="text-dark border-0 bg-transparent" title="khóa"><i class="fas fa-lock"></i></button>
                            @else
                            <button type="button" value="{{$order->id}}" class="text-danger deleteBtn border-0 bg-transparent" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning text-warning"></i> Thông Báo</h5>
                        </div>
                        <form action="{{route('order.destroy')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                Bạn có chắc muốn xóa hóa đơn này nếu xóa hóa đơn chi tiết hóa đơn sẽ bị mất ?
                            </div>
                            <input type="hidden" id="deleteting_id" name="deleteting_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Đồng ý</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination flex-wrap justify-content-center">
        {!! $lstorder->links() !!}
    </div>