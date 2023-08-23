@extends('layouts.admin')
@section('title')
    Tạo bài viết mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm bài viết</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-bai-viet.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề (*):</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung (*):</label>
                            <textarea class="form-control" name="content" id="content" rows="4">{{ old('content') }}</textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>

                            @error('content')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="video">Link youtube:</label>
                            <input type="text" class="form-control" name="video" value="{{ old('video') }}">
                            @error('video')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh thumb (*):</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="customFile">
                            @error('image')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Danh mục (*):</label>
                            <select name="cat_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="posted_time">Thời gian lên bài (để trống để lên bài ngay):</label>
                            <input type="text" class="form-control" name="posted_time" value="{{ old('posted_time') }}" placeholder="giờ:phút:giây ngày-tháng-năm">
                            @error('posted_time')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('quan-ly-danh-muc.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
