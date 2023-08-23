@extends('layouts.admin')
@section('title')
    Thêm người dùng mới
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Thêm người dùng</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-nguoi-dung.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ tên (*):</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email (*):</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại (*):</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu (*):</label>
                            <input type="text" class="form-control" name="password" value="orioleMusic1">
                            @error('password')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            Sau khi tạo người dùng thành công, hệ thống sẽ gửi thông tin cho người dùng này thông qua email được đăng ký.
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tạo người dùng</button>
                            <a href="{{ route('quan-ly-nguoi-dung.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
