<?php

namespace App\Http\Controllers\Staff;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\Staff\CartService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartPostRequest;
use App\Services\Staff\ProductService;

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
        $carts = $this->cartService->showCart(1);

        return view('staff.cart', compact('carts'));
    }

    public function store(CartPostRequest $request)
    {
        $validated = $request->validated();

        Cart::updateOrCreate($validated);

        return redirect()->back()->with('Success', 'Product saved to cart');
    }

    public function destroy($cartId)
    {
        $this->cartService->removeProductFromCart($cartId);

        return redirect()->route('carts')->with('Success', 'Product has removed from cart');
    }
}
