<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\Instrument;
use App\Models\InstrumentDesign;
use App\Models\InstrumentType;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    public function show(int $id, string $slug)
    {
        $instrument = Instrument::find($id);
        $instrument->image = explode('|', $instrument->image);
        $lastests = Instrument::where('id', '!=', $id)->orderBy('id', 'DESC')->limit(5)->get();
        $rel_instruments = Instrument::where('catalog_id', $instrument->catalog_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(5)->get();
        return view('instruments.show', compact('instrument', 'lastests', 'rel_instruments'));
    }
    public function index(string $slug, Request $request)
    {
        $catalogue = Catalogue::findBySlug($slug);
        $instruments = Instrument::orderBy('id', 'DESC')->where('catalog_id', $catalogue->id)->paginate(8);
        if ($request->query('filter')) {
            $instruments = Instrument::orderBy('id', 'DESC')->where('catalog_id', $catalogue->id)
                ->where($request->query('filter') . '_id', $request->query($request->query('filter')))
                ->paginate(8);
        }
        // dd($instruments);
        $brands = Brand::all();
        $types = InstrumentType::all();
        $designs = InstrumentDesign::all();
        return view('instruments.index', compact('instruments', 'catalogue', 'brands', 'designs', 'types'));
    }
    public function seeAll(Request $request)
    {
        $instruments = Instrument::filter($request->type, $request->brand_id, $request->type_id, $request->design_id);

        // Get the brand_id values
        $type = $request->type;
        $brand_id = $request->brand_id;
        $type_id = $request->type_id;
        $design_id = $request->design_id;

        $brands = Brand::all();
        $types = InstrumentType::all();
        $designs = InstrumentDesign::all();
        $catalogues = Catalogue::all();
        return view(
            'instruments.all',
            compact(
                'instruments',
                'type',
                'catalogues',
                'brands',
                'designs',
                'types',
                'brand_id',
                'design_id',
                'type_id'
            )
        );
    }
}
