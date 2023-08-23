@extends('layouts.admin')
@section('title')
    Chỉnh sửa banner
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Chỉnh sửa Banner</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-banner.update', ['quan_ly_banner' => $banner]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Tiêu đề:</label>
                            <input type="text" class="form-control" name="title" value="{{ $banner->title }}">
                            @error('title')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link:</label>
                            <input type="text" class="form-control" name="link" value="{{ $banner->link }}">
                            @error('link')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh banner (*):</label>
                            <input type="file" class="form-control" name="image" id="customFile">
                            @error('image')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('quan-ly-banner.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
