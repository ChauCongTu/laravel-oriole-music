<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Oriole Media">
    <meta name="author" content="ChauCongTu">
    <link rel="canonical" href="https://oriole.edu.vn/" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Oriole Media" />
    <meta property="og:url" content="https://oriole.edu.vn/" />
    <meta property="og:site_name" content="Oriole Media" />
    <meta property="article:modified_time" content="2021-05-24T16:48:03+00:00" />
    <meta property="og:image" content="{{ asset('images/icon-primary-200.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Ước tính thời gian đọc">
    <meta name="twitter:data1" content="9 phút">
    <link rel="icon" href="{{ asset('img/logo.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('images/icon-primary-200.png') }}" sizes="192x192" />

    <title> @yield('title') - Oriole Media</title>

    <!-- Google Web Fonts -->

    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>038 801 8135</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>support@oriole.edu.vn</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="https://www.facebook.com/OrioleMusicClass">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Start -->
    <header class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <h3 class="m-0 text-primary">
                        <img class="icon-primary" src="{{ asset('images/icon-primary (1).png') }}"
                            alt=""></i>Oriole
                        Media
                    </h3>
                </a>
            </div>
            <nav class="navbar desktop-nav">
                <a href="{{ route('home') }}" class="nav-item nav-link">Trang Chủ</a>
                <a href="{{ route('course.index') }}" class="nav-item nav-link">Khóa học</a>
                <a href="{{ route('service.index') }}" class="nav-item nav-link">Dịch vụ</a>
                <a href="{{ route('giang-vien.show') }}" class="nav-item nav-link">Giảng viên</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
                    <div class="dropdown-menu m-0">
                        @foreach ($catalogues as $catalogue)
                            <a href="{{ route('instrument.all') }}?type={{ $catalogue->slug }}"
                                class="dropdown-item">{{ $catalogue->name }}</a>
                        @endforeach
                        <a href="{{ route('sheet.index') }}" class="dropdown-item">Sheet nhạc</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="/" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                    <div class="dropdown-menu m-0">
                        @foreach ($categories as $category)
                            <a href="{{ route('category.index', ['slug' => $category->slug]) }}"
                                class="dropdown-item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
                <a data-toggle="modal" style="cursor: pointer" data-target="#search"
                    class="nav-item nav-link active">Tìm kiếm</a>
                <!-- The Modal -->
                <div class="modal fade" id="search">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('search') }}" method="get">
                                <div class="modal-header">
                                    <h4 class="modal-title"><i class="zmdi zmdi-search"></i>
                                        Tìm kiếm</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="key" class="form-control"
                                            placeholder="Nhập từ khóa ...">
                                    </div>
                                    <div class="form-group">
                                        <select name="type" class="form-control">
                                            <option value="courses">Khóa học</option>
                                            <option value="instruments">Sản phẩm</option>
                                            <option value="services">Dịch vụ</option>
                                            <option value="posts">Bài viết</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-danger">Tìm
                                        kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <button id="openMenu"><i class="zmdi zmdi-menu"></i></button>
        </div>
    </header>
    <div class="blur"></div>
    <nav class="mobile-nav">
        <div class="logo">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h3 class="m-0 text-uppercase text-primary"><img class="icon-primary"
                        src="{{ asset('images/icon-primary (1).png') }}" alt=""></i>Oriole
                    Media</h3>
            </a>
        </div>
        <a href="{{ route('home') }}" class="nav-item nav-link">Trang Chủ</a>
        <a href="{{ route('course.index') }}" class="nav-item nav-link">Khóa học</a>
        <a href="{{ route('service.index') }}" class="nav-link nav-link">Dịch vụ</a>
        <a href="{{ route('giang-vien.show') }}" class="nav-item nav-link">Giảng viên</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sản phẩm</a>
            <div class="dropdown-menu m-0">
                @foreach ($catalogues as $catalogue)
                    <a href="{{ route('instrument.all') }}?type={{ $catalogue->slug }}"
                        class="dropdown-item">{{ $catalogue->name }}</a>
                @endforeach
                <a href="{{ route('sheet.index') }}" class="dropdown-item">Sheet nhạc</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="/" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
            <div class="dropdown-menu m-0">
                @foreach ($categories as $category)
                    <a href="{{ route('category.index', ['slug' => $category->slug]) }}"
                        class="dropdown-item">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <a data-toggle="modal" style="cursor: pointer" data-target="#search-mobile" class="nav-item nav-link active"
            style="z-index: 20000">Tìm
            kiếm</a>
        <!-- The Modal -->
        <div class="modal fade" id="search-mobile">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('search') }}" method="get">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="zmdi zmdi-search"></i>
                                Tìm kiếm</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="key" class="form-control"
                                    placeholder="Nhập từ khóa ...">
                            </div>
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="courses">Khóa học</option>
                                    <option value="instruments">Sản phẩm</option>
                                    <option value="services">Dịch vụ</option>
                                    <option value="posts">Bài viết</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Tìm
                                kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @if (\Session::has('success'))
        <div id="msg">
            <div class="noti d-flex justify-content-center align-items-center bg-success p-3">
                <div class="text">
                    {!! \Session::get('success') !!}
                </div>
                <div class="button ml-5">
                    <button id="closeNoti">X</button>
                </div>
            </div>
        </div>
    @endif
    @if (\Session::has('error'))
        <div id="msg">
            <div class="noti d-flex justify-content-center align-items-center bg-danger p-3">
                <div class="text">
                    {!! \Session::get('error') !!}
                </div>
                <div class="button ml-5">
                    <button id="closeNoti">X</button>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><img class="icon-primary" src="img/icon-white.png"
                                alt=""></i>ORIOLE MEDIA</h1>
                    </a>
                    <p class="m-0">Chơi nhạc bằng đam mê theo cách có hiểu biết.</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Đăng kí nhận tin</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;"
                                placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Đăng kí</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Hãy đến với chúng tôi</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i><a href="https://goo.gl/maps/fxwkmzJWTLYSJuzJ8"
                            class="text-white-50 mb-2" target="_blank">311/2/5 Nơ Trang Long, phường 13, quận Bình
                            Thạnh,
                            TP.HCM, Binh Thanh, Vietnam</a></p>
                    <p><i class="fa fa-phone mr-2"></i>038 801 8135</p>
                    <p><i class="fa fa-envelope mr-2"></i>support@oriole.edu.vn</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Các khóa học</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Piano đệm
                            hát</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guitar đệm
                            hát</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Kí xướng
                            âm</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Hòa âm
                            nhạc nhẹ</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Cảm âm</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Dịch vụ</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Hòa âm
                            phối khí</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Thu âm
                            vocal</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Thu âm
                            nhạc cụ</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Chép
                            nhạc</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>TVC</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Bản quyền thuộc về &copy; <a class="text-white font-weight-bold"
                            href="{{ route('home') }}">Oriole Media</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Theme by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <div class="zalo-parent"> </div>
    <a href="https://zalo.me/0374155521" target="_blank" class="zalo">
        Zalo
    </a>
    <div class="hotline-scale-1"> </div>
    <div class="hotline-scale-2"> </div>
    <div class="hotline-a">
        <a href="tel:0388018135" target="_blank" class="hotline">
            <i class="zmdi zmdi-phone"></i>
        </a>
        <div class="info-hotline">
            <a href="tel:0388018135" target="_blank">Hotline: 0388.018.135</a>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>
    {{-- Live chat Facebook Messenger --}}
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <div id="fb-customer-chat" class="fb-customerchat"> </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "145493625606952");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>
