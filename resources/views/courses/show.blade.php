@extends('layouts.master')
@section('title')
    {{ $course->name }}
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">Khóa học </h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Khóa
                học <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> {{ $course->name }}</div>
        </div>
    </div>
    <!-- Detail Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative">
                            <h1 class="h1">{{ $course->name }}</h1>
                        </div>
                        <img class="rounded w-100 mb-4" src="{{ asset($course->image) }}" alt="Image">
                        <hr>
                        <div>
                            {!! $course->content !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0 pt-5">
                    <div class="border p-3 mb-3">
                        <div class="font-weight-bold h5 mb-3">
                            <span>Giảng viên:</span><span class="col-md-7">{{ $course->teacher }}</span>
                        </div>
                        {!! $course->description !!}
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold h5 col-5">
                                <span><x-price :price='$course->price' :discount='$course->discount' :to='$course->discount_to' /></span>
                            </div>
                            <div class="col-7"><a
                                    href="{{ route('checkout', ['type' => 'Khóa học', 'id' => $course->id]) }}"
                                    class="btn btn-primary">Đăng ký - Tư vấn</a></div>
                        </div>
                    </div>
                    @if ($course->discount_to > time())
                        <input type="hidden" value="{{ $course->discount_to - time() }}" id="time_discount" />
                        <div class="mt-3 mb-5">
                            <div class="sales border" style="background-image: none">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded">
                                        <span class="h3 text-white" id="days"></span>
                                        <div class="small">Ngày</div>
                                    </div>
                                    <h2 class="h4 ml-1 mr-1">:</h2>
                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded">
                                        <span class="h3 text-white" id="hours"></span>
                                        <div class="small">Giờ</div>
                                    </div>
                                    <h2 class="h4 ml-1 mr-1">:</h2>
                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded">
                                        <span class="h3 text-white" id="minutes"></span>
                                        <div class="small">Phút</div>
                                    </div>
                                    <h2 class="h4 ml-1 mr-1">:</h2>
                                    <div class="text-center col-md-3 w-100 bg-secondary p-2 rounded">
                                        <span class="h3 text-white" id="seconds"></span>
                                        <div class="small">Giây</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <h2 class="mb-3 container">Đề xuất cho bạn</h2>
    <div class="owl-carousel related-carousel position-relative container" style="padding: 0 30px;">
        @foreach ($rel_courses as $course)
            <a class="courses-list-item position-relative d-block overflow-hidden mb-2" href="detail.html">
                <img class="img-fluid" src="{{ asset($course->image) }}" alt="">
                <div class="courses-text">
                    <h4 class="text-center text-white px-3">{{ $course->name }}</h4>
                    <div class="border-top w-100 mt-3">
                        <div class="d-flex justify-content-between p-4">
                            <span class="text-white"><i class="fa fa-user mr-2"></i>{{ $course->teacher }}</span>
                            <span class="text-white"><x-price :price='$course->price' :discount='$course->discount'
                                    :to='$course->discount_to' /></span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <!-- Detail End -->
@endsection
