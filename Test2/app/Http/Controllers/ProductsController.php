<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Category;
use App\Models\Product;
use App\Models\RatingProduct;
use App\Services\Languages\Vietnamese;
use App\Services\Languages\Chinese;
use Auth;

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
        $user = Auth::user();
        $comments = RatingProduct::where('id_product',$req->id)->orderBy('created_at','desc')->get();
        return view('page.product_detail',['comments'=>$comments,'user'=>$user,'product_detail'=>$product_detail,'new_products_by_cat'=>$new_products_by_cat]);
    }

    public function listing(Request $req){
        //dd($req->cat);
        $product = new Product();
        $products = $product->getNewProductByCat($req->cat,$req->order_by);
        $category = Category::find($req->cat);
        $cat_name = $category->name;

        return view('page.listing',['cat_name'=>$cat_name,'products'=>$products,'cat'=>$req->cat]);
    }

    public function ajax(Request $request){
        if($request->task == 'rating'){
            $user_id = $request->user_id;
            $product_id = $request->product_id;
            $star = $request->star;
            $product_comment = $request->product_comment;
            $count = RatingProduct::where('id_product', $product_id)->where('id_user', $user_id)->count('comment');
            if($count == 0){
                $object = new RatingProduct();
                $user = Auth::user();
                    $object->id_product = $product_id;
                    $object->id_user = $user_id;
                    $object->star = $star;
                    $object->comment = $product_comment;
                    $object->name = $user->name;
                    $object->save();
                    echo"Cảm ơn bạn đã đánh giá và nhận xét về sản phẩm !";
            }
            else echo"Bạn chỉ được rating 1 lần cho 1 sản phẩm !";
        }
    }
}
