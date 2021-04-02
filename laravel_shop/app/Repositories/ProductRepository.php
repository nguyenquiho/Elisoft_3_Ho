<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getNewProducts()
    {
        return $products = Product::orderBy('id','desc')->limit(20)->get();
    }
}

?>