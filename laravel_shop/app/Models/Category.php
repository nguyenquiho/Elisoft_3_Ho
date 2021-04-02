<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "nn_category";
    
    // public function product()
    // {
    // 	return $this->hasMany('App\Product','category_id','id');
    // }

    public function product_department()
    {
    	return $this->belongsTo('App\Department','department_id','id');

    }
    public function getCategory()
    {
        $categories = Category::all();
        return $categories;
    }
}
