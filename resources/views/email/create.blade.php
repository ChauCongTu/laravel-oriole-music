<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
</head>

<body>
    <div style="text-align: center">
        <img src="https://cdn.discordapp.com/attachments/1100753623849377835/1135389586252636281/cropped-Logo-01.png"
            width="100px">
    </div>
    <div>
        <p>Xin chào <b>{{ $request['name'] }}</b>.</p>
        <p>Tài khoản người dùng của bạn đã được thiết lập thành công. Dưới đây là thông tin đăng nhập của bạn.</p>
        <p>Vui lòng không chia sẻ thông tin này cho bất kỳ ai.</p>
        <p>Trang admin: <a href="{{ route('admin.index') }}">{{ route('admin.index') }}</a></p>
        <p>Địa chỉ email: <b>{{ $request['email'] }}</b></p>
        <p>Mật khẩu: <b>{{ $request['password'] }}</b></p>
        <p>Hãy <b>đăng nhập</b> và tiến hành <b>đổi mật khẩu</b> để đảm bảo tính bảo mật cho tài khoản của bạn!</p>
    </div>
</body>

</html>
