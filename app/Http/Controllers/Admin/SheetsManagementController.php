<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SheetMusic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SheetsManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $sheets = SheetMusic::paginate(10);
        else
            $sheets = SheetMusic::where('name', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.sheets.index', compact('searchString', 'sheets'));
    }
    public function changeDiscount(Request $request, int $id)
    {
        if ($request->input('discount') == null || $request->input('discount_to') == null) {
            return back()->with('error', 'Cập nhật khuyến mãi không thành công, vui lòng nhập đầy đủ thông tin.');
        } else {
            if (!is_numeric($request->input('discount')) || !is_numeric($request->input('discount_to'))) {
                return back()->with('error', 'Cập nhật khuyến mãi không thành công, bạn chỉ được nhập số.');
            } else {
                $time_discount = time() + ($request->discount_to * 24 * 60 * 60);
                try {
                    SheetMusic::where('id', $id)->update(['discount' => $request->discount, 'discount_to' => $time_discount]);
                } catch (\Throwable $th) {
                    return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
                }
                return back()->with('success', 'Cập nhật khuyến mãi thành công. Dịch vụ #' . $id . ' sẽ được giảm ' . number_format($request->input('discount')) . 'đ cho tới ' . date('H:i d/m/Y', $time_discount));
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sheets.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:5',
                'price' => 'required|numeric',
                'description' => 'required',
                'image' => 'required|image'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min kí tự',
                'numeric' => ':attribute phải là số',
                'image' => 'Hình ảnh không đúng định dạng'
            ],
            [
                'name' => 'Tên khóa học',
                'price' => 'Giá',
                'description' => 'Mô tả',
                'image' => 'Hình ảnh'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $sheet = $request->except('_token');
        if ($request->image->getSize() > 1024 * 1024)
            return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
        $sheet['slug'] = Str::slug($sheet['name']) . '-' . time();
        $sheet['image'] = 'sheet/' . $sheet['slug'] . '.' . $request->image->extension();
        Storage::putFileAs('public', $request->image, $sheet['image']);
        $sheet['image'] = 'storage/' . $sheet['image'];
        try {
            SheetMusic::create($sheet);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-sheet-nhac.index'))->with('success', 'Thêm sheet nhạc thành công!');
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
        $sheet = SheetMusic::find($id);
        return view('admin.sheets.edit', compact('sheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:5',
                'price' => 'required|numeric',
                'description' => 'required',
                'image' => 'image'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min kí tự',
                'numeric' => ':attribute phải là số',
                'image' => 'Hình ảnh không đúng định dạng'
            ],
            [
                'name' => 'Tên sheet nhạc',
                'price' => 'Giá',
                'description' => 'Mô tả',
                'image' => 'Hình ảnh'
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $sheet = $request->except('_token', '_method');
        $sheet['slug'] = Str::slug($sheet['name']) . '-' . time();
        if ($request->hasFile('image')) {
            if ($request->image->getSize() > 1024 * 1024)
                return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
            $sheet['image'] = 'sheet/' . $sheet['slug'] . '.' . $request->image->extension();
            Storage::putFileAs('public', $request->image, $sheet['image']);
            $sheet['image'] = 'storage/' . $sheet['image'];
        }
        try {
            SheetMusic::where('id', $id)->update($sheet);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-sheet-nhac.index'))->with('success', 'Chỉnh sửa sheet nhạc thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            SheetMusic::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-sheet-nhac.index'))->with('success', 'Xóa sheet nhạc thành công');
    }
}
