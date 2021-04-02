<?php
$link=@mysqli_connect('localhost','root','') or die("Kết nối sever thất bại!");
mysqli_select_db($link,'faceshop_v2') or die('Database không tồn tại!');
mysqli_query($link,"SET NAMES 'UTF8'");
?>