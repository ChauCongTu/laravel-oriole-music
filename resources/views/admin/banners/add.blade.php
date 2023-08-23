@extends('layouts.admin')
@section('title')
    Thêm banner mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm Banner</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tiêu đề:</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="summary">Mô tả:</label>
                            <input type="text" class="form-control" name="summary" value="{{ old('summary') }}">
                            @error('summary')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link:</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link') }}">
                            @error('link')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Ảnh banner (*):</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="customFile">
                            @error('image')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('quan-ly-banner.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
