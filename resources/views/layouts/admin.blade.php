<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bảng điều khiển">
    <meta name="author" content="ChauCongTu">
    <link rel="canonical" href="https://oriole.edu.vn/" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Trang chủ - Oriole Music Class" />
    <meta property="og:url" content="https://oriole.edu.vn/" />
    <meta property="og:site_name" content="Oriole Music Class" />
    <meta property="article:modified_time" content="2021-05-24T16:48:03+00:00" />
    <meta property="og:image" content="http://oriole.edu.vn/wp-content/uploads/2018/03/LINE-NGANG-VANG-300x21.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Ước tính thời gian đọc">
    <meta name="twitter:data1" content="9 phút">
    <link rel="icon" href="{{ asset('img/logo.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('images/icon-primary-200.png') }}" sizes="192x192" />

    <title> @yield('title') - Oriole Admin</title>

    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    @yield('styles')
</head>

<body>
    <div class="page-wrapper">
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="{{ route('admin.index') }}" class="fw-bold">
                            <h3>
                                <img src="{{ asset('img/logo.png') }}" width="45px" alt="CoolAdmin" />
                                Oriole Media
                            </h3>
                        </a>
                    </div>
                    <div class="header__tool">
                        <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>Bạn nhận được 1 thông báo mới</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        <p>Chào mừng bạn đến với trang quản trị Oriole</p>
                                        <span class="date">{{ date('H:i d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="https://cdn.discordapp.com/attachments/1100753623849377835/1134828935172063293/user-png-33832.png"
                                        width="30px" alt="{{ Auth::user()->name }}" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="https://cdn.discordapp.com/attachments/1100753623849377835/1134828935172063293/user-png-33832.png"
                                                    width="40px" alt="{{ Auth::user()->name }}" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ Auth::user()->name }}</a>
                                            </h5>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Tài khoản
                                            </a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="{{ route('quan-ly-nguoi-dung.changePassword') }}">
                                                <i class="zmdi zmdi-settings"></i>Đổi mật khẩu
                                            </a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ route('logout') }}">
                                            <i class="zmdi zmdi-power mr-2"></i> Đăng xuất
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-container3">
            @if (\Session::has('success'))
                <section class="alert-wrap p-t-50">
                    <div class="container">
                        <div class="alert au-alert-success alert-dismissible fade show au-alert-success au-alert--70per"
                            role="alert">
                            <i class="zmdi zmdi-check-circle"></i>
                            <span class="content">{{ \Session::get('success') }}</span>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close-circle"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </section>
            @endif
            @if (\Session::has('error'))
                <section class="alert-wrap p-t-50">
                    <div class="container">
                        <div class="alert au-alert-error alert-dismissible fade show au-alert--70per"
                            style=" background-color: #fce9e9;" role="alert">
                            <i class="zmdi zmdi-close-circle-o"></i>
                            <span class="content">{{ \Session::get('error') }}</span>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="zmdi zmdi-close-circle"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </section>
            @endif
            <section>
                <div class="container p-t-50">
                    <div class="row">
                        <div class="col-xl-3">
                            <aside class="menu-sidebar3 js-spe-sidebar bg-white">
                                <nav class="navbar-sidebar2 navbar-sidebar3">
                                    <ul class="list-unstyled navbar__list">
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('admin.index') }}">
                                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('quan-ly-bai-viet.index') }}">
                                                <i class="zmdi zmdi-file"></i>Quản lý bài viết</a>
                                        </li>
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('quan-ly-danh-muc.index') }}">
                                                <i class="zmdi zmdi-collection-item"></i>Quản lý danh mục</a>
                                        </li>
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('quan-ly-banner.index') }}">
                                                <i class="zmdi zmdi-collection-folder-image"></i>Quản lý banner</a>
                                        </li>
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('quan-ly-khoa-hoc.index') }}">
                                                <i class="zmdi zmdi-graduation-cap"></i>Quản lý khóa học</a>
                                        </li>
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('quan-ly-dich-vu.index') }}">
                                                <i class="zmdi zmdi-dns"></i>Quản lý dịch vụ</a>
                                        </li>
                                        <li class="nav-item-n border-bottom">
                                            <a href="{{ route('quan-ly-sheet-nhac.index') }}">
                                                <i class="zmdi zmdi-collection-music"></i>Quản lý sheets nhạc</a>
                                        </li>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-outline-danger my-2 text-center" id="show-lv-2"
                                                style="z-index: 10; border-radius: 20px">
                                                Xem thêm chức năng
                                                <i class="zmdi zmdi-chevron-down"></i>
                                            </button>
                                        </div>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-loai-san-pham.index') }}">
                                                <i class="zmdi zmdi-collection-bookmark"></i>Quản lý danh mục SP</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-thuong-hieu.index') }}">
                                                <i class="zmdi zmdi-bookmark"></i>Quản lý thương hiệu</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-kieu-dan.index') }}">
                                                <i class="zmdi zmdi-widgets"></i>Quản lý kiểu dáng đàn</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-loai-dan.index') }}">
                                                <i class="zmdi zmdi-store-24"></i>Quản lý loại đàn</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-san-pham.index') }}">
                                                <i class="zmdi zmdi-mall"></i>Quản lý sản phẩm</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-danh-gia.index') }}">
                                                <i class="zmdi zmdi-star"></i>Quản lý đánh giá</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-nguoi-dung.index') }}">
                                                <i class="zmdi zmdi-account"></i>Quản lý người dùng</a>
                                        </li>
                                        <li class="nav-item-n border-bottom lv-2 d-none">
                                            <a href="{{ route('quan-ly-giang-vien.index') }}">
                                                <i class="zmdi zmdi-account-o"></i>Quản lý giảng viên</a>
                                        </li>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-outline-danger my-2 text-center d-none"
                                                id="hide-lv-2" style="z-index: 10; border-radius: 20px">
                                                Ẩn bớt chức năng
                                                <i class="zmdi zmdi-chevron-up"></i>
                                            </button>
                                        </div>
                                    </ul>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9">
                            <div class="page-content">
                                @yield('content')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Copyright © {{ date('Y') }} <b>Oriole</b>. All rights reserved.
                                                Template by <a href="https://colorlib.com">Colorlib</a>.
                                            </p>
                                            <p>Dev by <a href="https://chaucongtu.site" target="_blank">NhonCQ</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#show-lv-2').click(function() {
                $('#show-lv-2').addClass('d-none');
                $('.lv-2').removeClass('d-none');
                $('#hide-lv-2').removeClass('d-none');
            });
            $('#hide-lv-2').click(function() {
                $('#hide-lv-2').addClass('d-none');
                $('.lv-2').addClass('d-none');
                $('#show-lv-2').removeClass('d-none');
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
<!-- end document-->
