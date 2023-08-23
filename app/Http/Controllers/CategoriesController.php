<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(int $id, string $slug)
    {
        abort('403');
        $category = Category::select('name')->find($id);
        $posts = Post::where('cat_id', $id)->where('posted_time', null)->orWhere('posted_time', '<', time())->orderBy('id', 'DESC')->paginate(10);
        return view('categories.show', compact('category', 'posts'));
    }
    public function index(string $slug)
    {
        $categories = Category::findBySlug($slug);
        $posts = Post::where('cat_id',  $categories->id)->where(function ($query) {
            $query->whereNull('posted_time')->orWhere('posted_time', '<', time());
        })->orderBy('id', 'desc')->paginate(9);
        return view('categories.index', compact('categories', 'posts'));
    }
}
