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
                        <li class="breadcrumb-item active">Quản lý tài khoản</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card-footer text-sm sticky-top">
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
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Tài Khoản</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Tên</th>
                        <th class="align-middle text-center">Hình</th>
                        <th class="align-middle text-center">Số điện thoại</th>
                        <th class="align-middle text-center">Email</th>
                        <th class="align-middle text-center">Địa chỉ</th>
                        <th class="align-middle text-center">Phân quyền</th>
                        <th class="align-middle text-center">Khóa</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="align-middle text-center">
                            <p>Phát Nguyễn</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" width="50" height="50" src="{{ asset('/admin/images/LogoShoes.png') }}" alt="">
                        </td>
                        <td class="align-middle text-center">
                            <p>0378998673</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>phatnguyen13102001@gmail.com</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Thị Trấn Chợ Mới, Huyện Chợ Mới, Tỉnh An Giang</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Admin</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc&amp;id=48" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle text-center">
                            <p>Phát Nguyễn</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" width="50" height="50" src="{{ asset('/admin/images/LogoShoes.png') }}" alt="">
                        </td>
                        <td class="align-middle text-center">
                            <p>0378998673</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>phatnguyen13102001@gmail.com</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Thị Trấn Chợ Mới, Huyện Chợ Mới, Tỉnh An Giang</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Admin</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc&amp;id=48" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle text-center">
                            <p>Phát Nguyễn</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" width="50" height="50" src="{{ asset('/admin/images/LogoShoes.png') }}" alt="">
                        </td>
                        <td class="align-middle text-center">
                            <p>0378998673</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>phatnguyen13102001@gmail.com</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Thị Trấn Chợ Mới, Huyện Chợ Mới, Tỉnh An Giang</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Admin</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc&amp;id=48" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle text-center">
                            <p>Phát Nguyễn</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" width="50" height="50" src="{{ asset('/admin/images/LogoShoes.png') }}" alt="CÁCH NẤU MÓN GÀ ÁC SIÊU NGON TẠI NHÀ">
                        </td>
                        <td class="align-middle text-center">
                            <p>0378998673</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>phatnguyen13102001@gmail.com</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Thị Trấn Chợ Mới, Huyện Chợ Mới, Tỉnh An Giang</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Admin</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc&amp;id=48" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle text-center">
                            <p>Phát Nguyễn</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" width="50" height="50" src="{{ asset('/admin/images/LogoShoes.png') }}" alt="">
                        </td>
                        <td class="align-middle text-center">
                            <p>0378998673</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>phatnguyen13102001@gmail.com</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Thị Trấn Chợ Mới, Huyện Chợ Mới, Tỉnh An Giang</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>Admin</p>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc&amp;id=48" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection