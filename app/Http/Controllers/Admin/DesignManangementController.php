<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstrumentDesign;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DesignManangementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->s == null)
            $_data = InstrumentDesign::paginate(10);
        else
            $_data = InstrumentDesign::where('name', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.designs.index', compact('searchString', '_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.designs.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục'
        ]);
        $_data = $request->only('name');
        $_data['slug'] = Str::slug($_data['name']) . '-' . time();
        try {
            InstrumentDesign::create($_data);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-kieu-dan.index'))->with('success', 'Thêm thương hiệu mới thành công');
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
        $_data = InstrumentDesign::find($id);
        return view('admin.designs.edit', compact('_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục'
        ]);
        $_data = $request->except('_token', '_method');
        $_data['slug'] = Str::slug($_data['name']) . '-' . time();
        try {
            InstrumentDesign::where('id', $id)->update($_data);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-kieu-dan.index'))->with('success', 'Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            InstrumentDesign::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-kieu-dan.index'))->with('success', 'Xóa thương hiệu thành công');
    }
}
