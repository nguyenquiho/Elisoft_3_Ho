<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use App\Product;
use Illuminate\Http\Request;

class ProductRepositoryController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
 
    public function index()
    {
        $products = $this->productRepository->getNewProducts();
 
        return view('test',['products'=>$products]);
    }
}
