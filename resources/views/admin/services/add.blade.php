@extends('layouts.admin')
@section('title')
    Thêm dịch vụ mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm dịch vụ</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-dich-vu.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá (*):</label>
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả (*):</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{{ old('description') }}</textarea>
                            <script>
                                CKEDITOR.replace('description');
                            </script>

                            @error('description')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh thumb (*):</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}"
                                id="customFile">
                            @error('image')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('quan-ly-dich-vu.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
