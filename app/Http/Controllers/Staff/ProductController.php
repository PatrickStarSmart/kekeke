<?php

namespace App\Http\Controllers\Staff;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $carts = Cart::whereNull('transaction_id')->where('user_id', Auth::user()->id)->count();

        return view('staff.product', compact('products', 'carts'));
    }
}
