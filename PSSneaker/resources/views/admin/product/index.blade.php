@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{route('product-add')}}" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer form-group-category text-sm bg-light row">
        <div class="form-group col-xl-2 col-sm-4">
            <select class="form-select" aria-label="Default select example">
                <option selected>Chọn hãng sản xuất</option>
                <option value="1">Nike</option>
                <option value="2">Adidas</option>
                <option value="3">Converse</option>
                <option value="4">Vans</option>
            </select>
        </div>
    </div>
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
                <tbody>
                    <tr>
                        <td class="align-middle">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-83" value="83">
                                <label for="select-checkbox-83" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <p>MHJ793</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Giày adidas</p>
                            <div class="tool-action mt-2 w-clear">
                                <a class="text-primary mr-3" href="" target="_blank" title=""><i class="far fa-eye mr-1"></i>View</a>
                                <a class="text-info mr-3" href="" title=""><i class="far fa-edit mr-1"></i>Edit</a>
                                <a class="text-danger" id="delete-item" data-url="" title=""><i class="far fa-trash-alt mr-1"></i>Delete</a>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" width="100" height="50" src="https://mcdn.coolmate.me/image/July2021/Giay-jordan-low-1.jpg" alt="">
                        </td>
                        <td class="align-middle text-center">
                            <p>Adidas</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('product-edit')}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc&amp;id=48" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection