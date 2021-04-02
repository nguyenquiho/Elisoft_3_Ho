<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	error_reporting(E_ALL);
//Khai báo
	$a = array(9, 20, 100.5, 'Hello');
	
	print_r($a);
	
	$b = array("id"=>5, 'name'=>2, 50, 3.5);
	
	print_r($b);
	
	echo '<pre>';
	$c = array(3 => 'PHP', 'id' => 7, 30, 20.5);
	print_r($c);
	
//Truy xuất (thông qua key)
	//get
	echo $a[3];
	echo $b['name'];
	
	//set
	$b[0] = 100;
	print_r($b);
	
	//add
	$a[] = 200;
	print_r($a);
	
	//delete
	unset($c[3]);
	print_r($c);
	
//Duyệt mảng
	for($key = 0; $key < 5; $key++)
	echo $a[$key],'<hr>';
	
	foreach($c as $v)
	echo $v,'<hr>';
	
//Mảng 2 chiều
	$a = array(0=>array(1,2,3),1=>array(4,5,6),2=>array(7,8,9));
	
	//$a[0][2] = 30;
	

	echo $a[0][2];
	
	$d = $a[0];
	$d[2] = 30;
	
	$a[0] = $d;
		print_r($a);
	
	
	$s = 0;
	foreach($a as $v)
		foreach($v as $v2)
			$s = $s + $v2;
			
	echo $s;

	$sinhvien = array(
		'SV001' => 'Nguyễn Văn A',
		'SV002' => 'Nguyễn Văn B',
		'SV003' => 'Nguyễn Văn C',
		'SV004' => 'Nguyễn Văn D',
		'SV005' => 'Nguyễn Văn E'
	);
	  
	// Xuất ra danh sách sinh viên
	foreach ($sinhvien as $key => $tensv){
		echo $key."---".$tensv . '<br/>';
	}
		
	
?>
</body>
</html>