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
                        <li class="breadcrumb-item active">Quản lý hình ảnh</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{route('social-add')}}" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="index.php?com=photo&amp;act=delete_photo&amp;type=social" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Social</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="align-middle text-center">Hình</th>
                        <th class="align-middle text-center">Link</th>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-90" value="90">
                                <label for="select-checkbox-90" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <a href="index.php?com=photo&amp;act=edit_photo&amp;type=social&amp;id=90" title="">
                                <img class="rounded img-preview" src="http://localhost/PhamHuuDuc_560522W/thumbs/40x40x1/upload/photo/social01-46180.png" alt=""> </a>
                        </td>
                        <td class="align-middle text-center">https://www.google.com/</td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-hienthi-90" data-table="photo" data-id="90" data-attr="hienthi" checked="">
                                <label for="show-checkbox-hienthi-90" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('social-edit')}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <a class="text-danger" id="delete-item" data-url="index.php?com=photo&amp;act=delete_photo&amp;type=social&amp;id=90" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection