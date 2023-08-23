<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $url = session()->get('url', '/admin');
        session()->put('returnUrl', $url);
        return view('auth.login');
    }
    public function handleLogin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'Vui lòng nhập địa chỉ email',
                'email.email' => 'Địa chỉ email không hợp lệ',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]
        );
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect(session()->get('returnUrl'));
            } else {
                return back()->with('authErr', 'Mật khẩu không chính xác!');
            }
        } else {
            return back()->with('authErr', 'Địa chỉ email không tồn tại!');
        }
    }
}
