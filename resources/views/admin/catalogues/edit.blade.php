@extends('layouts.admin')
@section('title')
    Chỉnh sửa danh mục sản phẩm mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">chỉnh sửa thương hiệu</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-loai-san-pham.update', ['quan_ly_loai_san_pham' => $_data]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên danh mục *:</label>
                            <input type="text" class="form-control" name="name" value="{{ $_data->name }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('quan-ly-loai-san-pham.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
