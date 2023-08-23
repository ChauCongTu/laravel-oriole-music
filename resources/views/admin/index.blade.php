@extends('layouts.admin')
@section('title')
    Trang quản trị
@endsection
@section('content')
    <div class="bg-white p-3">
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1 pb-5">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-graduation-cap"></i>
                            </div>
                            <div class="text">
                                <h2>{{ number_format($stats['courses']) }}</h2>
                                <span>Khóa học</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-dns"></i>
                            </div>
                            <div class="text">
                                <h2>{{ number_format($stats['services']) }}</h2>
                                <span>Dịch vụ</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3 pb-5">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-collection-music"></i>
                            </div>
                            <div class="text">
                                <h2>{{ number_format($stats['sheets']) }}</h2>
                                <span>Sheets</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-file"></i>
                            </div>
                            <div class="text">
                                <h2>{{ number_format($stats['posts']) }}</h2>
                                <span>Bài viết</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 bg-white p-3">
        <div class="h3 py-3">Liên hệ</div>
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Từ</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Tình trạng</th>
                        <th>Gửi lúc</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->status }}</td>
                            <td>{{ date('H:i d/m/Y', strtotime($contact->created_at)) }}</td>
                            <td>
                                <div class="table-data-feature">

                                    <button class="item" data-placement="top" data-toggle="modal"
                                        data-target="#detail_{{ $contact->id }}" title="Xem liên hệ">
                                        <i class="zmdi zmdi-info"></i>
                                    </button>
                                    @if ($contact->status == 'Chưa xử lý')
                                        <button class="item" data-placement="top" data-toggle="modal"
                                            data-target="#handled_{{ $contact->id }}" title="Đánh dấu là đã xử lý">
                                            <i class="zmdi zmdi-check"></i>
                                        </button>
                                    @endif
                                    <button class="item" data-placement="top" data-toggle="modal"
                                        data-target="#del_{{ $contact->id }}" title="Xóa">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- The Modal -->
                        <div class="modal fade" id="detail_{{ $contact->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Thông tin liên hệ</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex form-group">
                                            <div class="font-weight-bold col-md-4">Người gửi:</div>
                                            <div class="col-md-8">{{ $contact->name }}</div>
                                        </div>
                                        <div class="d-flex form-group">
                                            <div class="font-weight-bold col-md-4">Số điện thoại:</div>
                                            <div class="col-md-8"><span class="mr-3">{{ $contact->phone }}</span>[<a href="tel:{{ $contact->phone }}"><i class="zmdi zmdi-phone"></i> Gọi trực tiếp</a>]</div>
                                        </div>
                                        <div class="d-flex form-group">
                                            <div class="font-weight-bold col-md-4">Email:</div>
                                            <div class="col-md-8"><a href="mailto:{{ $contact->email }}" class="text-dark">{{ $contact->email }}</a></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="font-weight-bold col-md-4">Nội dung:</div>
                                            <div class="content  border p-2 rounded mt-2">{!! $contact->content !!}</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="handled_{{ $contact->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.contact.handled', ['id' => $contact->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xác nhận</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Liên hệ này đã được xủ lý?
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
                        <div class="modal fade" id="del_{{ $contact->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.contact.destroy', ['id' => $contact->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Xác nhận</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
