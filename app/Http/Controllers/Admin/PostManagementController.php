<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $posts = Post::paginate(10);
        else
            $posts = Post::where('title', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.posts.index', compact('searchString', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'required|image'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung',
            'content.min' => 'Nội dung bài viết phải có ít nhất :min kí tự',
            'image.required' => 'Vui lòng tải lên hình ảnh',
            'image.image' => 'Hình ảnh không đúng định dạng'
        ]);
        if ($request->image->getSize() > 1024 * 1024)
            return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
        $post = $request->except('_token');
        $post['slug'] = Str::slug($post['title']) . '-' . time();
        $post['image'] = 'posts/' . $post['slug'] . '.' . $request->image->extension();
        Storage::putFileAs('public', $request->image, $post['image']);
        $post['image'] = 'storage/' . $post['image'];
        if ($request->input('posted_time')){
            $post['posted_time'] = strtotime($request->posted_time);
        }
        if ($request->video != null) {
            $post['video'] = \App\Helpers\Helpers::GetIDYoutube($request->video);
        }
        $post['user_id'] = Auth::id();
        try {
            Post::create($post);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-bai-viet.index'))->with('success', 'Thêm bài viết thành công!');
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
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'image'
        ], [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung',
            'content.min' => 'Nội dung bài viết phải có ít nhất :min kí tự',
            'image.image' => 'Hình ảnh không đúng định dạng'
        ]);
        $post = $request->except('_token', '_method');
        $post['slug'] = Str::slug($post['title']) . '-' . time();
        if ($request->hasFile('image')) {
            if ($request->image->getSize() > 1024 * 1024)
                return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
            $post['image'] = 'posts/' . $post['slug'] . '.' . $request->image->extension();
            Storage::putFileAs('public', $request->image, $post['image']);
            $post['image'] = 'storage/' . $post['image'];
        }
        if ($request->video != null) {
            $post['video'] = \App\Helpers\Helpers::GetIDYoutube($request->video);
        }
        if ($request->input('posted_time')){
            $post['posted_time'] = strtotime($request->posted_time);
        }
        try {
            Post::where('id', $id)->update($post);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getMessage());
        }
        return redirect(route('quan-ly-bai-viet.index'))->with('success', 'Chỉnh sửa bài viết thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Post::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-bai-viet.index'))->with('success', 'Xóa bài viết thành công');
    }
}
