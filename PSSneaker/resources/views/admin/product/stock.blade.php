@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                        <li class="breadcrumb-item active">Quản lý kho</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card-footer text-sm sticky-top">
        <button class="btn btn-sm bg-gradient-primary text-white insertBtn" type="button" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</button>
        <a class="btn btn-sm bg-gradient-danger" href="{{route('product.index')}}" title="Thoát"><i class="fas fa-sign-out-alt mr-2"></i>Thoát</a>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách stock</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Tên sản phẩm</th>
                        <th class="align-middle text-center">Size</th>
                        <th class="align-middle text-center">Số Lượng</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lststock) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lststock as $stock)
                    <tr>
                        <td class="align-middle text-center">
                            <p>{{$stock->product->name}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$stock->size->size}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$stock->quantity}}</p>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <button type="button" value="{{$stock->id}}" class="text-primary updateBtn border-0 bg-transparent mr-2" title="Chỉnh sửa"><i class="fas fa-edit"></i></button>
                            <button type="button" value="{{$stock->id}}" class="text-danger deleteBtn border-0 bg-transparent mr-2" title="Xóa"><i class="fas fa-trash-alt"></i></button>
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
                        <form action="{{route('stock.delete')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                Bạn có chắc muốn xóa mục này ?
                            </div>
                            <input type="hidden" id="deleteting_id" name="deleteting_id">
                            <div class="modal-footer">
                                <input type="hidden" name="idproduct" id="idproduct" value="{{$id_product}}">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Đồng ý</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle text-success"></i> Thêm Stock</h5>
                        </div>
                        <form method="post" action="{{route('stock.add')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group col-xl-12 col-sm-4">
                                    <label class="d-block" for="lstsize">Danh mục size:</label>
                                    <select class="form-select" aria-label="Default select example" name="lstsize" id="lstsize">
                                        @foreach($lstsize as $size)
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-12 col-sm-4">
                                    <label for="quantity" class="d-inline-block align-middle">Số lượng:</label>
                                    <input type="number" class="form-control d-inline-block align-middle text-sm" min="1" name="quantity" id="quantity" placeholder="Số lượng" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="idproduct" id="idproduct" value="{{$id_product}}">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit text-primary"></i> Cập nhập Stock</h5>
                        </div>
                        <form method="POST" action="{{route('stock.refresh')}}">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group col-xl-12 col-sm-4">
                                    <label class="d-block" for="lstsize">Danh mục size:</label>
                                    <select class="form-select" aria-label="Default select example" name="lstsize" id="lstsize">
                                        @foreach($lstsize as $size)
                                        <option value="{{$size->id}}">{{$size->size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-12 col-sm-4">
                                    <label for="quantity" class="d-inline-block align-middle">Số lượng:</label>
                                    <input type="number" class="form-control d-inline-block align-middle text-sm" min="1" name="quantity" id="quantity" placeholder="Số lượng" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="updateting_id" id="updateting_id">
                                <input type="hidden" name="idproduct" id="idproduct" value="{{$id_product}}">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Cập nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection