@extends('layouts.admin')
@section('title')
    Quản lý Người Dùng
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-3 m-b-35">Quản lý người dùng</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <form action="{{ route('quan-ly-nguoi-dung.index') }}" method="get" class="d-flex">
                            <input type="search" name="s" value="{{ $searchString }}" class="form-control"
                                placeholder="Nhập từ khóa..." />
                            <button class="btn btn-danger rounded-0"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="table-data__tool-right">
                        @if (Auth::user()->role === 'Admin')
                            <a href="{{ route('quan-ly-nguoi-dung.create') }}"
                                class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>THÊM</a>
                        @endif
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="pdf">PDF</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Vai trò</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="spacer"></tr>
                            @foreach ($users as $user)
                                <tr class="border-top">
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        <span>{{ $user->name }}</span>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <td class="desc">{{ $user->role }}</td>
                                    <td>
                                        <span>{{ date('d/m/Y', strtotime($user->created_at)) }}</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            @if (Auth::user()->role === 'Admin')
                                                @if ($user->password != '0')
                                                    <div data-toggle="tooltip" data-placement="top" title="Thu hồi"
                                                        class="">
                                                        <button class="item" data-toggle="modal"
                                                            data-target="#ban_{{ $user->id }}">
                                                            <i class="zmdi zmdi-block"></i>
                                                        </button>
                                                    </div>
                                                @endif
                                                <div data-toggle="tooltip" data-placement="top" title="Reset mật khẩu"
                                                    class="">
                                                    <button class="item" data-toggle="modal"
                                                        data-target="#resetPassword_{{ $user->id }}">
                                                        <i class="zmdi zmdi-undo"></i>
                                                    </button>
                                                </div>
                                                <div data-toggle="tooltip" data-placement="top" title="Phân quyền"
                                                    class="">
                                                    <button class="item" data-toggle="modal"
                                                        data-target="#setRole_{{ $user->id }}">
                                                        <i class="zmdi zmdi-swap"></i>
                                                    </button>
                                                </div>
                                                <div data-toggle="tooltip" data-placement="top" title="Xóa">
                                                    <button class="item" data-toggle="modal"
                                                        data-target="#del_{{ $user->id }}">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="setRole_{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('quan-ly-nguoi-dung.setRole', ['id' => $user->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Phân quyền</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="role">Chọn vai trò: </label>
                                                    <select name="role" class="form-control">
                                                        <option value="Admin"
                                                            {{ $user->role == 'Admin' ? 'selected' : false }}>Admin
                                                        </option>
                                                        <option value="User"
                                                            {{ $user->role == 'User' ? 'selected' : false }}>User</option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-danger">Xác
                                                        nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="ban_{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('quan-ly-nguoi-dung.banAccount', ['id' => $user->id]) }}"
                                                method="post" id="formReset">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Xác nhận</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn sẽ thu hồi tài khoản này! Người dùng này sẽ không thể đăng nhập.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Hủy</button>
                                                    <button type="submit" id="resetPassword" class="btn btn-danger">Xác
                                                        nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="resetPassword_{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('quan-ly-nguoi-dung.resetPassword', ['id' => $user->id]) }}"
                                                method="post" id="formReset">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Xác nhận</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc muốn reset mật khẩu của <b>{{ $user->name }}</b>. Sau khi
                                                    bạn
                                                    thực hiện reset, mật khẩu mới sẽ được gửi đến địa chỉ email
                                                    <b>{{ $user->email }}</b>.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Hủy</button>
                                                    <button type="submit" id="resetPassword" class="btn btn-danger">Xác
                                                        nhận</button>
                                                </div>
                                                <div class="progress-pane modal-footer d-none">
                                                    <div class="text-center">
                                                        <div class="content">Hệ thống đang tiến hành khôi phục mật khẩu và
                                                            gửi email! Quá trình này có thể mất 15-30s.</div>
                                                        <div class="progress mt-3">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 100%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="del_{{ $user->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('quan-ly-nguoi-dung.destroy', ['quan_ly_nguoi_dung' => $user]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Xác nhận</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc muốn xóa không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-danger">Xác
                                                        nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <tr class="spacer"></tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $users->links() }}
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            console.log('Jquery active');
            $("form#formReset").submit(function(event) {
                event.preventDefault();
                console.log('Click submit');
                $('.progress-pane').removeClass('d-none');
                this.submit();
            });
        });
    </script>
@endsection
