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
                        <li class="breadcrumb-item active">Quản lý bài viết</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{route('payment.create')}}" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="index.php?com=news&amp;act=delete&amp;type=hinh-thuc-thanh-toan" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="doEnter(event,'keyword','index.php?com=news&amp;act=man&amp;type=hinh-thuc-thanh-toan')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','index.php?com=news&amp;act=man&amp;type=hinh-thuc-thanh-toan')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Hình thức thanh toán</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center" width="5%">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                                <label for="selectall-checkbox" class="custom-control-label"></label>
                            </div>
                        </th>
                        <th class="align-middle text-center">Tiêu đề</th>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @foreach($lstpayment as $payment)
                <tbody>
                    <tr>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-16" value="16">
                                <label for="select-checkbox-16" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <a class="text-dark text-break" href="" title="">{{$payment->name}}</a>
                            <div class="tool-action mt-2 w-clear">
                                <a class="text-info mr-3" href="index.php?com=news&amp;act=edit&amp;type=hinh-thuc-thanh-toan&amp;id=16" title="Thanh toán sau khi nhận hàng"><i class="far fa-edit mr-1"></i>Edit</a>
                                <a class="text-danger" id="delete-item" data-url="index.php?com=news&amp;act=delete&amp;type=hinh-thuc-thanh-toan&amp;id=16" title="Thanh toán sau khi nhận hàng"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-hienthi-16" data-table="news" data-id="16" data-attr="hienthi" checked="">
                                <label for="show-checkbox-hienthi-16" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                                <a class="text-primary mr-2" href="{{route('payment.edit',['payment'=>$payment])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                <button style="border: none; background-color: transparent;" value="{{$payment->id}}" type="button" class="text-danger deleteBtn" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            @foreach($lstpayment as $payment)
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-warning text-warning"></i> Thông Báo</h5>
                        </div>
                        <form class="validation-form" method="post" action="{{route('payment.destroy',['payment'=>$payment])}}">
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
</section>
@endsection