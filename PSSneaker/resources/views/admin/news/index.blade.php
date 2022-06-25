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
    <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{route('news.create')}}" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>
        <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="index.php?com=news&amp;act=delete&amp;type=tin-tuc" title="Xóa tất cả"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" onkeypress="doEnter(event,'keyword','index.php?com=news&amp;act=man&amp;type=tin-tuc')">
                <div class="input-group-append bg-primary rounded-right">
                    <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','index.php?com=news&amp;act=man&amp;type=tin-tuc')">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Tin tức</h3>
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
                        <th class="align-middle text-center">Hình</th>
                        <th class="align-middle text-center">Tiêu đề</th>
                        <th class="align-middle text-center">Nổi bật</th>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @foreach($lstnews as $news)
                <tbody>
                    <tr>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-48" value="48">
                                <label for="select-checkbox-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <a href="" title="image">
                                <img class="rounded img-preview" src="{{$news->image}}" alt="{{$news->title}}"> </a>
                        </td>
                        <td class="align-middle text-center">
                            <a class="text-dark text-break" href="" title="title">{{$news->name}}</a>
                            <div class="tool-action mt-2 w-clear">
                                <a class="text-primary mr-3" href="" target="_blank" title=""><i class="far fa-eye mr-1"></i>View</a>
                                <a class="text-info mr-3" href="" title=""><i class="far fa-edit mr-1"></i>Edit</a>
                                <a class="text-danger" id="delete-item" data-url="" title=""><i class="far fa-trash-alt mr-1"></i>Delete</a>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-noibat-48" data-table="news" data-id="48" data-attr="noibat" checked="">
                                <label for="show-checkbox-noibat-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox my-checkbox">
                                <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-hienthi-48" data-table="news" data-id="48" data-attr="hienthi" checked="">
                                <label for="show-checkbox-hienthi-48" class="custom-control-label"></label>
                            </div>
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <form method="post" action="{{route('news.destroy',['news'=>$news])}}">
                                @csrf
                                @method('DELETE')
                                <a class="text-primary mr-2" href="{{route('news.edit',['news'=>$news])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                                <button style="border: none; background-color: transparent;" type="submit" class="text-danger" title="Xóa"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection