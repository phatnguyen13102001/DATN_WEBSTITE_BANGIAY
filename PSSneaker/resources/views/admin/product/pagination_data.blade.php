    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Sản Phẩm</h3>
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
                        <th class="align-middle text-center">SKU</th>
                        <th class="align-middle text-center">Tên sản phẩm</th>
                        <th class="align-middle text-center">Hình</th>
                        <th class="align-middle text-center">Hãng</th>
                        <th class="align-middle text-center">Nổi bật</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lstproduct) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstproduct as $product)
                    <tr>
                        <td class="align-middle">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-83" value="83">
                                <label for="select-checkbox-83" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$product->SKU}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$product->name}}</p>
                            <div class="tool-action mt-2 w-clear">
                                <a class="text-primary mr-3" href="{{route('productdetail',$product->id)}}" target="_blank" title="View"><i class="far fa-eye mr-1"></i>View</a>
                                <a class="text-info mr-3" href="{{route('product.edit',['product'=>$product])}}" title="Chỉnh sửa"><i class="far fa-edit mr-1"></i>Edit</a>
                                <a class="text-danger deleteBtn" value="{{'$product->id'}}" id="delete-item" title="Xóa"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" src="{{$product->image}}" alt="Alt Photo">
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$product->manufacturer->name}}</p>
                        </td>
                        <td class="align-middle text-center">
                            @if(($product->outstanding) === 1)
                            <h5><i class="fas fa-check-circle text-success"></i></h5>
                            @else
                            <h5><i class="fas fa-times-circle text-danger"></i></h5>
                            @endif
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('product.edit',['product'=>$product])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <button type="button" value="{{$product->id}}" class="text-danger deleteBtn border-0 bg-transparent mr-2" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                            <a class="text-warning mr-2" href="{{route('product.stock',$product->id)}}" title="stock"><i class="fas fa-box-open"></i></a>
                            <a class="text-dark" href="{{route('product.library',$product->id)}}" title="image"><i class="fas fa-image"></i></a>
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
                        <form action="{{route('product.destroy')}}" method="post">
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
        {!! $lstproduct->links() !!}
    </div>