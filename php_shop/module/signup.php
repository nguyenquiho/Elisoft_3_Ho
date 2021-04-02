<div class="col2_center">
                <h2 class="heading colr">Register</h2>
                <div class="login">
                	<div class="registrd">
                    <form action="" method="post">
                    	<h3>Please input</h3>
                        <p class="error" align="center"><?=$msg?></p>
                        <ul class="forms">
                        	<li class="txt">Fullname<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="fullname" class="bar" value="<?php 
								if(!empty($fullname)) echo $fullname;?>" >
                            </li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Email<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="email" class="bar" value="<?php 
								if(!empty($email)) echo $email;?>"></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt" >Password<span class="req"></span></li>
                            <li class="inputfield"><input type="password" name="pass" class="bar" placeholder="Tối thiểu 8 ký tự" ></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Retype Pass<span class="req"></span></li>
                            <li class="inputfield"><input type="password" name="repass" class="bar" ></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Mobile<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="mobile" class="bar" value="<?php 
								if(!empty($mobile)) echo $mobile;?>"></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">&nbsp;</li>
                            <li><!--<a href="#" class="simplebtn"><span>Login</span></a> --><button type="submit">Register</button></li>
                        </ul>
                    </div>
                    </form>
                  
                </div>
                <div class="clear"></div>
            </div>