    <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
            <h3 class="card-title">Danh sách Tin tức</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="align-middle text-center">Hình</th>
                        <th class="align-middle text-center">Tiêu đề</th>
                        <th class="align-middle text-center">Nổi bật</th>
                        <th class="align-middle text-center">Hiển thị</th>
                        <th class="align-middle text-center">Thao tác</th>
                    </tr>
                </thead>
                @if(count($lstnews) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstnews as $news)
                    <tr>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" src="{{$news->image}}" alt="{{$news->title}}">
                        </td>
                        <td class="align-middle text-center">
                            <a class="text-dark text-break" href="{{route('news.edit',['news'=>$news])}}" title="{{$news->name}}">{{$news->name}}</a>
                            <div class="tool-action mt-2 w-clear">
                                <a class="text-primary mr-3" href="{{route('newsdetail',$news->id)}}" target="_blank" title="View"><i class="far fa-eye mr-1"></i>View</a>
                                <a class="text-info mr-3" href="{{route('news.edit',['news'=>$news])}}" title="Edit"><i class="far fa-edit mr-1"></i>Edit</a>
                                <button class="text-danger deleteBtn border-0 bg-transparent" type="button" value="{{$news->id}}"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            @if(($news->outstanding) === 1)
                            <h5><i class="fas fa-check-circle text-success"></i></h5>
                            @else
                            <h5><i class="fas fa-times-circle text-danger"></i></h5>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if(($news->show) === 1)
                            <h5><i class="fas fa-check-circle text-success"></i></h5>
                            @else
                            <h5><i class="fas fa-times-circle text-danger"></i></h5>
                            @endif
                        </td>
                        <td class="align-middle text-center text-md text-nowrap">
                            <a class="text-primary mr-2" href="{{route('news.edit',['news'=>$news])}}" title="Chỉnh sửa"><i class="fas fa-edit"></i></a>
                            <button type="button" value="{{$news->id}}" class="text-danger deleteBtn border-0 bg-transparent" title="Xóa"><i class="fas fa-trash-alt"></i></button>
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
                        <form action="{{route('news.destroy')}}" method="post">
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
        {!! $lstnews->links() !!}
    </div>