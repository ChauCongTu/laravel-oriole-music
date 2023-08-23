@extends('layouts.master')
@section('title')
    Danh sách sheet nhạc
@endsection
@section('content')
    <!-- Header Start -->
    <div class="main">
        <div class="h1 bg-image py-5 font-weight-bold text-center">Các sheet nhạc được biên soạn bởi Oriole Media</div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="pt-5 border-right">
                        <form action="{{ route('instrument.all') }}" method="get" class="w-100 container">
                            <div class="w-100">
                                <div class="h5 font-weight-bold text-uppercase">Danh mục sản phẩm</div>
                                <div class="mt-3 w-100 border-top pt-3">
                                    <i class="zmdi zmdi-check mr-3"></i><a href="{{ route('instrument.all') }}"
                                        class="link-1 w-100">Tất cả sản phẩm</a>
                                </div>
                                @foreach ($catalogues as $catalogue)
                                    <div class="mt-3 w-100 border-top pt-3">
                                        <i class="zmdi zmdi-check mr-3"></i><a href="{{ route('instrument.all') }}?type={{ $catalogue->slug }}"
                                            class="link-1 w-100">{{ $catalogue->name }}</a>
                                    </div>
                                @endforeach
                                <div class="mt-3 w-100 border-top pt-3">
                                    <i class="zmdi zmdi-check mr-3"></i><a href="{{ route('sheet.index') }}"
                                        class="link-1 w-100">Sheet nhạc</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="pt-5">
                        <div class="bg-light p-3">
                            <div class="h5 d-flex justify-content-between align-items-center">
                                <span class="pb-2 font-weight-bold" style="border-bottom: 5px solid #120F2D">Tìm kiếm</span>
                            </div>
                            <form action="{{ route('sheet.index') }}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nhập tên bài hoặc ca sĩ"
                                        name="s" value="{{ $s }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="zmdi zmdi-search mr-2"></i>Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex flex-wrap mt-3">
                            @forelse ($sheets as $sheet)
                                <div class="col-md-3 col-6">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="{{ route('sheet.show', ['id' => $sheet->id, 'slug' => $sheet->slug]) }}"
                                                class="image">
                                                <img class="pic-1" src="{{ asset($sheet->image) }}">
                                                <img class="pic-2" src="{{ asset($sheet->image) }}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a
                                                    href="{{ route('sheet.show', ['id' => $sheet->id, 'slug' => $sheet->slug]) }}">{{ $sheet->name }}</a>
                                            </h3>
                                            <div class="text-secondary">
                                                <x-price :price='$sheet->price' :discount='$sheet->discount' :to='$sheet->discount_to' />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div style="display: block; margin: auto" class="mt-5">Không có sản phẩm nào phù hợp</div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="container d-flex justify-content-center mt-5">
                    <nav class="pagination-outer" aria-label="Page navigation">
                        {{ $sheets->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.open_filter').click(function() {
                $('.filter').removeClass('d-none');
                $('.open_filter').addClass('d-none');
                $('.close_filter').removeClass('d-none')
            });
            $('.close_filter').click(function() {
                $('.filter').addClass('d-none');
                $('.open_filter').removeClass('d-none');
                $('.close_filter').addClass('d-none')
            });
        });
    </script>
@endsection

@section('styles')
    <style>
        .filter {
            transition: .6s;
        }

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
            height: 240px;
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

        .frb-group {
            margin: 15px 0;
        }

        .frb~.frb {
            margin-top: 15px;
        }

        .frb input[type="radio"]:empty,
        .frb input[type="checkbox"]:empty {
            display: none;
        }

        .frb input[type="radio"]~label:before,
        .frb input[type="checkbox"]~label:before {
            font-family: FontAwesome;
            content: '\f096';
            position: absolute;
            top: 50%;
            margin-top: -11px;
            left: 15px;
            font-size: 22px;
        }

        .frb input[type="radio"]:checked~label:before,
        .frb input[type="checkbox"]:checked~label:before {
            content: '\f046';
        }

        .frb input[type="radio"]~label,
        .frb input[type="checkbox"]~label {
            position: relative;
            cursor: pointer;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        .frb input[type="radio"]~label:focus,
        .frb input[type="radio"]~label:hover,
        .frb input[type="checkbox"]~label:focus,
        .frb input[type="checkbox"]~label:hover {
            box-shadow: 0px 0px 3px #333;
        }

        .frb input[type="radio"]:checked~label,
        .frb input[type="checkbox"]:checked~label {
            color: #fafafa;
        }

        .frb input[type="radio"]:checked~label,
        .frb input[type="checkbox"]:checked~label {
            background-color: #f2f2f2;
        }

        .frb.frb-default input[type="radio"]:checked~label,
        .frb.frb-default input[type="checkbox"]:checked~label {
            color: #333;
        }

        .frb.frb-primary input[type="radio"]:checked~label,
        .frb.frb-primary input[type="checkbox"]:checked~label {
            background-color: #337ab7;
        }

        .frb.frb-success input[type="radio"]:checked~label,
        .frb.frb-success input[type="checkbox"]:checked~label {
            background-color: #5cb85c;
        }

        .frb.frb-info input[type="radio"]:checked~label,
        .frb.frb-info input[type="checkbox"]:checked~label {
            background-color: #5bc0de;
        }

        .frb.frb-warning input[type="radio"]:checked~label,
        .frb.frb-warning input[type="checkbox"]:checked~label {
            background-color: #f0ad4e;
        }

        .frb.frb-danger input[type="radio"]:checked~label,
        .frb.frb-danger input[type="checkbox"]:checked~label {
            background-color: #d9534f;
        }

        .frb input[type="radio"]:empty~label span,
        .frb input[type="checkbox"]:empty~label span {
            display: inline-block;
        }

        .frb input[type="radio"]:empty~label span.frb-title,
        .frb input[type="checkbox"]:empty~label span.frb-title {
            font-size: 16px;
            font-weight: 700;
            margin: 5px 5px 5px 50px;
        }

        .frb input[type="radio"]:empty~label span.frb-description,
        .frb input[type="checkbox"]:empty~label span.frb-description {
            font-weight: normal;
            font-style: italic;
            color: #999;
            margin: 5px 5px 5px 50px;
        }

        .frb input[type="radio"]:empty:checked~label span.frb-description,
        .frb input[type="checkbox"]:empty:checked~label span.frb-description {
            color: #fafafa;
        }

        .frb.frb-default input[type="radio"]:empty:checked~label span.frb-description,
        .frb.frb-default input[type="checkbox"]:empty:checked~label span.frb-description {
            color: #999;
        }
    </style>
@endsection
