<?php
	$msg = '';
	if(isset($_POST['name']))
	{
		//print_r($_POST);

		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$repass = $_POST['repass'];
		$mobile = $_POST['mobile'];
		
		if($name == '')
			$msg = 'Bạn phải nhập họ tên';
		elseif(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
			$msg = 'Email không hợp lệ';
		elseif(strlen($pass)<6)
			$msg = 'Mật khẩu tối thiểu 6 ký tự';
		elseif($pass != $repass)
			$msg = 'Mật khẩu nhập lại không đúng';
		else{//Hop le
			//Ma hoa password
			$pass_hash = password_hash($pass,PASSWORD_DEFAULT);
			//Insert vao DB
			$sql = "insert into `nn_user`(`name`,`email`,`password`,`mobile`) values('$name','$email','$pass_hash','$mobile')";
			if(mysqli_query($link, $sql)===false)
				$msg = 'Email này đã có trong hệ thống. Hãy dùng email khác';
			else
				{
					$msg = 'Đăng ký thành công';
?>
				<script>
					setTimeout("window.location='?mod=login&email=<?=$email?>'",2000);
				</script>
<?php
				}
		}
	}
?>
<h2 class="heading colr">Sign up</h2>
<div class="login">
    <div class="registrd">
    	<form action="" method="post" onSubmit="return checkData()">
    	  <p class="error"><?=$msg?></p>
         <ul class="forms">
            <li class="txt">Full name <span class="req">*</span></li>
            <li class="inputfield"><input name="name" type="text" class="bar" id="name" value="<?php if(!empty($name)) echo $name; ?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Email Address <span class="req">*</span></li>
            <li class="inputfield"><input name="email" pattern="[a-z0-9._-]{2,}@[a-z0-9.-]{1,}\.[a-z]{2,}" type="text" class="bar" id="email" value="<?php if(!empty($email)) echo $email; ?>" title="Email không hợp lệ" required></li>
        </ul>
        <ul class="forms">
            <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="pass" class="bar" id="pass" ></li>
        </ul>
         <ul class="forms">
            <li class="txt">Confirm Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="repass" class="bar" id="repass" ></li>
        </ul>
         <ul class="forms">
            <li class="txt">Mobile <span class="req">*</span></li>
            <li class="inputfield"><input type="text" name="mobile" class="bar" id="mobile" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            	<button type="submit">Sign up</button>
                <!--<a class="simplebtn"><span>Login</span></a>-->
                <a href="#" class="forgot">Forgot Your Password?</a></li>
        </ul>
        </form>
    </div>
</div>
<div class="clear"></div>
<script>
	function checkData()
	{
		//Kiem tra name
		if($('#name').val()=='')
		{
			alert('Bạn phải nhập họ tên');
			$('#name').focus();
			return false;
		}
		//Kiem tra email bang Regular Expression
		/*var pat = /^[a-z0-9._-]{2,}@[a-z0-9.-]{1,}\.[a-z]{2,}$/i;
		if(pat.test($('#email').val())==false)
		{
			alert('Email không hợp lệ');
			$('#email').focus();
			return false;
		}*/
		//Kiem tra mat khau
		if($('#pass').val().length<6)
		{
			alert('Mật khẩu tối thiểu 6 ký tự');
			$('#pass').select();
			return false;
		}
		//Confirm password
		if($('#pass').val()!= $('#repass').val())
		{
			alert('Mật khẩu nhập lại không đúng');
			$('#repass').select();
			return false;
		}
		return true;
	}
</script>