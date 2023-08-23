<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $banners = Banner::paginate(10);
        else
            $banners = Banner::where('title', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.banners.index', compact('searchString', 'banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'summary' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề của Banner',
            'image.required' => 'Vui lòng tải lên Banner',
            'summary.required' => 'Vui lòng nhập mô tả',
            'image.image' => 'Hình ảnh không đúng định dạng'
        ]);
        if ($request->image->getSize() > 1024 * 1024)
            return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
        $banner = $request->except('_token');
        $banner['image'] = 'banners/' . Str::slug($banner['title']) . '-' . time() . '.' . $request->image->extension();
        Storage::putFileAs('public', $request->image, $banner['image']);
        $banner['image'] = 'storage/' . $banner['image'];
        try {
            Banner::create($banner);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-banner.index'))->with('success', 'Thêm banner thành công!');
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
        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image',
            'summary' => 'required'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề của Banner',
            'image.image' => 'Hình ảnh không đúng định dạng',
            'summary.required' => 'Vui lòng nhập mô tả',
        ]);
        $banner = $request->except('_token', '_method');
        if ($request->hasFile('image')) {
            if ($request->image->getSize() > 1024 * 1024)
                return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
            $banner['image'] = 'banners/' . Str::slug($banner['title']) . '-' . time() . '.' . $request->image->extension();
            Storage::putFileAs('public', $request->image, $banner['image']);
            $banner['image'] = 'storage/' . $banner['image'];
        }
        try {
            Banner::where('id', $id)->update($banner);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getMessage());
        }
        return redirect(route('quan-ly-banner.index'))->with('success', 'Cập nhật banner thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Banner::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-banner.index'))->with('success', 'Xóa bài viết thành công');
    }
}
