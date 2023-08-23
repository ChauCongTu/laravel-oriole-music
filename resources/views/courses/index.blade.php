@extends('layouts.master')
@section('title')
    Các khóa học của Oriole Media
@endsection
@section('content')
    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">Khóa học </h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Khóa
                học</div>
        </div>
    </div>
    <div class="main">
        <div class="h1 bg-image py-5 font-weight-bold text-center">Tất cả khóa học của Oriole Media</div>
        <div class="d-flex justify-content-start flex-wrap container">
            @foreach ($courses as $course)
                <div class="col-md-4 mt-3">
                    <div class="course shadow">
                        <div class="card card-image">
                            <div class="text-center d-flex align-items-center justify-content-center rgba-black-strong pt-5 px-4 course-card">
                                <div>
                                    <h5 class="pink-text"><i class="fas fa-chart-pie"></i> Giáo viên: {{ $course->teacher }}
                                    </h5>
                                    <h3 class="pt-2">
                                        {{ $course->name }}
                                    </h3>
                                    <hr>
                                    <div class="course-desc mt-3 pt-3">
                                        {!! $course->description !!}
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center border-top py-3">
                                        <div class="price"><x-price :price='$course->price' :discount='$course->discount'
                                                :to='$course->discount_to' /></div>
                                        <a href="{{ route('course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"
                                            class="btn btn-primary"><i class="fas fa-clone left"></i> Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container d-flex justify-content-center mt-5">
            {{ $courses->links() }}
        </div>
    </div>
@endsection
