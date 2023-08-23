<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Instrument;
use App\Models\Post;
use App\Models\Review;
use App\Models\SheetMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('id', 'DESC')->limit(5)->get();
        $courses = Course::limit(10)->get();
        $posts = Post::orderBy('id', 'DESC')->where('posted_time', null)->orWhere('posted_time', '<', time())->limit(3)->get();
        $banners = Banner::orderBy('id', 'DESC')->limit(4)->get();
        $instruments = Instrument::orderBy('id', 'DESC')->limit(4)->get();
        $sheets = SheetMusic::orderBy('id', 'DESC')->limit(4)->get();
        return view('welcome', compact('reviews', 'courses', 'posts', 'banners', 'instruments', 'sheets'));
    }
    // POST: add contact to database
    public function sendContact(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'content' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'email' => ':attribute không đúng định dạng',
                'numeric' => ':attribute phải là số'
            ],
            [
                'name' => 'Tên khóa học',
                'email' => 'Địa chỉ email',
                'phone' => 'Số điện thoại',
                'content' => 'Nội dung'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        Contact::create($request->only('name', 'email', 'phone', 'content'));
        return back()->with('success', 'Gửi liên hệ thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
    }
    public function search(Request $request) {
        $key = $request->key;
        $type = $request->type;
        if ($request->type == 'posts'){
            $results = DB::table($request->type)->where('title', 'LIKE', '%'.$request->key.'%')->paginate(8);
        }
        else {
            $results = DB::table($request->type)->where('name', 'LIKE', '%'.$request->key.'%')->paginate(8);
        }
        return view('search', compact('results', 'key', 'type'));
    }
}
