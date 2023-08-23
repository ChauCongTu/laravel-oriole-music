<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\InstrumentDesign;
use App\Models\InstrumentType;
use App\Models\SheetMusic;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function show(int $id, string $slug)
    {
        $sheet = SheetMusic::find($id);
        $rel_sheets = SheetMusic::where('id', '!=', $id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('sheets.show', compact('sheet', 'rel_sheets'));
    }
    public function index(Request $request)
    {
        $s = $request->s;
        if ($request->s == null) {
            $sheets = SheetMusic::orderBy('id', 'DESC')->paginate(8);
        }
        else {
            $sheets = SheetMusic::where('name', 'LIKE', '%'.$s.'%')->orderBy('id', 'DESC')->paginate(8);
        }
        $catalogues = Catalogue::all();
        return view(
            'sheets.index',
            compact(
                'sheets',
                'catalogues',
                's'
            )
        );
    }
}
