<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function show(string $slug, int $id)
    {
        $post = Post::findBySlug($slug);
        $rel_posts = Post::where('cat_id', $post->cat_id)
            ->where('id', '!=', $id)
            ->where(function ($query) {
                $query->whereNull('posted_time')->orWhere('posted_time', '<', time());
            })->orderBy('id', 'DESC')->limit(8)->get();
        session()->put('post_id', $id);
        session()->save();
        return view('posts.show', compact('post', 'rel_posts'));
    }
    public function submitComment(Request $request, int $reply_id = null)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.email' => 'Địa chỉ email không đúng định dạng',
            'content.required' => 'Vui lòng nhập nội dung'
        ]);
        $comment = $request->only('name', 'email', 'content');
        $comment['post_id'] = session()->get('post_id');
        session()->forget('post_id');
        $comment['reply_id'] = $reply_id;
        Comment::create($comment);
        return back()->with('success', 'Thêm bình luận thành công');
    }
    public function deleteComment(int $id)
    {
        Comment::destroy($id);
        return back()->with('success', 'Xóa bình luận thành công');
    }
}
