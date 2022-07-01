@extends('admin.index')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Bản điều khiển</a></li>
                        <li class="breadcrumb-item active">Quản lý tin tức</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{route('policy.create')}}" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="index.php?com=news&amp;act=delete&amp;type=chinh-sach" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar text-sm" type="search" id="keywordpolicy" name="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                </div>
            </div>
        </div>
    </div>
    <div id="table_data">
        @include('admin.policy.pagination_data')
    </div>
</section>
@endsection