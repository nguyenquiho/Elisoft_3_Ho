<?php
	if(!isset($_SESSION['id']))header('location:?mod=login'); 

	$order_id = $_GET['id'];
	
	$user_id = $_SESSION['id'];
	
	//Cap nhat sang trang thai huy (-1)
	$sql = "UPDATE `nn_order` SET `status`= - 1 WHERE `status`= 0 AND `id`={$order_id} AND `user_id` = {$user_id}";
	mysqli_query($link, $sql);
	
	//Chuyen den trang account
	header('location:?mod=account');
?>