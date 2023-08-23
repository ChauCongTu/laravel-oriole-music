@extends('layouts.master')
@section('title')
    {{ $instrument->name }}
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">Sản phẩm </h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Khóa
                học <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> {{ $instrument->name }}
            </div>
        </div>
    </div>
    <!-- Detail Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title">
                            <div class="row pb-5">
                                <div class="col-md-5 pr-2">
                                    <div class="card">
                                        <div class="demo">
                                            <ul id="lightSlider">
                                                @foreach ($instrument->image as $image)
                                                    <li data-thumb="{{ asset($image) }}">
                                                        <a href="{{ asset($image) }}" target="_blank">
                                                            <img src="{{ asset($image) }}" class="img" />
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h3 class="mt-3">{{ $instrument->name }}</h3>
                                    <div class="d-flex  align-items-center">
                                        <div class="mr-3">
                                            <div class="mt-3 h5"><x-price :price='$instrument->price' :discount='$instrument->discount'
                                                    :to='$instrument->discount_to' />
                                            </div>
                                        </div>
                                        @if ($instrument->discount_to > time())
                                            <input type="hidden" value="{{ $instrument->discount_to - time() }}"
                                                id="time_discount" />
                                            <div class="descrease">
                                                Giảm {{ ceil(($instrument->discount/$instrument->price)*100) }}%
                                            </div>
                                        @endif
                                    </div>
                                    @if ($instrument->discount_to > time())
                                        <div class="mt-3">
                                            <div class="sales">
                                                <div class="text-center mt-2">
                                                    <div class="h4 text-white">KHUYẾN MÃI SẼ KẾT THÚC TRONG</div>
                                                </div>
                                                <div class="d-flex justify-content-center mt-2">
                                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded mr-3">
                                                        <span class="h3 text-white" id="days"></span>
                                                        <div class="small">Ngày</div>
                                                    </div>
                                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded mr-3">
                                                        <span class="h3 text-white" id="hours"></span>
                                                        <div class="small">Giờ</div>
                                                    </div>
                                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded mr-3">
                                                        <span class="h3 text-white" id="minutes"></span>
                                                        <div class="small">Phút</div>
                                                    </div>
                                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded">
                                                        <span class="h3 text-white" id="seconds"></span>
                                                        <div class="small">Giây</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mt-3 d-flex">
                                        <a href="{{ route('checkout', ['type' => 'Sản phẩm', 'id' => $instrument->id]) }}"
                                            class="btn btn-danger p-2 w-50 border-right"><i class="zmdi zmdi-shopping-cart"></i> Đặt mua</a>
                                        <a href="https://zalo.me/0374155521" class="btn btn-outline-danger p-2 w-50 border-left"
                                            target="_blank"><i class="zmdi zmdi-phone"></i> Liên hệ tư vấn</a>
                                    </div>
                                    <div class="border border-danger mt-5 rounded position-relative">
                                        <div class="position-absolute p-title bg-danger text-white py-1 px-2 rounded h5">SẢN PHẨM CỦA ORIOLE MEDIA</div>
                                        <div class="px-3 mt-4 pt-1">
                                            <p><i class="zmdi zmdi-check-circle text-success mr-2"></i> Sản phẩm chính hãng,
                                                đảm bảo chất lượng</p>
                                            <p><i class="zmdi zmdi-check-circle text-success mr-2"></i> Bảo hành dài hạn, hỗ
                                                trợ khách hàng tận tâm</p>
                                            <p><i class="zmdi zmdi-check-circle text-success mr-2"></i> Tư vấn chuyên
                                                nghiệp, giúp bạn chọn sản phẩm phù hợp.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-5"></div>
                        <hr />
                        <div>
                            {!! $instrument->description !!}
                        </div>
                    </div>

                    <h2 class="mb-3">Đề xuất cho bạn</h2>
                    <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                        @foreach ($lastests as $instrument)
                            <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                                href="{{ route('instrument.show', ['id' => $instrument->id, 'slug' => $instrument->slug]) }}">
                                <img class="img-fluid" src="{{ asset(explode('|', $instrument->image)[0]) }}" alt="">
                                <div class="courses-text">
                                    <h4 class="text-center text-white px-3">{{ $instrument->name }}</h4>
                                    <div class="border-top w-100 mt-3">
                                        <div class="d-flex justify-content-between p-4">
                                            <span class="text-white"><x-price :price='$instrument->price' :discount='$instrument->discount'
                                                    :to='$instrument->discount_to' /></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="border p-3 mb-3">
                        <div class="font-weight-bold h3 mb-3">
                            Sản phẩm cùng loại
                        </div>
                        @foreach ($rel_instruments as $instrument)
                            <div class="item border-top py-3">
                                <div class="d-flex">
                                    <div class="">
                                        <img src="{{ asset(explode('|', $instrument->image)[0]) }}" width="45px" alt="">
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('instrument.show', ['id' => $instrument->id, 'slug' => $instrument->slug]) }}"
                                            class="link-1 font-weight-bold">{{ $instrument->name }}</a>
                                        <x-price :price='$instrument->price' :discount='$instrument->discount' :to='$instrument->discount_to' />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
