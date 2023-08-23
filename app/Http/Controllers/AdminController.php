<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Course;
use App\Models\Post;
use App\Models\Service;
use App\Models\SheetMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [];
        $stats['posts'] = Post::count();
        $stats['courses'] = Course::count();
        $stats['services'] = Service::count();
        $stats['sheets'] = SheetMusic::count();
        $contacts = Contact::orderBy('id', 'DESC')->paginate(10);
        return view('admin.index', compact('stats', 'contacts'));
    }
    public function destroyContact(int $id)
    {
        try {
            Contact::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return back()->with('success', 'Xóa liên hệ thành công');
    }
    public function handleContact(int $id)
    {
        try {
            Contact::where('id', $id)->update(['status' => 'Đã xử lý']);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Hãy thử lại sau. Nếu vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi #' . $th->getCode());
        }
        return back()->with('success', 'Đánh dấu thành công');
    }
}
