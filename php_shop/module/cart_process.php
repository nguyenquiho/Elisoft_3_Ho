<?php
	//Lay cart tu session	 	 
	$cart =  $_SESSION['cart'];
	
	$id = $_GET['id'];
	
	$act = $_GET['act'];//1: Them, 2: Xoa, 3: Sua
	 
	// if($act == 1)//Them 
	// 	$cart[$id] = 1;
	
	// if($act == 2)//Xoa
	// 	unset($cart[$id]);
	
	if($act == 3)//Sua
	{
		
	}
	
	
	//Cap nhat lai session
	$_SESSION['cart'] = $cart;
	
	//Chuyen den trang gio hang
	header('location:?mod=cart');
	
?>