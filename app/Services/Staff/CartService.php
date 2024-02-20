<?php

namespace App\Services\Staff;

use App\Models\Cart;

class CartService
{
    public function showCart($userId)
    {
        return Cart::whereNull('transaction_id')->where('user_id', $userId)->get();
    }

    public function saveProductToCart($qty, $userId, $products, $price)
    {
        return Cart::whereNull('transaction_id')
        ->where('user_id', $userId)
        ->updateOrCreate([
            'product_id' => $products->id,
            'user_id' => $userId,
        ],[
            'qty' => $qty,
            'price' => $price,
            'sub_total' => $qty * $price,
        ]);
    }

    public function removeProductFromCart($cartId)
    {
        return Cart::findOrFail($cartId)->delete();
    }

}
