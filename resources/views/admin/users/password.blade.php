@extends('layouts.admin')
@section('title')
    Đổi mật khẩu
@endsection
@section('content')
    <section class="bg-white p-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-3 m-b-35 m-t-35">Đổi mật khẩu</h3>
                <div class="mt-3">
                    <form action="{{ route('quan-ly-nguoi-dung.changePassword') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Mật khẩu cũ (*):</label>
                            <input type="password" class="password form-control" name="old_password"
                                value="{{ old('old_password') }}">
                            @error('old_password')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Mật khẩu mới (*):</label>
                            <input type="password" class="password form-control" name="password"
                                value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Nhập lại mật khẩu mới (*):</label>
                            <input type="password" class="password form-control" name="confirm_password"
                                value="{{ old('confirm_password') }}">
                            @error('confirm_password')
                                <div class="text-danger">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="checkbox" onchange="tick(this)" /> Hiện mật khẩu
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            <a href="{{ route('quan-ly-nguoi-dung.index') }}" class="btn btn-outline-primary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function tick(el) {
            $('.password').attr('type', el.checked ? 'text' : 'password');
        }
    </script>
@endsection
