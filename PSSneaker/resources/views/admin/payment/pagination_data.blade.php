    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Hình thức thanh toán</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Tiêu đề</th>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lstpayment) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstpayment as $payment)
                    <tr>
                        <td class="align-middle text-center">
                            <a class="text-dark text-break" href="{{route('payment.edit',['payment'=>$payment])}}" title="{{$payment->name}}">{{$payment->name}}</a>
                            <div class="tool-action mt-2 w-clear">
                                <a class="text-info mr-3" href="{{route('payment.edit',['payment'=>$payment])}}" title="Chỉnh sửa"><i class="far fa-edit mr-1"></i>Edit</a>
                                <button style="border: none; background-color: transparent;" value="{{$payment->id}}" type="button" class="text-danger deleteBtn" title="Xóa"><i class="far fa-trash-alt mr-2"></i>delete</button>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            @if(($payment->show) === 1)
                            <h5><i class="fas fa-check-circle text-success"></i></h5>
                            @else
                            <h5><i class="fas fa-times-circle text-danger"></i></h5>
                            @endif
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('payment.edit',['payment'=>$payment])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <button style="border: none; background-color: transparent;" value="{{$payment->id}}" type="button" class="text-danger deleteBtn" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            @foreach($lstpayment as $payment)
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning text-warning"></i> Thông Báo</h5>
                        </div>
                        <form method="post" action="{{route('payment.destroy')}}">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                Bạn có chắc muốn xóa mục này ?
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
            @endforeach
        </div>
    </div>
    <div class="pagination flex-wrap justify-content-center">
        {!! $lstpayment->links() !!}
    </div>