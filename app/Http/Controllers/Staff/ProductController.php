<?php

namespace App\Http\Controllers\Staff;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('staff.product', compact('products'));
    }
}
