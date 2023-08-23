@extends('layouts.master')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- Header Start -->
    <section class="section-slide">
        <div class="item">
            <a href="{{ route('home') }}">
                <div class="banner">
                    <div class="banner-blur"></div>
                    <img src="{{ asset('img/banner.jpg') }}" alt="">
                </div>
                <div class="content text-center">
                    <div class="text-white font-weight-bold display-4 mb-3">Oriole Music Class</div>
                    <div class="h3 text-white font-cqn">Chơi nhạc bằng đam mê theo cách có hiểu biết</div>
                </div>
            </a>
        </div>
        @foreach ($banners as $banner)
            <div class="item">
                <a href="{{ $banner->link }}">
                    <div class="banner">
                        <div class="banner-blur"></div>
                        <img src="{{ asset($banner->image) }}" alt="">
                    </div>
                    <div class="content text-center">
                        <div class="text-white font-weight-bold display-4 mb-3">{{ $banner->title }}</div>
                        <div class="h3 text-white font-cqn">{{ $banner->summary }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </section>

    <div class="container-fluid bg-image" style="margin: 90px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5">
                    <div class="section-title position-relative mb-4">
                        <h1 class="display-4">Tại sao bạn nên bắt đầu với chúng tôi?</h1>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Chất lượng giảng dạy</h4>
                            <p>Nội dung học tập chọn lọc từ các giáo trình âm nhạc uy tín toàn cầu, được truyền đạt bởi các
                                giảng viên có chuyên môn và nghiệp vụ sư phạm đầy đủ. Thời gian dạy học lâu dài tạo cảm giác
                                thoải mái cho học viên.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Giáo trình phù hợp</h4>
                            <p>Cung cấp giáo trình phù hợp với các mục tiêu khác nhau của học viên, bao gồm biểu diễn, đào
                                tạo - giảng dạy, và hòa âm phối khí.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa-solid fa-user-group fa-xl" style="color: #ffffff;"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Môi trường học tập</h4>
                            <p>Phòng học được xây dựng với tiêu chuẩn về mặt âm học, trang thiết bị và phần mềm hiện đại, hỗ
                                trợ tối đa cho quá trình học.</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa-solid fa-message fa-xl" style="color: #ffffff;"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Hỗ trợ sau khóa học</h4>
                            <p class="m-0">Học viên được trân trọng và tiếp tục nhận hỗ trợ sau khóa học, bao gồm giải
                                đáp thắc mắc, tư vấn nội dung và thủ tục cần thiết để phát triển trong con đường nghệ thuật
                                đã chọn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/Why.JPG" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Start -->

    <div class="row mx-0 justify-content-center">
        <div class="col-lg-6">
            <div class="section-title text-center position-relative mb-4">
                <h1 class="d-inline-block position-relative text-secondary pb-2">Chủ đề - Hoạt động</h1>
            </div>
        </div>
    </div>
    <div class="bg-image">
        <div class="container pb-5">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mt-5">
                        <div class="post bg-white">
                            <div style="overflow: hidden">
                                <img class="post-img-top" src="{{ asset($post->image) }}" width="100%" height="184px"
                                    alt="Card image cap">
                            </div>
                            <div class="post-body border p-3">
                                <h5 class="post-title"><a
                                        href="{{ route('post.show', ['id' => $post->id, 'slug' => $post->slug]) }}"
                                        class="">{{ $post->title }}</a></h5>
                                <p class="post-text">
                                    <i class="zmdi zmdi-account"></i> Tác giả: {{ $post->author->name }}<br />
                                    <i class="zmdi zmdi-time"></i> Đăng lúc: {{ $post->posted_time == null ? date('H:i d/m/Y', strtotime($post->created_at)) : date('H:i d/m/Y', $post->posted_at) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses Start -->
    <div class="container-fluid px-0 py-5">
        <div class="row mx-0 justify-content-center pt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative mb-4">
                    <h1 class="d-inline-block position-relative text-secondary pb-2">Các khóa học tại Oriole Media</h1>
                </div>
            </div>
        </div>
        <div class="owl-carousel courses-carousel">
            @foreach ($courses as $course)
                <div class="courses-item position-relative">
                    <img class="" src="{{ $course->image }}" alt="">
                    <div class="courses-text" style="background: none">
                        <div class="w-100 bg-white text-center">
                            <a class="btn btn-primary w-100 py-2"
                                href="{{ route('course.show', ['id' => $course->id, 'slug' => $course->slug]) }}">Xem Chi Tiết</a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="bg-image" style="height: 90px"></div>
        {{-- Sheet nhac --}}
        <div class="row mx-0 justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative">
                    <h1 class="d-inline-block position-relative text-secondary pb-2">Sheet nhạc mới nhất</h1>
                </div>
            </div>
        </div>
        <div>
            <div class="container pb-5">
                <div class="d-flex flex-wrap">
                    @foreach ($sheets as $sheet)
                        <div class="col-md-3 col-6 mt-5">
                            <div class="post bg-white">
                                <div style="overflow: hidden">
                                    <img style="object-fit: cover;" src="{{ asset($sheet->image) }}" width="100%" height="184px"
                                        alt="Card image cap">
                                </div>
                                <div class="post-body border p-3">
                                    <h5 class="post-title"><a
                                            href="{{ route('sheet.show', ['id' => $sheet->id, 'slug' => $sheet->slug]) }}"
                                            class="font-weight-bold">{{ $sheet->name }}</a></h5>
                                    <p class="post-text">
                                        <x-price :price='$sheet->price' :discount='$sheet->discount' :to='$sheet->discount_to' />
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('sheet.index') }}" class="btn btn-primary">Xem tất cả sheet nhạc</a>
                </div>
            </div>
        </div>
        <div class="bg-image" style="height: 90px"></div>
        {{-- San pham --}}
        <div class="row mx-0 justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="section-title text-center position-relative">
                    <h1 class="d-inline-block position-relative text-secondary pb-2">Sản phẩm mới nhất</h1>
                </div>
            </div>
        </div>
        <div>
            <div class="container pb-5">
                <div class="d-flex flex-wrap mt-5">
                    @foreach ($instruments as $instrument)
                        <div class="col-md-3 col-6">
                            <div class="post bg-white">
                                <div style="overflow: hidden">
                                    <img style="object-fit: cover;" src="{{ asset(explode('|', $instrument->image)[0]) }}" width="100%" height="210px"
                                        alt="Card image cap">
                                </div>
                                <div class="post-body border p-3">
                                    <h5 class="post-title"><a
                                            href="{{ route('instrument.show', ['id' => $instrument->id, 'slug' => $instrument->slug]) }}"
                                            class="font-weight-bold">{{ $instrument->name }}</a></h5>
                                    <p class="post-text">
                                        <x-price :price='$instrument->price' :discount='$instrument->discount' :to='$instrument->discount_to' />
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('instrument.all') }}" class="btn btn-primary">Xem tất cả sản phẩm</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center bg-image mx-0 mb-5">
            <div class="col-lg-6 py-5">
                <div class="bg-white p-5 my-5">
                    <h1 class="text-center mb-4">Đăng kí để nhận ngay các ưu đãi hấp dẫn</h1>
                    <form>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Tên của bạn"
                                        style="padding: 30px 20px;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="number" class="form-control bg-light border-0"
                                        placeholder="Số điện thoại" style="padding: 30px 20px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select class="custom-select bg-light border-0 px-3" style="height: 60px;">
                                        <!-- <option selected>Chọn khóa học</option> -->
                                        <option value="1">Hòa âm Piano nhạc nhẹ</option>
                                        <option value="2">Hòa âm Guitar nhạc nhẹ</option>
                                        <option value="3">Hòa âm nhạc nhẹ</option>
                                        <option value="4">Cảm âm</option>
                                        <option value="5">Ký - Xướng âm</option>
                                        <option value="6">Chép nhạc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 60px;">ĐĂNG
                                    KÍ
                                    NGAY</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->
    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/giangvien.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <!-- <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">About Us</h6> -->
                        <h1 class="display-4">Giảng viên hướng dẫn</h1>
                    </div>
                    <p>
                        {{-- Write something --}}
                        Tên: Lê Đỗ Thanh Tuấn.
                    <p>Nghệ danh: Ba Tí Rô.</p>
                    <p>Trình độ: cử nhân Đại học Văn hóa Nghệ thuật Quân đội.</p>
                    <p>Chuyên môn: Piano, Guitar, hòa âm phối khí, Kí - Xướng âm....</p>
                    <p>Kinh nghiệm: Với hơn 10 năm hoạt động trong lĩnh vực âm nhạc và giảng dạy. Có chuyên môn, nghiệp vụ
                        sư phạm đầy đủ.</p>
                    <p>Phong cách làm việc: Vui vẻ, thân thiện, tận tình chia sẻ những kinh nghiệm của bản thân đúc kết
                        trong âm nhạc lẫn cuộc sống.</p>
                    <p>Là chủ nhân của kênh Youtube Oriole Media với câu slogan quen thuộc "Oriole Media - Chơi nhạc bằng
                        đam mê theo cách có hiểu biết". Là một trong những kênh hướng dẫn Guitar đời đầu chắc hẳn không xa
                        lạ gì với các bạn trẻ có niềm đam mê với Guitar.</p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <!-- <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6> -->
                        <h1 class="display-4">Học viên nói gì về chúng tôi</h1>
                    </div>
                    <p class="m-0"></p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($reviews as $review)
                            <div class="review bg-white p-5">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <p>{{ $review->comment }}</p>
                                <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                    <img class="mr-4 rounded-circle" src="{{ asset($review->image) }}" alt="">
                                    <div>
                                        <h5 class="font-weight-bold">{{ $review->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->
    <!-- Contact Start -->
    <div class="container-fluid py-5" id="lien-he">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Địa chỉ</h4>
                                <p class="m-0">311/2/5 Nơ Trang Long, phường 13, quận Bình Thạnh, TP.HCM, Binh
                                    Thanh,
                                    Vietnam</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Liên hệ</h4>
                                <p class="m-0">038 801 8135</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email</h4>
                                <p class="m-0">support@oriole.edu.vn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h1 class="display-5">Hãy liên hệ với chúng tôi</h1>
                    </div>
                    <div class="contact-form">
                        <form action="{{ route('sendContact') }}#lien-he" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text"
                                        class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                        placeholder="Tên của bạn" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email"
                                        class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                        placeholder="Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">* {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0"
                                    placeholder="Số điện thoại" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5"
                                    placeholder="Nhập nội dung bạn cần hỗ trợ" name="content">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">* {{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="send_message w-100 btn-primary py-3 px-5" type="submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
