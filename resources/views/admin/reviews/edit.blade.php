@extends('layouts.admin')
@section('title')
    Chỉnh sửa đánh giá
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Chỉnh sửa đánh giá</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-danh-gia.update', ['quan_ly_danh_gium' => $review]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Họ tên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ $review->name }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">Nội dung (*):</label>
                            <textarea type="text" class="form-control" name="comment">{{ $review->comment }}</textarea>
                            @error('comment')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Hình ảnh (*):</label>
                            <input type="file" class="form-control" name="image" id="customFile">
                            @error('image')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            <a href="{{ route('quan-ly-danh-gia.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
