<?php
	unset($_SESSION['admin_id'],$_SESSION['admin_name']);
	//Chuyen den trang dang nhap
	header('location:?mod=login');
?>
