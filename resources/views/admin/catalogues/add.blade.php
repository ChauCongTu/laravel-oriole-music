@extends('layouts.admin')
@section('title')
    Thêm danh mục sản phẩm mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm danh mục sản phẩm</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-loai-san-pham.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên thương hiệu *:</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('quan-ly-loai-san-pham.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
