<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Department;
use App\Category;

class PageController extends Controller
{
    public function getIndex()
    {
        $department = new Department();
        $category = new Category();
        $product = new Product();
        $new_products = $product->getNewProduct();
        $hot_products = $product->getNewProduct();
        $departments = $department->getDepartment();
        $categories = $category->getCategory();
        return view('page.home',['new_products'=>$new_products,'hot_products'=>$hot_products,'departments'=>$departments,'categories'=>$categories]);
    }
}
