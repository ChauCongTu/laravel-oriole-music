<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogueManangementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->s == null)
            $_data = Catalogue::paginate(10);
        else
            $_data = Catalogue::where('name', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.catalogues.index', compact('searchString', '_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalogues.add');
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
            Catalogue::create($_data);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getMessage());
        }
        return redirect(route('quan-ly-loai-san-pham.index'))->with('success', 'Thêm danh mục sản phẩm mới thành công');
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
        $_data = Catalogue::find($id);
        return view('admin.catalogues.edit', compact('_data'));
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
            Catalogue::where('id', $id)->update($_data);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-loai-san-pham.index'))->with('success', 'Cập nhật danh mục sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Catalogue::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Vui lòng thử lại');
        }
        return redirect(route('quan-ly-loai-san-pham.index'))->with('success', 'Xóa danh mục sản phẩm thành công');
    }
}
