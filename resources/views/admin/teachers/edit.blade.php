@extends('layouts.admin')
@section('title')
    Chỉnh sửa thông tin giảng viên
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Chỉnh sửa giảng viên</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-giang-vien.update', ['quan_ly_giang_vien' => $teacher]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên giảng viên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ $teacher->name }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Giới thiệu (*):</label>
                            <textarea name="description" id="description">
                                {{ $teacher->description }}
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
                            <input type="file" class="form-control" name="avatar"
                                id="customFile">
                            @error('avatar')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            <a href="{{ route('quan-ly-giang-vien.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
