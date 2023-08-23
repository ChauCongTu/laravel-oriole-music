@extends('layouts.admin')
@section('title')
    Tạo danh mục mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm danh mục</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-danh-muc.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả:</label>
                            <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
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
