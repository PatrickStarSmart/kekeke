<?php

namespace App\Http\Controllers\Staff;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Staff\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartPostRequest;
use App\Services\Staff\ProductService;
use App\Http\Requests\CartUpdateRequest;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;

    public function __construct(CartService $cartService, ProductService $productService)
    {
        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $carts = $this->cartService->showCart(Auth::user()->id);

        $total = $carts->sum('sub_total');

        $total_items = $carts->count() . ' Items';

        $user = Auth::user();
        return view('staff.cart', compact('carts', 'total', 'total_items', 'user'));
    }

    public function store(CartPostRequest $request)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;

        $products = Product::where('id', $validated['product_id'])->first();

        if ($validated['qty'] > $products->stock) {
            return redirect()->back()->with('error', 'Insufficient product stock');
        } else {
            Cart::create($validated);
        }

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function update(CartUpdateRequest $request, $cartId)
    {
        $validated = $request->validated();

        $validated['user_id'] = Auth::user()->id;

        $carts = Cart::findOrFail($cartId);

        $carts->sub_total = $validated['qty'] * $carts->price;

        $products = Product::where('id', $carts->product_id)->first();

        if ($validated['qty'] > $products->stock) {
            return redirect()->back()->with('error', 'Insufficient product stock');
        } else {
            $carts->update($validated);
        }

        return redirect()->back()->with('success', 'Qty product update to cart');
    }

    public function destroy($cartId)
    {
        $this->cartService->removeProductFromCart($cartId);

        return redirect()->route('carts')->with('success', 'Product has removed from cart');
    }
}
