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
                        <th class="align-middle text-center">View</th>
                    </tr>
                </thead>
                @if(count($lstuser) === 0)
                <tbody>
                    <tr>
                        <td colspan="100" class="text-center">Không có dữ liệu</td>
                    </tr>
                </tbody>
                @else
                <tbody>
                    @foreach($lstuser as $user)
                    <tr>
                        <td class="align-middle text-center">
                            <p>{{$user->name}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <img class="rounded img-preview" src="{{$user->avatar}}" alt="Alt Photo">
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$user->phone}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$user->email}}</p>
                        </td>
                        <td class="align-middle text-center">
                            <p>{{$user->address}}</p>
                        </td>
                        <td class="align-middle text-center">
                            @if(($user->permission)===1)
                            <p>Admin</p>
                            @else
                            <p>User</p>
                            @endif
                        </td>
                        <td class="align-middle text-center">
                            @if(($user->permission)===1)
                            <i class="fas fa-key text-warning"></i>
                            @else
                            @if(($user->block)===1)
                            <button class="text-dark viewBtn border-0 bg-transparent" type="button" value="{{$user->id}}" title="View"><i class="fas fa-lock"></i></button>
                            @else
                            <button class="text-dark viewBtn border-0 bg-transparent" type="button" value="{{$user->id}}" title="View"><i class="fas fa-lock-open"></i></button>
                            @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
            <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-circle"></i> Thông tin người dùng</h5>
                        </div>
                        <form action="{{route('user.update')}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="modal-body">
                                <div class="card card-primary card-outline text-sm">
                                    <div class="card-body row">
                                        <div class="form-group col-12">
                                            <label>Tên: </label>
                                            <p class="d-inline-block" id="name"></p>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Email: </label>
                                            <p class="d-inline-block" id="email"></p>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Ngày sinh: </label>
                                            <p class="d-inline-block" id="birthday"></p>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Điện thoại: </label>
                                            <p class="d-inline-block" id="phone"></p>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Giới tính: </label>
                                            <p class="d-inline-block" id="gender"></p>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Địa chỉ: </label>
                                            <p class="d-inline-block" id="address"></p>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="block-checkbox" class="d-inline-block align-middle mb-0 mr-2">Khóa tài khoản:</label>
                                            <div class="custom-control custom-checkbox d-inline-block align-middle">
                                                <input type="checkbox" class="custom-control-input block-checkbox" name="block" id="block" value="0">
                                                <label for="block" class="custom-control-label"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="updateting_id" name="updateting_id">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagination flex-wrap justify-content-center">
        {!! $lstuser->links() !!}
    </div>