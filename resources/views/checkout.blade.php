@extends('layouts.master')
@section('title')
    Hướng dẫn thanh toán
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">Hướng dẫn thanh toán </h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Thanh toán</div>
        </div>
    </div>
    <!-- Feature Start -->
    <div class="container-fluid bg-image">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h1 class="display-4">Hướng dẫn thanh toán</h1>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa-solid fa-1 fa-xl">
                                <h1 style="color: #ffffff;">1</h1>
                            </i>
                        </div>
                        <div class="mt-n1">
                            <h4>Chọn 1 trong 2 ngân hàng bên dưới</h4>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa-solid fa-1 fa-xl">
                                <h1 style="color: #ffffff;">2</h1>
                            </i>
                        </div>
                        <div class="mt-n1">
                            <h4>Quét mã QR hoặc nhập STK bên dưới</h4>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa-solid fa-1 fa-xl">
                                <h1 style="color: #ffffff;">3</h1>
                            </i>
                        </div>
                        <div class="mt-n1">
                            <h4>Nội dung chuyển khoản</h4>
                            <p class="m-0">Tên của bạn_Tên khóa học/sheet/dịch vụ</p>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa-solid fa-1 fa-xl">
                                <h1 style="color: #ffffff;">4</h1>
                            </i>
                        </div>
                        <div class="mt-n1">
                            <h4>Chụp màn hình và gửi qua fanpage hoặc zalo: </h4>
                            <p class="m-0">Fanpage: <a href="https://www.facebook.com/messages/t/145493625606952"
                                    class="link-1 font-weight-bold"><i class="zmdi zmdi-facebook-box"></i> Oriole Media</a></p>
                            </p>
                            <p class="m-0">Zalo: <a href="https://zalo.me/0374155521" class="link-1 font-weight-bold">Mr. Mạnh</a></p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <div class="mb-4 text-center">
                            <button class="btn btn-primary btn-lg" id="mb-bank">MB Bank</button>
                            <button class="btn btn-primary btn-lg" id="techcombank">Techcom Bank</button>
                        </div>
                        <img class="position-absolute w-100 mb-bank-img" src="{{ asset('images/mb-bank.jpg') }}"
                            style="object-fit: cover;">
                        <img class="position-absolute w-100 techcombank-img" src="{{ asset('images/techcombank.png') }}"
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#mb-bank').click(function() {
                $('.mb-bank-img').css('display', 'block');
                $('.techcombank-img').css('display', 'none');
            });
            $('#techcombank').click(function() {
                $('.mb-bank-img').css('display', 'none');
                $('.techcombank-img').css('display', 'block');
            });
        });
    </script>
@endsection
