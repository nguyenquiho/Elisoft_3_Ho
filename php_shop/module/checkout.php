<div class="col2_center">
                <h2 class="heading colr">BedSheets</h2>
                    <div class="shoppingcart">
            	<ul class="tablehead">
                	<li class="remove colr">Remove</li>
                    <li class="thumb colr">&nbsp;</li>
                    <li class="title colr">Product Name</li>
                    <li class="price colr">Unit Price</li>
                    <li class="qty colr">QTY</li>
                    <li class="total colr">Sub Total</li>
                </ul>
                <form id='update_qty' action="?mod=cart&act=3&id=<?=$k?>" method='post'>
                <?php

					//$cart = array(2 => 7, 50 => 1, 420 => 3, 1 => 5);
					// if(isset($_SESSION['cart']))
					// 	$cart = $_SESSION['cart'];
					// else
					// 	$cart = array();
					
					//print_r($cart);
					
                    $total = 0;

                    // $cart['1'] = "aaaa";
                    // $cart['2'] = "bbbb";
                    // $cart['3'] = "cccc";
                    // $cart['4'] = "dddd";
					foreach($cart as $k => $v)
					{
                        global $link;
                        $sql = 'select `name`,`price`,`img_url` from `nn_product` where `id`='.$k;
						$rs = mysqli_query($link, $sql);
						$r = mysqli_fetch_assoc($rs);
						//Tinh tong tien
                        $total = $total + ($r['price'] * $v);
                        //print_r($cart);
						
				?>
                    
                    <ul class="cartlist gray">
                        <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
                        <li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
                        <li class="price txt"><?=number_format($r['price'])?></li>
                        <li class="qty"><input name="<?=$k?>" type="number" value="<?=$v?>" ></li>
                        <li class="total txt"><?=number_format($r['price'] * $v)?></li>
                    </ul>
                <?php
					}
				?>
                </form>
                <!--<ul class="cartlist">
                	<li class="remove txt"><a href="#"><img src="images/delete.gif" alt="" ></a></li>
                    <li class="thumb"><a href="detail.html"><img src="images/cart_thumb.gif" alt="" ></a></li>
                    <li class="title txt"><a href="detail.html">Alexander Christie</a></li>
                    <li class="price txt">$577.00</li>
                    <li class="qty"><input name="qty" type="text" value="1" ></li>
                    <li class="total txt">$577.00</li>
                </ul>
                <ul class="cartlist gray">
                	<li class="remove txt"><a href="#"><img src="images/delete.gif" alt="" ></a></li>
                    <li class="thumb"><a href="detail.html"><img src="images/cart_thumb.gif" alt="" ></a></li>
                    <li class="title txt"><a href="detail.html">Alexander Christie</a></li>
                    <li class="price txt">$577.00</li>
                    <li class="qty"><input name="qty" type="text" value="1" ></li>
                    <li class="total txt">$577.00</li>
                </ul>
                <ul class="cartlist">
                	<li class="remove txt"><a href="#"><img src="images/delete.gif" alt="" ></a></li>
                    <li class="thumb"><a href="detail.html"><img src="images/cart_thumb.gif" alt="" ></a></li>
                    <li class="title txt"><a href="detail.html">Alexander Christie</a></li>
                    <li class="price txt">$577.00</li>
                    <li class="qty"><input name="qty" type="text" value="1" ></li>
                    <li class="total txt">$577.00</li>
                </ul>
                <ul class="cartlist gray">
                	<li class="remove txt"><a href="#"><img src="images/delete.gif" alt="" ></a></li>
                    <li class="thumb"><a href="detail.html"><img src="images/cart_thumb.gif" alt="" ></a></li>
                    <li class="title txt"><a href="detail.html">Alexander Christie</a></li>
                    <li class="price txt">$577.00</li>
                    <li class="qty"><input name="qty" type="text" value="1" ></li>
                    <li class="total txt">$577.00</li>
                </ul>-->
                <div class="clear"></div>
                <div class="subtotal">
                	<a href="listing.html" class="simplebtn"><span>Continue Shopping</span></a>
                    <a href="javascript:" onclick= "document.getElementById('update_qty').submit();" class="simplebtn"><span>Update</span></a>
                	<h3 class="colr"><?=number_format($total)?></h3>
                </div>
                <div class="clear"></div>
                <!-- <div class="sections">
                	<div class="cartitems">
                    	<h6 class="colr">Based on your selection, you may be interested in the following items:</h6>
                        <ul>
                        	<li>
                            	<div class="thumb">
                                	<a href="detail.html"><img src="images/prod_cart.gif" alt="" ></a>
                                </div>
                                <div class="desc">

                                	<a href="#" class="title bold">Alexander Christie</a>
                                    <p class="bold">$300</p>
                                    <a href="#" class="simplebtn"><span>Add to Cart</span></a>
                                    <div class="clear"></div><br >
                                    <a href="#"><u>Add to Wishlist</u></a><br >
                                    <a href="#"><u>Add to Compare</u></a>
                                </div>
                            </li>
                            <li>
                            	<div class="thumb">
                                	<a href="detail.html"><img src="images/prod_cart.gif" alt="" ></a>
                                </div>
                                <div class="desc">
                                	<a href="detail.html" class="title bold">Alexander Christie</a>
                                    <p class="bold">$300</p>
                                    <a href="cart.html" class="simplebtn"><span>Add to Cart</span></a>
                                    <div class="clear"></div><br >
                                    <a href="#"><u>Add to Wishlist</u></a><br >
                                    <a href="#"><u>Add to Compare</u></a>
                                </div>
                            </li>
                        </ul>
                        <div class="clear"></div>
                        <div class="sec_botm">&nbsp;</div>
                    </div>
                    <div class="centersec">
                    <div class="discount">
                    	<h6 class="colr">Discount Codes</h6>
                        <p>Enter your coupon code if you have one.</p>
                        <ul>
                        	<li><input name="discount" type="text" class="bar" ></li>
                            <li><a href="#" class="simplebtn"><span>Apply Coupon</span></a></li>
                        </ul>
                        <div class="clear"></div>
                        <div class="sec_botm">&nbsp;</div>
                    </div>
                  <div class="estimate">
                    	<h6 class="colr">Estimate Shipping and Tax</h6>
                    <p>Enter your destination to get a shipping estimate.</p>
                      <ul>
                       	  <li class="bold">Country</li>
                          <li>
                          	<select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                            	<option>item1</option>
                            	<option>item2</option>
                            	<option>item3</option>
                          	</select>
                          </li>
                      </ul>
                      <ul>
                       	  <li class="bold">State/Province</li>
                          <li>
                          	<select name="jumpMenu" id="jumpMenu1" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                            	<option>item1</option>
                            	<option>item2</option>
                            	<option>item3</option>
                          	</select>
                          </li>
                      </ul>
                      <ul>
                       	  <li class="bold">Zip code</li>
                          <li><input name="discount" type="text" class="bar" ></li>
                          <li><a href="#" class="simplebtn"><span>Submit</span></a></li>
                      </ul>
                      <div class="clear"></div>
                        <div class="sec_botm">&nbsp;</div>
                    </div>
                    </div>
                    <div class="grand_total">
                    	<ul>
                        	<li class="title">Subtotal</li>
                            <li class="price bold">$349.99</li>
                        </ul>
                        <ul>
                        	<li class="title"><h5>Grand total</h5></li>
                            <li class="price"><h5>$349.99</h5></li>
                        </ul>
                        <div class="clear"></div>
                        <a href="#" class="proceed right">Proceed to Checkout</a>
                        <div class="clear"></div>
                        <a href="#" class="right">Checkout with Multiple Addresses</a>
                        <div class="clear"></div>
                        <div class="sec_botm">&nbsp;</div>
                    </div>
                </div> -->
            </div>
            <div class="clear"></div>
            <div class="section">
                <h2 class="heading colr">Thông tin đặt hàng</h2>
                <form action="?mod=order" method="post">
                        <p class="error" align="center"><?=$msg?></p>
                        <ul class="forms">
                        	<li class="txt">Tên:<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="name" class="bar" value="<?php 
								if(!empty($fullname)) echo $fullname;?>" >
                            </li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Email<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="email" class="bar" value="<?php 
								if(!empty($email)) echo $email;?>"></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Mobile<span class="req"></span></li>
                            <li class="inputfield"><input type="text" name="mobile" class="bar" value="<?php 
								if(!empty($mobile)) echo $mobile;?>"></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Address<span class="req"></span></li>
                            <li class="inputfield"><textarea name="address" cols='28' rows='4' value="<?php 
								if(!empty($address)) echo $address;?>"></textarea></li>
                        </ul>
 
                        <ul class="forms">
                        	<li class="txt">&nbsp;</li>
                            <li><!--<a href="#" class="simplebtn"><span>Login</span></a> --><button type="submit">Agree</button></li>
                        </ul>
                    </div>
                    </form>
            </div>

            

                <div class="clear"></div>
            </div>
            