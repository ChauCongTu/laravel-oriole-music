<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\Instrument;
use App\Models\InstrumentDesign;
use App\Models\InstrumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InstrumentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->s == null)
            $instruments = Instrument::paginate(10);
        else
            $instruments = Instrument::where('name', 'LIKE', '%' . $request->s . '%')->paginate(10);
        $searchString = $request->s != null ? $request->s : null;
        return view('admin.instruments.index', compact('searchString', 'instruments'));
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
                    Instrument::where('id', $id)->update(['discount' => $request->discount, 'discount_to' => $time_discount]);
                } catch (\Throwable $th) {
                    return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
                }
                return back()->with('success', 'Cập nhật khuyến mãi thành công. Sản phẩm #' . $id . ' sẽ được giảm ' . number_format($request->input('discount')) . 'đ cho tới ' . date('H:i d/m/Y', $time_discount));
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $catalogues = Catalogue::all();
        $designs = InstrumentDesign::all();
        $types = InstrumentType::all();
        return view('admin.instruments.add', compact('brands', 'catalogues', 'designs', 'types'));
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
        if ($request->catalog_id == 0)
            return back()->with('error', 'Thêm sản phẩm không thành công, vui lòng chọn loại sản phẩm');
        $instrument = $request->except('_token');
        if ($request->image->getSize() > 1024 * 1024)
            return back()->with('error', 'Hình ảnh phải có kích thước tối đa là 1 MB');
        $instrument['slug'] = Str::slug($instrument['name']) . '-' . time();
        $instrument['image'] = 'instrument/' . $instrument['slug'] . '.' . $request->image->extension();
        Storage::putFileAs('public', $request->image, $instrument['image']);
        $instrument['image'] = 'storage/' . $instrument['image'];
        if ($request->catalog_id != 1) {
            $instrument['type_id'] = null;
            $instrument['design_id'] = null;
        }
        // dd($instrument);
        try {
            Instrument::create($instrument);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getMessage());
        }
        return redirect(route('quan-ly-san-pham.index'))->with('success', 'Thêm sản phẩm thành công!');
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
        $instrument = Instrument::find($id);
        $brands = Brand::all();
        $catalogues = Catalogue::all();
        $designs = InstrumentDesign::all();
        $types = InstrumentType::all();
        return view('admin.instruments.edit', compact('instrument', 'brands', 'catalogues', 'designs', 'types'));
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
        if ($request->catalog_id == 0)
            return back()->with('error', 'Chỉnh sửa sản phẩm không thành công, vui lòng chọn loại sản phẩm');
        $instrument = $request->except('_token', '_method');
        $instrument['slug'] = Str::slug($instrument['name']) . '-' . time();
        if ($request->catalog_id != 1) {
            $instrument['type_id'] = null;
            $instrument['design_id'] = null;
        }
        try {
            Instrument::where('id', $id)->update($instrument);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-san-pham.index'))->with('success', 'Chỉnh sửa sản phẩm thành công!');
    }
    public function imagesSP($id)
    {
        $images = Instrument::select('image')->where('id', $id)->first();
        $imagesArr = explode('|', $images->image);
        return view('admin.instruments.image', compact('imagesArr', 'id'));
    }

    public function addImagesSP(Request $request, $id)
    {
        $success = 0;
        $instrument = Instrument::find($id);
        $images = explode('|', $instrument->image);
        // dd(count($request->images));
        if (count($request->images) < 1) return back()->with('error', 'Vui lòng chọn ít nhất một ảnh!');
        if (count($request->images) > 6) return back()->with('error', 'Bạn chỉ được tải lên 1 lúc 6 ảnh!');
        foreach ($request->images as $image) {
            if ($image->getSize() > 1024 * 1024) continue;
            if (!in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])) continue;
            else {
                $path = 'instrument/' . $instrument['slug'] . Str::random(5) . '.' . $image->extension();
                Storage::putFileAs('public', $image, $path);
                $images[] = 'storage/' . $path;
                $success++;
            }
        }
        $instrument['image'] = implode('|', $images);
        $instrument->save();
        return back()->with('success', 'Thêm thành công ' . $success . ' hình ảnh');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Instrument::destroy($id);
        } catch (\Throwable $th) {
            return back()->with('error', 'Có lỗi xảy ra! Nếu thử lại vẫn tiếp tục xảy ra lỗi, hãy liên hệ kỹ thuật với mã lỗi ' . $th->getCode());
        }
        return redirect(route('quan-ly-san-pham.index'))->with('success', 'Xóa sản phẩm thành công');
    }
    public function deleteImage(Request $request, $id)
    {
        $image = $request->input('image');
        $images = Instrument::select('image')->where('id', $id)->first();
        $images = $images->image;
        $new_images = str_replace('|' . $image, '', $images);
        Instrument::where('id', $id)->update(['image' => $new_images]);
        $path = str_replace('storage/', '', $image);
        // Storage::delete($path);
        return back()->with('success', 'Xóa hình ảnh thành công');
    }
}
