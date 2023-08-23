<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $users = User::paginate(10);
        else
            $users = User::where('title', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.users.index', compact('searchString', 'users'));
    }

    public function resetPassword(int $id)
    {
        $user = User::find($id);
        $new_password = strtoupper(Str::random(10));
        $user->password = Hash::make($new_password);
        $user->save();
        Mail::send('email.resetPassword', ['user' => $user, 'new_password' => $new_password], function ($message) use ($user) {
            $message->from('no-reply@oriole.edu.vn', 'Quản trị viên Oriole');
            $message->to($user->email);
            $message->subject('Yêu cầu lấy lại mật khẩu từ Oriole');
        });
        return back()->with('success', 'Yêu cầu lấy lại mật khẩu thành công! Mật khẩu mới sẽ được gửi đến email ' . $user->email);
    }
    public function setRole(int $id, Request $request)
    {
        User::where('id', $id)->update($request->only('role'));
        return back()->with('success', 'Phân quyền cho người dùng thành công');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email' => 'Địa chỉ email không đúng định dạng',
            'unique' => 'Địa chỉ email đã tồn tại',
            'numeric' => 'Số điện thoại chỉ được nhập số',
            'min' => 'Mật khẩu phải có ít nhất 6 kí tự'
        ]);
         $user = $request->except('_token');
        $user['password'] = Hash::make($request->password);
        User::create($user);
        Mail::send('email.create', ['request' => $request->except('_token')], function ($message) use ($request) {
            $message->from('no-reply@oriole.edu.vn', 'Oriole Music');
            $message->to($request->email);
            $message->subject('Chào mừng bạn trở thành quản trị viên của Oriole');
        });
        return redirect(route('quan-ly-nguoi-dung.index'))->with('success', 'Tạo người dùng thành công');
    }
    public function viewChangePassword()
    {
        $course = Course::first();
        return view('admin.users.password', compact('course'));
    }
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'min:6', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Mật khẩu cũ không chính xác.');
                }
            }],
            'password' => ['required', 'min:6', function ($attribute, $value, $fail) use ($request) {
                if ($request->old_password === $value) {
                    $fail('Mật khẩu mới không được trùng với mật khẩu cũ.');
                }
            }],
            'confirm_password' => ['required', 'min:6', function ($attribute, $value, $fail) use ($request) {
                if ($request->password !== $value) {
                    $fail('Nhập lại mật khẩu không trùng khớp.');
                }
            }]
        ], [
            'required' => ':attribute không được để trống',
            'min' => ':attribute tối đa là :min kí tự',
            'confirmed' => ':attribute lỗi confirmed'
        ], [
            'old_password' => 'Mật khẩu cũ',
            'password' => 'Mật khẩu mới',
            'confirm_password' => 'Nhập lại mật khẩu'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        User::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);
        return redirect(route('admin.index'))->with('success', 'Đổi mật khẩu thành công');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }
    public function banAccount(int $id) {
        User::where('id', $id)->update(['password' => '0']);
        return back()->with('success', 'Thu hồi tài khoản thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            User::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-nguoi-dung.index'))->with('success', 'Xóa người dùng thành công');
    }
}
