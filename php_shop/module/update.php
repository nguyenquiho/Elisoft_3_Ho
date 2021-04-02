<?php
// //Neu chua dang nhap => chuyen den trang dang nhap
// if(!isset($_SESSION['id']))header('location:?mod=login');

// //Neu da dang nhap => lay thong tin hien tai
// $id_user = $_SESSION['id'];

// //Update lai thong tin khi user submit
// $msg = '';
// if(isset($_POST['fullname']))
// {
// 	$fullname=$_POST['fullname'];
// 	$pass=$_POST['pass'];
// 	$repass=$_POST['repass'];
// 	$mobile= $_POST['mobile'];
// 	$gender= $_POST['gender'];
	
// 	$dob= $_POST['dob'];
// 	//Chuyen format tu dd-mm-yyyy => yyyy-mm-dd
// 	$dob = date('Y-m-d',strtotime($dob));
	
// 	$address= $_POST['address'];
	
// 	if($fullname=='')
// 		$msg = 'Bạn phải nhập name';
// 	else if(strlen($pass) > 0 && strlen($pass) < 8 )
// 		$msg = 'Pass>8 ky tu';
// 	else if($pass!=$repass)
// 		$msg = 'Pass nhap lai khong dung';
// 	else //Tat ca du lieu hop de => update DB
// 	{
// 		if($pass != '')//Neu co thay doi password
// 		{
// 			$pass=hash('sha512', $pass);
// 			$sql="UPDATE `nn_user` SET 
// 				`name`='$fullname',
// 				`password`='$pass',
// 				`mobile`='$mobile',
// 				`gender`='$gender',
// 				`dob` = '$dob',
// 				`address` = '$address'
// 			WHERE `id` = $id_user";
// 		}
// 		else
// 		{
// 			$sql="UPDATE `nn_user` SET 
// 				`name`='$fullname',
// 				`mobile`='$mobile',
// 				`gender`='$gender',
// 				`dob` = '$dob',
// 				`address` = '$address'
// 			WHERE `id` = $id_user";
// 		}
// 		//Thuc hien update
// 		$rs=mysqli_query($link,$sql);
		
// 		if($rs)
// 			$msg = 'Cập nhật thành công!';
// 		else
// 			$msg = 'Cập nhật không thành công!';
// 	}
	
// }


// $sql = 'select * from `nn_user` where `id`='.$id_user;
// $rs = mysqli_query($link, $sql);
// $r = mysqli_fetch_assoc($rs);
?>

<div class="col2_center">
                <h2 class="heading colr">Update info</h2>
                <div class="login">
                	<div class="registrd">
                    <form action="" method="post">
                    	<h3>Please input</h3>
                        <p class="error" align="center"><?=$msg?></p>
                        <ul class="forms">
                        	<li class="txt">Fullname<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="fullname" class="bar" value="<?=$r['name']?>" >
                            </li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt" >Password<span class="req"></span></li>
                            <li class="inputfield"><input type="password" name="pass" class="bar" placeholder="Để trống nếu không muốn cập nhật" ></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Retype Pass<span class="req"></span></li>
                            <li class="inputfield"><input type="password" name="repass" class="bar" ></li>
                        </ul>
                      <ul class="forms">
                          <li class="txt">Mobile<span class="req"></span></li>
                          <li class="inputfield">
                            <input type="text" name="mobile" class="bar" value="<?=$r['mobile']?>">
                          </li>
                        </ul>
                      <ul class="forms">
                          <li class="txt">Gender<span class="req"></span></li>
                          <li>
                          		<label><input <?php if($r['gender']==1) echo 'checked' ?> name="gender" type="radio" value="1"> Nam </label>
                                <label><input <?php if($r['gender']==0) echo 'checked' ?> name="gender" type="radio" value="0"> Nữ </label>
                          </li>
                        </ul>
                      <ul class="forms">
                          <li class="txt">DOB<span class="req"></span></li>
                          <li class="inputfield">
                            <input name="dob" readonly type="text" class="bar" id="dob" value="<?=date('d-m-Y',strtotime($r['dob']))?>">
                          </li>
                        </ul>
                        <ul class="forms">
                          <li class="txt">Address<span class="req"></span></li>
                          <li class="textfield">
                          	<textarea name="address"><?=$r['address']?></textarea>
                          </li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt">&nbsp;</li>
                            <li><!--<a href="#" class="simplebtn"><span>Login</span></a> --><button type="submit">Update</button></li>
                        </ul>
                    
                    </form>
                  </div>
                </div>
                <div class="clear"></div>
            </div>
<link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
 <script>
  $( function() {
    $( "#dob" ).datepicker({
	  dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
	  yearRange:'-99:+0',
    });
  } );
  </script>
