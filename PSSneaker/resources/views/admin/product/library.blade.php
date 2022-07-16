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
                        <li class="breadcrumb-item active">Quản lý thư viện</li>
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
            <h3 class="card-title">Danh sách thư viện</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Tên sản phẩm</th>
                        <th class="align-middle text-center">Hình ảnh</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lstlibrary) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstlibrary as $library)
                    <tr>
                        <td class="align-middle text-center">
                            <p>{{$library->product->name}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" src="{{$library->image}}" alt="Alt Photo">
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <button type="button" value="{{$library->id}}" class="text-primary updateBtn border-0 bg-transparent mr-2" title="Chỉnh sửa"><i class="fas fa-edit"></i></button>
                            <button type="button" value="{{$library->id}}" class="text-danger deleteBtn border-0 bg-transparent mr-2" title="Xóa"><i class="fas fa-trash-alt"></i></button>
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
                        <form action="{{route('library.deletelib')}}" method="post">
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
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle text-success"></i> Thêm thư viện ảnh</h5>
                        </div>
                        <form method="post" action="{{route('library.add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="card card-primary card-outline text-sm" id="card_image">
                                    <div class="card-header">
                                        <h3 class="card-title">Hình ảnh sản phẩm</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="photoUpload-zone">
                                            <div class="photoUpload-detail">
                                                <img id="photoUpload-preview" src="{{asset('admin_pssneaker/images/noimage.png')}}" alt="Alt Photo">
                                            </div>
                                            <label class="photoUpload-file" id="photo-zone" for="file-zone">
                                                <input type="file" name="image" id="file-zone">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                            </label>
                                            <strong class="d-block text-sm">Width: 600 px - Height: 600 px (.jpg|.gif|.png|.jpeg|.gif)</strong>
                                        </div>
                                    </div>
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
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit text-primary"></i> Cập nhập thư viện</h5>
                        </div>
                        <form method="POST" action="{{route('library.update')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-header">
                                        <h3 class="card-title">Hình ảnh sản phẩm</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="photoUpload-zone">
                                            <label class="photoUpload-file" id="photo-zone" for="file-zone-update">
                                                <input type="file" name="image" id="file-zone-update">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                                            </label>
                                            <strong class="d-block text-sm">Width: 600 px - Height: 600 px (.jpg|.gif|.png|.jpeg|.gif)</strong>
                                        </div>
                                    </div>
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