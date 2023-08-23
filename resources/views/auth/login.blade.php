<!doctype html>
<html lang="en">

<head>
    <title>Đăng nhập quản trị | Oriole</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="shadow-lg my-5 col-md-4 rounded-lg">
                <div class="logo p-3 h2 text-danger text-center border-bottom border-3">Admin Panel</div>
                <div class="main p-3">
                    @if (\Session::has('authErr'))
                        <div class="alert alert-danger">{!! \Session::get('authErr') !!}</div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Địa chỉ email ..."
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu ..."
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">* {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger btn-sm px-4">SIGN IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
</body>

</html>
