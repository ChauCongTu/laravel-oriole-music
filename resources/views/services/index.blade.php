@extends('layouts.master')
@section('title')
    Các dịch vụ của Oriole Media
@endsection
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">Dịch vụ </h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Dịch vụ</div>
        </div>
    </div>
    <div class="main">
        <div class="h1 bg-image py-5 font-weight-bold text-center">Các dịch vụ của Oriole Media</div>
        <div class="d-flex justify-content-start flex-wrap container">
            @foreach ($services as $service)
                <div class="col-md-4 mt-3">
                    <div class="service shadow">
                        <div class="card card-image">
                            <div class="text-center d-flex justify-content-center align-items-center rgba-black-strong pt-5 px-4">
                                <div class="cqn-relative">
                                    <h5 class="pink-text"> Mã dịch vụ: {{ $service->id }}
                                    </h5>
                                    <h3 class="pt-2">
                                        {{ $service->name }}
                                    </h3>
                                    <div class="border-top mt-3 pt-3">
                                        {!! $service->description !!}
                                    </div>
                                    <div class="service_price d-flex justify-content-between align-items-center border-top py-3">
                                        <div class="price ml-3">Chỉ từ <x-price :price='$service->price' :discount='$service->discount'
                                                :to='$service->discount_to' /></div>
                                        <a href="https://www.facebook.com/messages/t/145493625606952" target="_blank"
                                            class="btn btn-primary mr-3"><i class="zmdi zmdi-phone"></i> Liên hệ ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
