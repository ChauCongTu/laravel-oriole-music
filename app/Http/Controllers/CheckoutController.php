<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(string $type, int $id){
        return view('checkout');
    }
}
