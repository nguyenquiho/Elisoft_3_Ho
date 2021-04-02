<?php


require('lib/db.php');
require('lib/session.php');
require('helper/format.php');
Session::init();
ob_start();
// phpinfo();
// Session::set('login',3);
// $s = Session::get('login');
// print_r($s);
// die();
// $a = true;
// if($a == true){
//     Session::check_session();
//     $a = false;
// }

spl_autoload_register(function ($class) {
    $class = strtolower($class);
    include_once 'model/' . $class . '.php';
});

// function __autoload($className)
// {   
//     $className = strtolower($className);
//     if(file_exists('model/'.$className . '.php')){
//         include_once ('model/'. $className . '.php');
//     }

// }

function view($view,$data)
{
    foreach($data as $k => $v)
    {
        $$k=$v;
    }
    if($view == 'header' || $view == 'footer'){
        //extract($data);
        include("inc/{$view}.php");
    }
    else{
        //extract($data);
        include("module/{$view}.php");
    }   
    
}


//get department
$department = new Department();
$rs_dep = $department->get_department();

//get category
$category = new Category();
$rs_cat = $category->get_category();

view('header',['rs_dep'=>$rs_dep,'rs_cat'=>$rs_cat]);

//get mod from URL
if (!empty($_GET['mod']))
    $mod = $_GET['mod'];
else
    $mod = 'home';


//home page
if($mod == 'home')
{
    // include('model/product.php');
    $product = new Product();
    $rs_hot = $product->get_hot_product();
    $rs_new = $product->get_new_product();
    view('home',['rs_hot'=>$rs_hot,'rs_new'=>$rs_new]);
}


//page listing
if($mod == 'listing')
{    
    if(isset($_REQUEST['cid'])){
        $cat = $_REQUEST['cid'];
        if(empty($_GET['cid']))
		$cid = 1;
        else
            $cid = $_GET['cid'];
        
        if(empty($_GET['page']))
            $page = 1;
        else
            $page = $_GET['page'];
        
        if(empty($_GET['sort']))
            $sort = 0;
        else
            $sort = $_GET['sort'];

        $product = new Product();
        $data_paginate = $product->get_data_to_paginate();
        $rs_paginate = $product->paginate_product();
        //$rs_by_cat = $product->get_product_by_cat($cat,0,20);
        view('listing',['data_paginate'=>$data_paginate,'rs_paginate'=>$rs_paginate,'cid'=>$cid,'page'=>$page,'sort'=>$sort]);
    }
    else echo "Page Not Found";
    
}

//page detail
// unset($_SESSION['view']);
if($mod == 'detail'){
    
    $product = new Product();
    $r = $product->get_product_detail();
    $id = $_REQUEST['id'];
    $cat = $r['category_id'];
    $new_product_by_cat = $product->get_new_product_by_cat($cat,$id);
    view('detail',['r'=>$r,'new_product_by_cat'=>$new_product_by_cat]);
}


//page signup
if($mod == 'signup'){
    if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['fullname']))){
        $fullname=$_POST['fullname'];
        $email= $_POST['email'];
        $pass=$_POST['pass'];
        $repass=$_POST['repass'];
        
        $mobile= $_POST['mobile'];
        $data = ['fullname'=>$fullname,'email'=>$email,'pass'=>$pass,'repass'=>$repass,'mobile'=>$mobile];
        $user = new User();
        $msg = $user->sign_up($data);
        view('signup',['msg'=>$msg,'fullname'=>$fullname,'email'=>$email,'mobile'=>$mobile]);
    }else{
        $msg = '';
        view('signup',['msg'=>$msg]);
    }
}

//page login
if($mod == 'login'){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['email']) && isset($_POST['pass'])){
            if(Session::check_login() == false ){
                $format= new Format();
                $data['email'] = $format->validate($_POST['email']);
                $data['pass'] = $format->validate($_POST['pass']);
                $user = new User();
                $user->login($data);
            }
        }
    }
}

//logout
if($mod == 'logout'){
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['view']);
}
//module account
if($mod == 'account'){
    $user = new User();
    $r = $user->get_detail_account();
    $orders = $user->get_orders();
    // print_r($order);
    // die();
    if(isset($_GET['act']) && $_GET['act'] == 'upload_avt'){
        $user->upload_avt();
    }
    view('account',['r'=>$r,'orders'=>$orders]);
    
}


//module account
if($mod == 'update'){
    $user = new User();
    $r = $user->get_detail_account();
    $msg = $user->update_info_account();
    view('update',['msg'=>$msg,'r'=>$r]);
}

//module cart
if($mod == 'cart'){
        //them vao gio hang
        if(isset($_GET['act']) && $_GET['act'] == "1" && isset($_GET['id'])){
            $id = $_GET['id'];
            if(isset($_POST['qty'])) $qty = $_POST['qty'];
            if($qty < 0) header('Location: '.$_SERVER['REQUEST_URI']);
            else $qty = 1;

            if($qty > 0){
                $cart = Session::add_to_cart($id,$qty);
                view('cart',['cart'=>$cart]);
                header('Location:?mod=cart');
            }
            
            //xoa gio hang
        }elseif(isset($_GET['act']) && $_GET['act'] == "2" && isset($_GET['id'])){ 
            $id = $_GET['id'];
            $cart = Session::delete_from_cart($id);
            view('cart',['cart'=>$cart]);

            //cap nhat gio hang
        }elseif(isset($_GET['act']) && $_GET['act'] == "3" && isset($_GET['id'])){ 
            // $id = $_GET['id'];
            $cart = Session::update_cart();
            view('cart',['cart'=>$cart]);
        }
        else{
            $cart = $_SESSION['cart'];
            view('cart',['cart'=>$cart]);
        }
}

//module checkout

if($mod == 'checkout'){
    if(!isset($_SESSION['id'])){
        header('Location:?mod=login');
    }
    else{
        $cart = $_SESSION['cart'];
        view('checkout',['cart'=>$cart]);
    }
}


//module order
if($mod == 'order'){
    if(!isset($_SESSION['id'])){
        header('Location:?mod=login');
    }
    else{
        if(isset($_POST)){
            if($_POST['name'] == "" || $_POST['email'] == "" || $_POST['mobile'] == "" || $_POST['address'] == ""){
                // print_r($_POST);
                // die();
                $cart = $_SESSION['cart'];
                $msg = "Vui lòng nhập đủ thông tin";
                view('checkout',['cart'=>$cart,'msg'=>$msg]);
            }
            else{
                $order = new Order;
                // print_r($_POST);
                $cart = $_SESSION['cart'];
                $order->create_order($cart);
                // print_r($_POST);
                // die();
                // $data = [];
                // $data['name'] = $_POST['name'];
                // $data['email'] = $_POST['email'];
                // $data['mobile'] = $_POST['mobile'];
                // $data['address'] = $_POST['address'];
                // // print_r($data);
                // // die();
                // $cart = $_SESSION['cart'];
                //$data = $_P['cart'];
                
            }

        }
    }
}

//view detail order
if($mod == 'order_detail'){
    if(!isset($_SESSION['id'])){
        header('Location:?mod=login');
    }
    else{

        if(isset($_GET['id'])){
            $id_order = $_GET['id'];
            $user = new User;
            $product = new Product;
            $pr = $product->get_product_detail();
            $order_detail = $user->get_detail_order($id_order);
            view('order_detail',['order_detail'=>$order_detail]);
        }


    }
}


//module management orders
if($mod == 'm_orders'){



}

require_once("module/{$mod}.php");
view('footer',['rs_dep'=>$rs_dep,'rs_cat'=>$rs_cat]);
?>
             
            
