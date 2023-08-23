@extends('layouts.admin')
@section('title')
    Quản lý bài viết
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-3 m-b-35">Quản lý bài viết</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <form action="{{ route('quan-ly-bai-viet.index') }}" method="get" class="d-flex">
                            <input type="search" name="s" value="{{ $searchString }}" class="form-control"
                                placeholder="Nhập từ khóa..." />
                            <button class="btn btn-danger rounded-0"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{ route('quan-ly-bai-viet.create') }}"
                            class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>THÊM</a>
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
                                <th>Thumb</th>
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Người đăng</th>
                                <th>Thời gian lên bài</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="spacer"></tr>
                            @foreach ($posts as $post)
                                <tr class="border-top">
                                    <td>
                                        {{ $post->id }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="120px">
                                    </td>
                                    <td>
                                        <span>{{ $post->title }}</span>
                                    </td>
                                    <td class="desc">{{ $post->category->name }}</td>
                                    <td>
                                        {{ $post->author->name }}
                                    </td>
                                    <td>
                                        {{ ($post->posted_time == null ) ? date('H:i d/m/Y', strtotime($post->created_at)) : date('H:i d/m/Y', $post->posted_time) }}
                                    </td>
                                    <td>
                                        <span>{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('quan-ly-bai-viet.edit', ['quan_ly_bai_viet' => $post]) }}"
                                                class="item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <div data-toggle="tooltip" data-placement="top" title="Xóa">
                                                <button class="item" data-toggle="modal"
                                                    data-target="#del_{{ $post->id }}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="del_{{ $post->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('quan-ly-bai-viet.destroy', ['quan_ly_bai_viet' => $post]) }}"
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
                        {{ $posts->links() }}
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </section>
@endsection
