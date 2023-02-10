<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        return view('products.index',['coffee' => Products::all()]);
    }
}
