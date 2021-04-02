<?php
	//Neu da dang nhap thanh cong => chuyen trang welcome
	if(isset($_SESSION['admin_id']))header('location:?mod=welcome');
	
	$msg = '';
	//Chi xử lý khi user submit form
	if(isset($_POST['email']))
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		
		//Kiem tra trong DB
		//Mã hóa password
		//$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "SELECT * FROM `nn_admin` WHERE `email`='{$email}'";
		$rs = mysqli_query($link, $sql);
		if(mysqli_num_rows($rs)==0)
		{
			$msg = 'Email hoặc password không đúng';
		}
		else// Đúng email => kiểm password
		{
			//Lay thong tin user
			$r = mysqli_fetch_assoc($rs);
			if(password_verify($pass,$r['password'])===false)//Sai password
			{
				$msg = 'Email hoặc password không đúng';
			}
			else//Đúng password
			{
				//Luu vao session
				$_SESSION['admin_id']=$r['id'];
				$_SESSION['admin_name'] = $r['name'];
				//Chuyen den trang chu
				header('location:?mod=welcome');
				
			}
		}
	}
?>
<h2 class="heading colr">Login</h2>
<div class="login">
    <div class="registrd">
    	<form action="" method="post">
        <h3>Please Sign In</h3>
        <p class="error"><?=$msg?></p>
        <ul class="forms">
            <li class="txt">Email Address <span class="req">*</span></li>
            <li class="inputfield"><input type="text" name="email" class="bar" value="<?php if(isset($_GET['email'])) echo $_GET['email']?>"></li>
        </ul>
        <ul class="forms">
            <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="pass" class="bar" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            	<button type="submit">Login</button>
                <!--<a class="simplebtn"><span>Login</span></a>--></li>
        </ul>
        </form>
    </div>
</div>
<div class="clear"></div>