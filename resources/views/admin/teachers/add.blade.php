@extends('layouts.admin')
@section('title')
    Thêm giảng viên mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm giảng viên</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-giang-vien.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên giảng viên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Giới thiệu (*):</label>
                            <textarea name="description" id="description">
                                {{ old('description') }}
                            </textarea>
                            <script>
                                CKEDITOR.replace('description');
                            </script>
                            @error('description')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Ảnh đại diện (*):</label>
                            <input type="file" class="form-control" name="avatar" value="{{ old('avatar') }}"
                                id="customFile">
                            @error('avatar')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('quan-ly-giang-vien.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
