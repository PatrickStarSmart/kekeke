<?php

namespace App\Services\Staff;

use App\Models\Product;

class ProductService
{
    public function getProductById($productId, $qty)
    {
        return Product::where('id', $productId)
            ->where('stock' >= $qty)
            ->get();
    }

}
