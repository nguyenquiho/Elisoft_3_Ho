<?php
	$cart = $_SESSION['cart'];
	
	$act = $_GET['act'];//1: Them, 2:Sua, 3:Xoa
	
	//Them
	if($act == 1)
	{
		$id = $_GET['id'];
		$qty = max(1, intval($_GET['qty']));
		$cart[$id]+=$qty;
	}
	//Sua
	if($act == 2)
	{
		foreach($cart as $k=>$v)
			$cart[$k] = max(1, intval($_POST[$k]));
	}
	
	//Xóa
	if($act == 3)
	{
		$id = $_GET['id'];
		unset($cart[$id]);
	}
	
	//Cap nhan len session
	$_SESSION['cart'] = $cart;
	
	//Chuyen den trang gio hang
	header('location:?mod=cart');
	
?>