@section('scripts')
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
    <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
    <script>
        $('#lightSlider').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            slideMargin: 0,
            thumbItem: 6
        });
    </script>
    <script>
        $(document).ready(function() {
            var totalSeconds = $('#time_discount').val();
            var counterElement = document.getElementById("counter");

            function updateCounter() {
                var days = Math.floor(totalSeconds / (24 * 3600));
                var hours = Math.floor((totalSeconds % (24 * 3600)) / 3600);
                var minutes = Math.floor((totalSeconds % 3600) / 60);
                var seconds = Math.floor(totalSeconds % 60);

                $('#days').text(days.toString().padStart(2, '0'));
                $('#hours').text(hours.toString().padStart(2, '0'));
                $('#minutes').text(minutes.toString().padStart(2, '0'));
                $('#seconds').text(seconds.toString().padStart(2, '0'));
            }
            // Cập nhật giá trị ban đầu
            updateCounter();
            // Bắt đầu đếm ngược
            var countDown = setInterval(function() {
                totalSeconds--;
                if (totalSeconds < 0) {
                    clearInterval(countDown);
                } else {
                    updateCounter();
                }
            }, 1000);
        });
    </script>
@endsection
@section('styles')
    <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

        .card {
            background-color: #fff;
            padding: 14px;
            border: none
        }

        .demo {
            width: 100%
        }

        ul {
            list-style: none outside none;
            padding-left: 0;
            margin-bottom: 0
        }

        li {
            display: block;
            float: left;
            margin-right: 6px;
            cursor: pointer
        }

        .img {
            display: block;
            height: auto;
            width: 100%
        }

        .stars i {
            color: #f6d151
        }

        .stars span {
            font-size: 13px
        }

        hr {
            color: #d4d4d4
        }

        .badge {
            padding: 5px !important;
            padding-bottom: 6px !important
        }

        .badge i {
            font-size: 10px
        }

        .profile-image {
            width: 35px
        }

        .comment-ratings i {
            font-size: 13px
        }

        .username {
            font-size: 12px
        }

        .comment-profile {
            line-height: 17px
        }

        .date span {
            font-size: 12px
        }

        .p-ratings i {
            color: #f6d151;
            font-size: 12px
        }

        .btn-long {
            padding-left: 35px;
            padding-right: 35px
        }

        .buttons {
            margin-top: 15px
        }

        .buttons .btn {
            height: 46px
        }

        .buttons .cart {
            border-color: #ff7676;
            color: #ff7676
        }

        .buttons .cart:hover {
            background-color: #e86464 !important;
            color: #fff
        }

        .buttons .buy {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676
        }

        .buttons .buy:focus,
        .buy:active {
            color: #fff;
            background-color: #ff7676;
            border-color: #ff7676;
            box-shadow: none
        }

        .buttons .buy:hover {
            color: #fff;
            background-color: #e86464;
            border-color: #e86464
        }

        .buttons .wishlist {
            background-color: #fff;
            border-color: #ff7676
        }

        .buttons .wishlist:hover {
            background-color: #e86464;
            border-color: #e86464;
            color: #fff
        }

        .buttons .wishlist:hover i {
            color: #fff
        }

        .buttons .wishlist i {
            color: #ff7676
        }

        .comment-ratings i {
            color: #f6d151
        }

        .followers {
            font-size: 9px;
            color: #d6d4d4
        }

        .store-image {
            width: 42px
        }

        .dot {
            height: 10px;
            width: 10px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px
        }

        .bullet-text {
            font-size: 12px
        }

        .my-color {
            margin-top: 10px;
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            border: 2px solid #8f37aa;
            display: inline-block;
            color: #8f37aa;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            text-transform: uppercase;
            transition: 0.5s all
        }

        label.radio .red {
            background-color: red;
            border-color: red
        }

        label.radio .blue {
            background-color: blue;
            border-color: blue
        }

        label.radio .green {
            background-color: green;
            border-color: green
        }

        label.radio .orange {
            background-color: orange;
            border-color: orange
        }

        label.radio input:checked+span {
            color: #fff;
            position: relative
        }

        label.radio input:checked+span::before {
            opacity: 1;
            content: '\2713';
            position: absolute;
            font-size: 13px;
            font-weight: bold;
            left: 4px
        }

        .card-body {
            padding: 0.3rem 0.3rem 0.2rem
        }

        @media only screen and (max-width: 768px) {
            .col-md-7 {
                margin-top: 200px;
            }
        }
    </style>
@endsection
