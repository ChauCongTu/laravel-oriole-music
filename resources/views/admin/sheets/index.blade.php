@extends('layouts.admin')
@section('title')
    Quản lý sheet nhạc
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-3 m-b-35">Quản lý sheet nhạc</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <form action="{{ route('quan-ly-sheet-nhac.index') }}" method="get" class="d-flex">
                            <input type="search" name="s" value="{{ $searchString }}" class="form-control"
                                placeholder="Nhập từ khóa..." />
                            <button class="btn btn-danger rounded-0"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="{{ route('quan-ly-sheet-nhac.create') }}"
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
                                <th>Giá</th>
                                <th>Ngày tạo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="spacer"></tr>
                            @foreach ($sheets as $sheet)
                                <tr class="border-top">
                                    <td>
                                        {{ $sheet->id }}
                                    </td>
                                    <td>
                                        <img src="{{ asset($sheet->image) }}" alt="{{ $sheet->name }}" width="120px">
                                    </td>
                                    <td>
                                        <span>{{ $sheet->name }}</span>
                                    </td>
                                    <td>
                                        <x-price :price='$sheet->price' :discount='$sheet->discount' :to='$sheet->discount_to' />
                                    </td>
                                    <td>
                                        <span>{{ date('d/m/Y', strtotime($sheet->created_at)) }}</span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <div data-toggle="tooltip" data-placement="top" title="Cập nhật khuyến mãi"
                                                class="mr-1">
                                                <button class="item" data-toggle="modal"
                                                    data-target="#discount_{{ $sheet->id }}">
                                                    <i class="zmdi zmdi-trending-up"></i>
                                                </button>
                                            </div>
                                            <a href="{{ route('quan-ly-sheet-nhac.edit', ['quan_ly_sheet_nhac' => $sheet]) }}"
                                                class="item" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <div data-toggle="tooltip" data-placement="top" title="Xóa">
                                                <button class="item" data-toggle="modal"
                                                    data-target="#del_{{ $sheet->id }}">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="discount_{{ $sheet->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('quan-ly-sheet-nhac.changeDiscount', ['id' => $sheet->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Cập nhật khuyến mãi</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($sheet->discount_to > time())
                                                        <div class="form-group text-danger">
                                                            Sheet nhạc này đang được giảm
                                                            {{ number_format($sheet->discount) }}đ cho tới
                                                            {{ date('H:i d/m/Y', $sheet->discount_to) }}.<br />
                                                            Nhập thời gian khuyến mãi và giá khuyến mãi bằng 0 để kết thúc
                                                            khuyến mãi ngay lập
                                                            tức.
                                                        </div>
                                                    @else
                                                        <div class="form-group text-danger">
                                                            Sheet nhạc này hiện không có khuyến mãi.
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="discount">Số tiền được giảm:</label>
                                                        <input type="text" class="form-control" name="discount" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="discount_to">Thời gian khuyến mãi (nhập số
                                                            ngày):</label>
                                                        <input type="text" class="form-control" name="discount_to" />
                                                    </div>
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
                                <div class="modal fade" id="del_{{ $sheet->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form
                                                action="{{ route('quan-ly-sheet-nhac.destroy', ['quan_ly_sheet_nhac' => $sheet]) }}"
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
                        {{ $sheets->links() }}
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </section>
@endsection
