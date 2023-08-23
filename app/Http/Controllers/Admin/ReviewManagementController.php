<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReviewManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $reviews = Review::paginate(10);
        else
            $reviews = Review::where('name', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.reviews.index', compact('searchString', 'reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'comment' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'image.required' => 'Vui lòng tải lên hình ảnh',
            'image.image' => 'Hình ảnh không đúng định dạng',
            'comment.required' => 'Vui lòng nhập nội dung đánh giá'
        ]);
        if ($request->image->getSize() > 1024 * 1024)
            return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
        $reviews = $request->only('name', 'image', 'comment');
        $reviews['image'] = 'reviews/' . Str::slug($reviews['name']) . '-' . time() . '.' . $request->image->extension();
        Storage::putFileAs('public', $request->image, $reviews['image']);
        $reviews['image'] = 'storage/' . $reviews['image'];
        try {
            Review::create($reviews);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-danh-gia.index'))->with('success', 'Thêm đánh giá mới thành công');
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
        $review = Review::find($id);
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image',
            'comment' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập họ tên',
            'image.image' => 'Hình ảnh không đúng định dạng',
            'comment.required' => 'Vui lòng nhập nội dung đánh giá'
        ]);
        $review = $request->except('_token', '_method');
        if ($request->hasFile('image')) {
            if ($request->image->getSize() > 1024 * 1024)
                return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
            $review['image'] = 'reviews/' . Str::slug($review['name']) . '-' . time() . '.' . $request->image->extension();
            Storage::putFileAs('public', $request->image, $review['image']);
            $review['image'] = 'storage/' . $review['image'];
        }
        try {
            Review::where('id', $id)->update($review);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-danh-gia.index'))->with('success', 'Cập nhật đánh giá thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Review::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-danh-gia.index'))->with('success', 'Xóa đánh giá thành công');
    }
}
