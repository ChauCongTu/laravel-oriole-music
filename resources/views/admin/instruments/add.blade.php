@extends('layouts.admin')
@section('title')
    Thêm sản phẩm mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm sản phẩm</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-san-pham.store') }}" method="post" enctype="multipart/form-data">
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
                            <label for="price">Loại (*):</label>
                            <select name="catalog_id" id="catalog" class="form-control">
                                <option value="">-- Chọn loại sản phẩm --</option>
                                @foreach ($catalogues as $catalogue)
                                    <option value="{{ $catalogue->id }}">{{ $catalogue->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Thương hiệu (*):</label>
                            <select name="brand_id" class="form-control">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="for-guitar d-none">
                            <div class="form-group">
                                <label for="price">Kiểu dáng đàn:</label>
                                <select name="design_id" class="form-control">
                                    <option value="0" selected>Không</option>
                                    @foreach ($designs as $design)
                                        <option value="{{ $design->id }}">{{ $design->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Loại đàn:</label>
                                <select name="type_id" class="form-control">
                                    <option value="0" selected>Không</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <a href="{{ route('quan-ly-san-pham.index') }}" class="btn btn-outline-primary">Quay lại</a>
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
            }
            else {
                $('.for-guitar').addClass('d-none');
            }
        })
    });
</script>
@endsection
