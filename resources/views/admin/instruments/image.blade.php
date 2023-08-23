@extends('layouts.admin')
@section('title')
    Quản lý hình ảnh sản phẩm
@endsection
@section('content')
    <div class="bg-white p-3">
        <form action="{{ route('quan-ly-san-pham.imagesSP', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image" style="font-size: 20px; color: #000">Thêm ảnh sản phẩm (bạn có thể tải lên tối đa 6
                    ảnh 1 lúc):</label>
                <input type="file" class="form-control" name="images[]" id="customFile" multiple>
                @error('image')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-camera mr-2"></i>Upload</button>
            </div>
        </form>
    </div>
    <div class="">
        <div class="text-danger p-3">(Click vào hình ảnh để xóa ảnh)</div>
        <div class="card card-body">
            <div class="row justify-content-start mb-3">
                @foreach ($imagesArr as $image)
                    <div class="col-md-3 mt-3">
                        <button class="bg-white" data-toggle="modal" data-target="#del_{{ $loop->index }}">
                            <img src="{{ asset($image) }}">
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="del_{{ $loop->index }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header flex-column">
                                    <div class="icon-box">
                                        <i class="zmdi zmdi-close"></i>
                                    </div>
                                    <h4 class="modal-title w-100">Xác nhận xóa</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Bạn có chắc muốn xóa ảnh này? Sau khi xóa sẽ không thể hoàn tác.</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <form action="{{ route('quan-ly-san-pham.deleteImage', ['id' => $id]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="image" value="{{ $image }}">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style>
        .modal-confirm {
            color: #636363;
            width: 400px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }

        .modal-confirm .modal-body {
            color: #999;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }

        .modal-confirm .modal-footer a {
            color: #999;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }

        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .btn,
        .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }

        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }

        .modal-confirm .btn-secondary:hover,
        .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
@endsection
