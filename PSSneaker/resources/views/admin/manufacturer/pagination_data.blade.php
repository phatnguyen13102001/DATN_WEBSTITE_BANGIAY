    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Hãng Sản Xuất</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle text-center">Tên hãng</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lstManufacturer) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstManufacturer as $manufacturer)
                    <tr>
                        <td class="align-middle">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-83" value="83">
                                <label for="select-checkbox-83" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$manufacturer->id}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$manufacturer->name}}</p>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('manufacturer.edit',['manufacturer'=>$manufacturer])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <button style="border: none; background-color: transparent;" type="button" value="{{$manufacturer->id}}" class="text-danger deleteBtn" title="Xóa"><i class="fas fa-trash-alt"></i></button>
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
                        <form action="{{route('manufacturer.destroy')}}" method="post">
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
        </div>
    </div>
    <div class="pagination flex-wrap justify-content-center">
        {!! $lstManufacturer->links() !!}
    </div>