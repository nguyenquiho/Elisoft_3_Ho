<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;

class OrderController extends Controller
{


    
    public function getCheckout(){
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('page.checkout',['cart'=>Session::get('cart'),'items'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }

    public function postCheckout(Request $req){
        if($req->name == "" || $req->email == "" || $req->mobile == "" || $req->address == ""){
            //$msg = "Please fill full information!";
            return redirect()->back()->with('msg','Vui long nhap du thong tin!');;
        }
        else{
            $order = new Order;
            $data = $req->all();
            $order->createOrder($data);
        }
    }
}
