<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	//define('W',123);
	
	$a = array(5=>1,9.5,'W'=>'PHP',2=>'JS');
	echo '<pre>';
	print_r($a);
	echo '</pre>';
	
	//Truy xuat
	echo $a['W'];//get
	$a['W']=100;//set
	
	
	
	//Thêm phần tử
	$a[]='ABC';
	
	echo '<pre>';
	print_r($a);
	echo '</pre>';
	
	//Duyệt mảng
	$b = array(9,20,5.5,7,'Hello');
	print_r($b);
	$n = count($b);//Dem so phan tu cua mang
	for($i=0;$i<$n;$i++)
	echo $b[$i],'<br>';
	
	foreach($a as $v)
	echo $v,'<br>';
	
?>
</body>
</html>