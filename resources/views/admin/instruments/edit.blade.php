@extends('layouts.admin')
@section('title')
    Chỉnh sửa sản phẩm
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Chỉnh sửa sản phẩm</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-san-pham.update', ['quan_ly_san_pham' => $instrument]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ $instrument->name }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá (*):</label>
                            <input type="text" class="form-control" name="price" value="{{ $instrument->price }}">
                            @error('price')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả (*):</label>
                            <textarea class="form-control" name="description" id="description" rows="4">{!! $instrument->description !!}</textarea>
                            <script>
                                CKEDITOR.replace('description');
                            </script>

                            @error('description')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Loại (*):</label>
                            <select name="catalog_id" id="catalog" class="form-control">
                                <option value="">-- Chọn loại sản phẩm --</option>
                                @foreach ($catalogues as $catalogue)
                                    <option value="{{ $catalogue->id }}"
                                        {{ $instrument->catalog_id == $catalogue->id ? 'selected' : false }}>
                                        {{ $catalogue->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Thương hiệu (*):</label>
                            <select name="brand_id" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $instrument->brand_id == $brand->id ? 'selected' : false }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="for-guitar {{ $instrument->catalog_id == 1 ? false : 'd-none' }}">
                            <div class="form-group">
                                <label for="price">Kiểu dáng đàn:</label>
                                <select name="design_id" class="form-control">
                                    <option value="0" selected>Không</option>
                                    @foreach ($designs as $design)
                                        <option value="{{ $design->id }}"
                                            {{ $instrument->design_id == $design->id ? 'selected' : false }}>
                                            {{ $design->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Loại đàn:</label>
                                <select name="type_id" class="form-control">
                                    <option value="0" selected>Không</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $instrument->catalog_id == $type->id ? 'selected' : false }}>
                                            {{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                            <a href="{{ route('quan-ly-san-pham.index') }}" class="btn btn-outline-primary">Quay
                                lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#catalog').change(function() {
                var id = $('#catalog').val();
                if (id == 1) {
                    $('.for-guitar').removeClass('d-none');
                } else {
                    $('.for-guitar').addClass('d-none');
                }
            })
        });
    </script>
@endsection
