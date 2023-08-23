<!DOCTYPE html>
<html>

<head>
    <title>Reset Password Email</title>
</head>

<body>
    <div style="text-align: center">
        <img src="https://cdn.discordapp.com/attachments/1100753623849377835/1135389586252636281/cropped-Logo-01.png"
            width="100px">
    </div>
    <div>
        <p>Xin chào <b>{{ $user->name }}</b></p>
        <p>Quản trị viên của <b>Oriole</b> vừa yêu cầu khôi phục mật khẩu khẩu của bạn.</p>
        <p>Mật khẩu mới của bạn là: <b>{{ $new_password }}</b></p>
        <p>Hãy đăng nhập và tiến hành đổi mật khẩu để đảm bảo tính bảo mật cho tài khoản của bạn</p>
    </div>
</body>

</html>
