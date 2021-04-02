<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='nn_product';
    public function product_category()
    {
    	return $this->belongsTo('App\ProductCategory','category_id','id');
    }

    public function getHotProduct(){
        $hot_products = Product::orderBy('view','desc')
                        ->limit(20)
                        ->get();
        return $new_products;
    }

    public function getNewProduct(){
        $hot_products = Product::orderBy('id','desc')
                        ->limit(20)
                        ->get();
        return $hot_products;
    }
    // public function getNewProduct(){
    //     $hot_products = Product::orderBy('id','desc')
    //                     ->limit(20)
    //                     ->get();
    //     return $hot_products;
    // }
    // public function getNewProduct(){

    // }
}
