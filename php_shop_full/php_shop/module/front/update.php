<?php
	//Neu chua dang nhap => chuyen den trang dang nhap
	if(!isset($_SESSION['id']))header('location:?mod=login'); 
	
	$id = $_SESSION['id'];

	$msg = '';
	if(isset($_POST['name']))
	{
		//print_r($_POST);
		

		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$repass = $_POST['repass'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		//Chuyen format tu dd/mm/yyyy => yyyy-mm-dd
		$d = substr($dob,0,2);
		$m = substr($dob,3,2);
		$y = substr($dob,6,4);
		$dob = "$y-$m-$d";
		$address = $_POST['address'];
		
		if($name == '')
			$msg = 'Bạn phải nhập họ tên';
		elseif($pass != '' && strlen($pass)<6)
			$msg = 'Mật khẩu tối thiểu 6 ký tự';
		elseif($pass != $repass)
			$msg = 'Mật khẩu nhập lại không đúng';
		else{//Hop le
			
			//Update trong DB
			if($pass !== '')//Co thay doi password
			{
				//Ma hoa password
				$pass_hash = password_hash($pass,PASSWORD_DEFAULT);
				$sql = "UPDATE `nn_user` SET
					`name` = '$name',
					`password` = '$pass_hash',
					`mobile` = '$mobile',
					`gender` = '$gender',
					`dob` = '$dob',
					`address` = '$address'
					WHERE `id` = $id";
			}
			else //Khong thay doi password
			{
				$sql = "UPDATE `nn_user` SET
					`name` = '$name',
					`mobile` = '$mobile',
					`gender` = '$gender',
					`dob` = '$dob',
					`address` = '$address'
					WHERE `id` = $id";
			}
			mysqli_query($link, $sql);
			$msg = 'Cập nhật thành công';
		}
	}
	
	$sql = 'select * from `nn_user` where `id` ='.$id;
	$rs = mysqli_query($link,$sql);
	$r = mysqli_fetch_assoc($rs);
?>
<h2 class="heading colr">Update</h2>
<div class="login">
    <div class="registrd">
    	<form action="" method="post" onSubmit="return checkData()">
    	  <p class="error"><?=$msg?></p>
         <ul class="forms">
            <li class="txt">Full name <span class="req">*</span></li>
            <li class="inputfield"><input name="name" type="text" class="bar" id="name" value="<?=$r['name']?>" ></li>
        </ul>
         <ul class="forms">
           <li class="txt">Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="pass" class="bar" id="pass" ><br>
            <em>(Để trống nếu không muốn cập nhật password)</em></li>
        </ul>
         <ul class="forms">
            <li class="txt">Confirm Password <span class="req">*</span></li>
            <li class="inputfield"><input type="password" name="repass" class="bar" id="repass" ></li>
        </ul>
         <ul class="forms">
            <li class="txt">Mobile <span class="req">*</span></li>
            <li class="inputfield"><input type="text" name="mobile" class="bar" id="mobile"  value="<?=$r['mobile']?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Gender <span class="req">*</span></li>
            <li>
            	<label><input type="radio" <?php if($r['gender']==1) echo 'checked';?> value="1" name="gender"> Nam </label>
                <label><input type="radio" <?php if($r['gender']==0) echo 'checked';?> value="0" name="gender"> Nữ </label>
            </li>
        </ul>
        <ul class="forms">
            <li class="txt">DOB <span class="req">*</span></li>
            <li class="inputfield"><input type="text" name="dob" class="bar" id="dob" value="<?=date('d/m/Y',strtotime($r['dob']))?>" ></li>
        </ul>
        <ul class="forms">
            <li class="txt">Address <span class="req">*</span></li>
            <li class="textfield"><textarea name="address"><?=$r['address']?></textarea></li>
        </ul>
        
        <ul class="forms">
            <li class="txt">&nbsp;</li>
            <li>
            	<button type="submit">Update</button>
                <a href="?mod=account" class="simplebtn"><span>Back</span></a>
               </li>
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
		if($('#pass').val()!='' && $('#pass').val().length<6)
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