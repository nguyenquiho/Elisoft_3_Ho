<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Services\Languages\Vietnamese;
use App\Services\Languages\Chinese;

class ProductsController extends Controller
{
    public function getIndex()
    {
        $product = new Product();
        $hot_products = $product->getHotProduct();
        $new_products = $product->getNewProduct();
        
        return view('page.home',['hot_products'=>$hot_products,'new_products'=>$new_products]);
        // $vi = new Vietnamese();
        // $str = 'Đây là 1 câu tiếng Việt không dấu';
        // echo $vi->toASCII($str);
        // die();
        
    }

    public function getProductDetail(Request $req){
        //dd($req->id);
        $product = new Product();
        $product_detail = $product->getProductDetail($req->id);

        $cat = $product_detail->category_id;
        $by = 'id';
        $new_products_by_cat = $product->getNewProductByCat($cat,$by);

        return view('page.product_detail',['product_detail'=>$product_detail,'new_products_by_cat'=>$new_products_by_cat]);
    }

    public function listing(Request $req){
        //dd($req->cat);
        $product = new Product();
        $products = $product->getNewProductByCat($req->cat,$req->order_by);
        $category = Category::find($req->cat);
        $cat_name = $category->name;
        if(count($products)==0){
            return view('page.no_product',['cat_name'=>$cat_name]);
        }
        return view('page.listing',['products'=>$products,'cat'=>$req->cat]);
    }
}
