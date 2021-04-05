<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Product extends Model
{
    use HasFactory;

    protected $table='nn_product';
    public $timestamps = false;
    public function product_category()
    {
    	return $this->belongsTo('App\ProductCategory','category_id','id');
    }
    public function rating_product()
    {
        return $this->hasMany(RatingProduct::class,'id_product','id');
    }
    public function comment_product()
    {
        return $this->hasMany(CommentProduct::class,'id_product','id');
    }

    public function getHotProduct(){
        $hot_products = Product::orderBy('view','desc')
                        ->limit(20)
                        ->get();
        return $hot_products;
    }

    public function getNewProduct(){

        $new_products = Product::orderBy('id','desc')
                        ->limit(20)
                        ->get();
        return $new_products;
    }

    public function getProductDetail($id){
        $product = Product::find($id);
        // dd($value = session($id));
        // if(Session::get($id) == null){
        //     $view = $product->view;
        //     // $sql = 'UPDATE `nn_product` SET `view`=`view`+1 WHERE `id`='.$id;
        //     Product::where('id', $id)->update(['view'=>$view + 1]);
        //     Session::put($id, 1);
        // }
        return $product;
    }

    public function getNewProductByCat($id,$by){
        if(Session::get($by) == null || Session::get($by) == 'asc'){
            session([$by => 'desc']);
        }
        else {session([$by => 'asc']);}
        $products = Product::where('category_id',$id)
                    ->where('active',1)
                    ->orderBy($by,Session::get($by))
                    ->paginate(20);
        return $products;
    }

    // public function getStar($id){
        
    // }

    
}
