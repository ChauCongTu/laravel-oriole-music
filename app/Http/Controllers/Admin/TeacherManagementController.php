<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeacherManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $teachers = Teacher::paginate(10);
        else
            $teachers = Teacher::where('title', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.teachers.index', compact('searchString', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required|image',
            'description' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên giảng viên',
            'avatar.required' => 'Vui lòng tải lên ảnh đại diện',
            'description.required' => 'Vui lòng nhập thông tin',
            'avatar.image' => 'Hình ảnh không đúng định dạng'
        ]);
        if ($request->avatar->getSize() > (1024 * 1024) * 2)
            return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 2 MB');
        $teacher = $request->except('_token');
        $teacher['avatar'] = 'teacher/' . Str::slug($teacher['name']) . '-' . time() . '.' . $request->avatar->extension();
        Storage::putFileAs('public', $request->avatar, $teacher['avatar']);
        $teacher['avatar'] = 'storage/' . $teacher['avatar'];
        // dd($teacher);
        try {
            Teacher::create($teacher);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getMessage());
        }
        return redirect(route('quan-ly-giang-vien.index'))->with('success', 'Thêm giảng viên thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $teacher = Teacher::find($id);
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'image',
            'description' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tiêu đề của Banner',
            'avatar.image' => 'Hình ảnh không đúng định dạng',
            'description.required' => 'Vui lòng nhập mô tả',
        ]);
        $teacher = $request->except('_token', '_method');
        if ($request->hasFile('avatar')) {
            if ($request->avatar->getSize() > (1024 * 1024) * 2)
                return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 2 MB');
            $teacher['avatar'] = 'teacher/' . Str::slug($teacher['name']) . '-' . time() . '.' . $request->avatar->extension();
            Storage::putFileAs('public', $request->image, $teacher['avatar']);
            $teacher['avatar'] = 'storage/' . $teacher['avatar'];
        }
        try {
            Teacher::where('id', $id)->update($teacher);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại!');
        }
        return redirect(route('quan-ly-giang-vien.index'))->with('success', 'Cập nhật giảng viên thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Teacher::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-giang-vien.index'))->with('success', 'Xóa giảng viên thành công');
    }
}
