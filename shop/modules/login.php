<div class="col3_center">
                <h2 class="heading colr">Login</h2>
                <h4 class="notice-login" style="color:red;padding:10px"></h4>
                <div class="login">
                	<div class="registrd">
                        <form action="#" method = "post">
                            <h3>Please Sign In</h3>
                            <p>If you have an account with us, please log in.</p>
                            <ul class="forms">
                                <li class="txt">Email Address <span class="req">*</span></li>
                                <li class="inputfield"><input type="text" name="email" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">Password <span class="req">*</span></li>
                                <li class="inputfield"><input type="password" name="password" class="bar" ></li>
                            </ul>
                            <ul class="forms">
                                <li class="txt">&nbsp;</li>
                                <li><button type = "submit" class="simplebtn" name ="login"><span>Login</span></button> <a href="#" class="forgot">Forgot Your Password?</a></li>
                            </ul>
                        </form>
                    	
                    </div>
                    <div class="newcus">
                    	<h3>Please Sign In</h3>
                        <p>
                        	By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                        </p>
                        <a href="index.php?module=registration" class="simplebtn"><span>Register</span></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php if (isset($_POST['login'])){ 
            if (empty($_POST['email']) or empty($_POST['password'])) { ?>
                <script>$('.notice-login').text("Vui lòng không để trống!");</script>
			<?php }
			else{

				$email=$_POST['email'];
                $password=md5($_POST['password']);
				$query="SELECT * FROM fs_user WHERE email='$email' AND `password`='$password'";
                $result=mysqli_query($link,$query);
                $num=mysqli_num_rows($result);
				if ($num==1) {
						$user=mysqli_fetch_assoc($result);
						$id=$user['id'];
						$name=$user['name'];
                        $_SESSION['user']= array();
                        $_SESSION['user']['id'] = $id;
                        $_SESSION['user']['name'] = $name;
                        

					// $_SESSION['pass']=$pass;
					// header('location:index.php');
					echo "<META http-equiv=\"refresh\" content=0;URL=index.php?module=home>";	

				}
				else {
                    ?>
                    <script>$('.notice-login').text("Sai tên đăng nhập hoặc Mật khẩu! Vui lòng thử lại!");</script>
                <?php
                }//echo "<span style='color: red;'>"."Sai tên đăng nhập hoặc Mật khẩu! Vui lòng thử lại!"."</span>";
			}
		}
		?>