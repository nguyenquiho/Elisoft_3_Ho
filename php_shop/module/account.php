<?php
	// //Neu chua dang nhap => chuyen den trang dang nhap
	// if(!isset($_SESSION['id']))header('location:?mod=login');

	// $id_user = $_SESSION['id'];

	//Lay tat ca thong tin
	// $sql = 'select * from `nn_user` WHERE `id`='.$id_user;
	// $rs = mysqli_query($link, $sql);

	// $r = mysqli_fetch_assoc($rs);

?>
<div class="col2_center">
        	<h4 class="heading colr">My Account</h4>
            <div class="account">
            	<ul class="acount_navi">
                    <li><a href="#" class="selected">Account Home</a></li>
                    <li><a href="#">Order History</a></li>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Wishlist</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
                <div>&nbsp;</div>

                <div class="avt-user">
                <img src="<?=$r['avt']?>" width='100' height='100' alt=""><br><br>
                <button id='btn-update-avt'>Thay đổi</button>
                </div>
                <form id='form_update_avt' action="?mod=account&act=upload_avt" method="post" enctype="multipart/form-data">
					&nbsp Upload Avatar: <input type="file" name="fileUpload" id="fileUpload"><br><br>
					<input type="submit" name="submit" value="Upload"><br>
				</form>

                <div class="account_title">
                    <h6 class="bold"><?=$r['name']?></h6>
                    <p>
                        From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
                    </p>
                </div>
                <div class="clear"></div>
                <div class="acount_info">
                    <h6 class="heading bold colr">Account Information</h6>
                    <div class="big_sec left">
                        <div class="big_small_sec left">
                        	<div class="headng">
                                <h6 class="bold">Contact Information</h6>
                                <a href="#" class="right bold">Edit</a>
                            </div>
                            <p class="bold"><?=$r['name']?></p>
                            <a href="#"><?=$r['email']?></a><br >
                            <a href="?mod=update">Change Password</a>
                        </div>

                        <div class="clear"></div>
                        <div class="botm_big">&nbsp;</div>
                    </div>
                    <div class="clear"></div>
                    <div class="big_sec left">
                        <div class="big_small_sec left">
                        	<h6 class="bold">Default Billing Address</h6>
                            <p><?=$r['address']?></p>
                            <a href="?mod=update"><u>Edit Address</u></a>
                        </div>

                        <div class="clear"></div>
                        <div class="botm_big">&nbsp;</div>
                    </div>
                </div>
                <h6 class="heading bold colr">Recent Orders</h6>
                <div class="account_table">
                	<ul class="headtable">
                    	<li class="order bold">Order</li>
                        <li class="date bold">Date</li>
                        <li class="ship bold">Ship to</li>
                        <li class="ordertotal bold">Order Total</li>
                        <li class="status bold last">Status</li>
                        <li class="action bold last">&nbsp;</li>
                    </ul>
                    <?php
                        foreach($orders as $order){ ?>
                    <ul class="contable">
                    	<li class="order"><?=$order['id']; ?></li>
                        <li class="date"><?=$order['create_at']; ?></li>
                        <li class="ship"><?=$order['name']; ?></li>
                        <li class="ordertotal">$ 35.9</li>
                        <li class="status last">
                        <?php if($order['status'] == 0 ){echo "Mới đặt";}
                                if($order['status'] == 1 ){echo "Đã xác nhận";} 
                                if($order['status'] == 2 ){echo "Đang giao";}  
                                if($order['status'] == 3 ){echo "Đã giao";}
                                if($order['status'] == 4 ){echo "Hoàn tất";}
                        ?>
                        </li>
                        <li class="action last"><a href="?mod=order_detail&id=<?=$order['id']; ?>" class="first">View</a><?php if($order['status'] == 0 ){?><a href="#">Edit</a><?php } ?></li>
                    </ul>

                    <?php    }
                    ?>

                    
                </div>
                <div class="view_tags">
                	<div class="viewssec">
                    	<h4 class="heading colr">Recent Views</h4>
                    	<ul>
                        	<li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="ratingsblt">
                                	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                                </div>
                            </li>
                            <li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="ratingsblt">
                                	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                                </div>
                            </li>
                            <li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="ratingsblt">
                                	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                                </div>
                            </li>
                            <li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="ratingsblt">
                                	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_green.gif" alt="" ></a>
                                    <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tagssec">
                    	<h4 class="heading colr">My Recent Tags</h4>
                    	<ul>
                        	<li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="tgs">
                                	<p class="colr tag">Tags: </p>
                                    <a href="#">Leatehr Bags, </a>
                                    <a href="#">Bags, </a>
                                    <a href="#">Laptop Bags</a>
                                </div>
                            </li>
                            <li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="tgs">
                                	<p class="colr tag">Tags: </p>
                                    <a href="#">Leatehr Bags, </a>
                                    <a href="#">Bags, </a>
                                    <a href="#">Laptop Bags</a>
                                </div>
                            </li>
                            <li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="tgs">
                                	<p class="colr tag">Tags: </p>
                                    <a href="#">Leatehr Bags, </a>
                                    <a href="#">Bags, </a>
                                    <a href="#">Laptop Bags</a>
                                </div>
                            </li>
                            <li>
                            	<h5 class="bullet">1</h5>
                                <h5 class="title">Product Name</h5>
                                <div class="clear"></div>
                                <div class="tgs">
                                	<p class="colr tag">Tags: </p>
                                    <a href="#">Leatehr Bags, </a>
                                    <a href="#">Bags, </a>
                                    <a href="#">Laptop Bags</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>