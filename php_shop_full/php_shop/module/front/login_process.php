<?php
	//print_r($_POST);
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	//Kiem tra trong DB
	//Mã hóa password
	//$pass = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "SELECT * FROM `nn_user` WHERE `email`='{$email}'";
	$rs = mysqli_query($link, $sql);
	if(mysqli_num_rows($rs)==0)
	{
		echo 'Email hoặc password không đúng';
	}
	else// Đúng email => kiểm password
	{
		//Lay thong tin user
		$r = mysqli_fetch_assoc($rs);
		if(password_verify($pass,$r['password'])===false)//Sai password
		{
			echo 'Email hoặc password không đúng';
		}
		else//Đúng password
		{
			//Luu vao session
			$_SESSION['id']=$r['id'];
			$_SESSION['name'] = $r['name'];
			//Chuyen den trang chu
			header('location:?mod=home');
			
		}
	}
?>
<script>
	setTimeout("window.location='?mod=login&email=<?=$email?>'",2000);
</script>