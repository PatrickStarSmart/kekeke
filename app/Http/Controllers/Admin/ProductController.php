<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductPostRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product', compact('products'));
    }

    public function create()
    {
        return view('admin.add-product');
    }

    public function store(ProductPostRequest $request)
    {
        $validated = $request->validated();

        Product::create($validated);

        return redirect()->route('products')->with('success', 'Product created successfully');
    }

    public function edit($productId)
    {
        $products = Product::findOrFail($productId);

        return view('admin.edit-product', compact('products'));
    }

    public function update(ProductPostRequest $request, $productId)
    {
        $validated = $request->validated();

        $products = Product::findOrFail($productId);

        $products->update($validated);

        return redirect()->route('products')->with('success', 'Product updated successfully');
    }

    public function destroy($productId)
    {
        $products = Product::findOrFail($productId);

        $products->delete();

        return redirect()->route('products')->with('success', 'Product deleted successfully');
    }
}
