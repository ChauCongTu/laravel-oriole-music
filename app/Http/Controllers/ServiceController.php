<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show(int $id, string $slug)
    {
        $service = Service::find($id);
        return view('services.show', compact('service'));
    }
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }
}
