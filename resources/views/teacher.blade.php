@extends('layouts.master')
@section('title')
    Thông tin giảng viên
@endsection
@section('content')
    <div class="text-center bg-image py-5">
        <h1>Thông tin giảng viên</h1>
    </div>
    @if ($teacher)
        <div class="container-fluid">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="{{ asset($teacher->avatar) }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="h2 font-weight-bold">{{ $teacher->name }}</div>
                        <div>
                            {!! $teacher->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    @endif
    <div class="team-grid">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Đội ngũ giảng viên</h2>
            </div>
            <div class="d-flex flex-wrap people">
                @foreach ($teachers as $teacher)
                    <div class="col-4 item">
                        <div class="box" style="background-image:url({{ asset($teacher->avatar) }})">
                            <div class="cover">
                                <h3 class="name text-white">{{ $teacher->name }}</h3>
                                <div class="text-center">
                                    <a href="{{ route('giang-vien.show', ['name' => $teacher->name]) }}"
                                        class="btn btn-link border rounded mt-2">Xem thông tin</a>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-name text-center">
                            <a href="{{ route('giang-vien.show', ['name' => $teacher->name]) }}">
                                {{ $teacher->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style>
        .btn-link {
            color: #fff;
        }

        .btn-link:hover {
            color: #fff;
        }

        .team-grid {
            color: #313437;
            background-color: #fff;
        }

        .team-grid p {
            color: #7d8285;
        }

        .team-grid h2 {
            font-weight: bold;
            margin-bottom: 40px;
            padding-top: 40px;
            color: inherit;
        }

        @media (max-width:767px) {
            .team-grid h2 {
                margin-bottom: 25px;
                padding-top: 25px;
                font-size: 24px;
            }
        }

        .team-grid .intro {
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        .team-grid .intro p {
            margin-bottom: 0;
        }

        .team-grid .people {
            padding: 50px 0;
        }

        .team-grid .item {
            margin-bottom: 30px;
        }

        .team-grid .item .box {
            text-align: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 280px;
            position: relative;
            overflow: hidden;
        }

        .team-grid .item .cover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(31, 148, 255, 0.75);
            transition: opacity 0.15s ease-in;
            opacity: 0;
            padding-top: 80px;
            color: #fff;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.15);
        }

        .team-grid .item:hover .cover {
            opacity: 1;
        }

        .team-grid .item .name {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .team-grid .item .title {
            text-transform: uppercase;
            font-weight: bold;
            color: #bbd8fb;
            letter-spacing: 2px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .team-grid .social {
            font-size: 18px;
        }

        .team-grid .social a {
            color: inherit;
            margin: 0 10px;
            display: inline-block;
            opacity: 0.7;
        }

        .team-grid .social a:hover {
            opacity: 1;
        }

        .teacher-name {
            display: none;
        }

        @media (max-width:767px) {
            .teacher-name {
                display: block;
            }

            .team-grid .item .box {
                height: 100px;
            }
        }
    </style>
@endsection
