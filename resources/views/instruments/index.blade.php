@extends('layouts.master')
@section('title')
    Danh sách {{ $catalogue->name }}
@endsection
@section('content')
    <!-- Header Start -->
    <div class="main">
        <div class="h1 bg-image py-5 font-weight-bold text-center">Các sản phẩm chất lượng đến từ Oriole Media</div>
        <div class="bg-light py-3 d-flex justify-content-center">
            <form action="{{ route('instrument.index', ['slug' => $catalogue->slug]) }}" method="get" class="">
                <div class="d-flex w-100">
                    <div class="w-100 mr-3">
                        <select name="filter" class="filter form-control mr-3">
                            <option value="brand" selected>Lọc theo thương hiệu</option>
                            @if ($catalogue->id == 1)
                                <option value="design">Lọc theo kiểu dáng đàn</option>
                                <option value="type">Lọc theo loại đàn</option>
                            @endif
                        </select>
                    </div>
                    <div class="brand w-100">
                        <select name="brand" class="form-control mr-3">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="design col-xs-5 d-none">
                        <select name="design" class="form-control mr-3">
                            @foreach ($designs as $design)
                                <option value="{{ $design->id }}">{{ $design->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="type col-xs-5 d-none">
                        <select name="type" class="form-control mr-3">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Lọc</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row">
                @forelse ($instruments as $instrument)
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid">
                            <div class="product-image">
                                <a href="{{ route('instrument.show', ['id' => $instrument->id, 'slug' => $instrument->slug]) }}"
                                    class="image">
                                    <img class="pic-1" src="{{ asset(explode('|', $instrument->image)[0]) }}">
                                    <img class="pic-2"
                                        src="{{ isset(explode('|', $instrument->image)[1]) ? asset(explode('|', $instrument->image)[1]) : asset(explode('|', $instrument->image)[0]) }}">
                                </a>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a
                                        href="{{ route('instrument.show', ['id' => $instrument->id, 'slug' => $instrument->slug]) }}">{{ $instrument->name }}</a>
                                </h3>
                                <div class="text-secondary">
                                    <x-price :price='$instrument->price' :discount='$instrument->discount' :to='$instrument->discount_to' />
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="display: block; margin: auto" class="mt-5">Không có sản phẩm nào phù hợp</div>
                @endforelse
            </div>
        </div>
        <div class="container d-flex justify-content-center mt-5">
            {{ $instruments->links() }}
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.filter').change(function() {
                $('.brand').addClass('d-none');
                $('.type').addClass('d-none');
                $('.design').addClass('d-none');
                $('.' + $('.filter').val()).removeClass('d-none');
            });
        });
    </script>
@endsection

@section('styles')
    <style>
        .product-grid {
            margin-top: 20px;
            background-color: #fff;
            font-family: 'Work Sans', sans-serif;
            text-align: center;
            transition: all 0.3s ease 0s;
        }

        .product-grid:hover {
            box-shadow: 0 0 20px -10px rgba(237, 29, 36, 0.3);
        }

        .product-grid .product-image {
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease 0s;
            object-fit: cover;
        }

        .product-grid:hover .product-image {
            border-radius: 0 0 30px 30px;
        }

        .product-grid .product-image a.image {
            display: block;
        }

        .product-grid .product-image img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
        }

        .product-image .pic-1 {
            backface-visibility: hidden;
            transition: all 0.5s ease 0s;
        }

        .product-grid:hover .product-image .pic-1 {
            opacity: 0;
        }

        .product-image .pic-2 {
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            transition: all 0.5s ease 0s;
        }

        .product-grid:hover .product-image .pic-2 {
            opacity: 1;
        }

        .product-grid .product-content {
            text-align: left;
            padding: 15px 10px;
        }


        .product-grid .rating li {
            color: #f7bc3d;
            font-size: 13px;
        }

        .product-grid .rating li.far {
            color: #777;
        }

        .product-grid .title {
            font-size: 16px;
            font-weight: 600;
            text-transform: capitalize;
            margin: 0 0 6px;
        }

        .product-grid .title a {
            color: #555;
            transition: all 0.3s ease 0s;
        }

        .product-grid .title a:hover {
            color: #ed1d24;
        }

        @media screen and (max-width:990px) {
            .product-grid {
                margin: 0 0 30px;
            }
        }
    </style>
@endsection
