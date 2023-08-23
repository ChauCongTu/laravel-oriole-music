@extends('layouts.admin')
@section('title')
    Chỉnh sửa khóa học
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Chỉnh sửa khóa học</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-khoa-hoc.update', ['quan_ly_khoa_hoc' => $course]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ $course->name }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá (*):</label>
                            <input type="text" class="form-control" name="price" value="{{ $course->price }}">
                            @error('price')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="teacher">Giáo viên (*):</label>
                            <input type="text" class="form-control" name="teacher" value="{{ $course->teacher }}">
                            @error('teacher')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Thông tin khóa học (*):</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{!! $course->description !!}</textarea>
                            <script>
                                CKEDITOR.replace('description');
                            </script>

                            @error('description')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung (*):</label>
                            <textarea class="form-control" name="content" id="content" rows="4">{!! $course->content !!}</textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>

                            @error('content')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh thumb (*):</label>
                            <input type="file" class="form-control" name="image" id="customFile">
                            @error('image')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            <a href="{{ route('quan-ly-khoa-hoc.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
