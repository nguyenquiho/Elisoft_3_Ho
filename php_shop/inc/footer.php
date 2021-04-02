<div class="clear"></div>
<div class="col2_botm">&nbsp;</div>
</div>
<!-- Column1 Section -->
<div class="col1">
    <!-- Categories -->
    <div class="category">
        <div class="col1center">
            <div class="small_heading">
                <h5>Sản Phẩm</h5>
            </div>
            <div class="glossymenu">
                <?php
                // global $link;
                //di chuyen den dong 0
                //mysqli_data_seek($rs_dep,0);
                foreach($rs_dep as $r_dep)
                {
                    ?>
                    <a class="menuitem submenuheader" href="#" ><?=$r_dep['name']?></a>
                    <div class="submenu">
                        <ul>
                            <?php

                            //lay danh sach cac cataloge
                            // global $link;
                            // $sql='SELECT `id`,`name` FROM `nn_category` where `active`=1 and `department_id`='.$r_dep['id'].' ORDER By `order`';
                            // $rs_cat=mysqli_query($link,$sql);
                            foreach($rs_cat as $r_cat)
                                {
                                if($r_cat['department_id'] == $r_dep['id']){
                                ?>
                                <li><a href="?mod=listing&cid=<?=$r_cat['id']?>"><?=$r_cat['name']?></a></li>
                                <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        <div class="clear"></div>
        <div class="left_botm">&nbsp;</div>
    </div>
    <!-- My Cart Products -->
    <div class="mycart">
        <div class="col1center">
            <div class="small_heading">
                <h5>My Cart</h5>
                <div class="clear"></div>
                <span class="veiwitems">(3) Items - <a href="cart.html" class="colr">View Cart</a></span>
            </div>
            <ul>
                <li>
                    <p class="bold title">
                        <a href="detail.html">Armani Tweed Blazer</a>
                    </p>
                    <div class="grey">
                        <p class="left">QTY: <span class="bold">3</span></p>
                        <p class="right">Price: <span class="bold">$200</span></p>
                    </div>
                </li>
                <li>
                    <p class="bold title">
                        <a href="detail.html">Armani Tweed Blazer</a>
                    </p>
                    <div class="grey">
                        <p class="left">QTY: <span class="bold">3</span></p>
                        <p class="right">Price: <span class="bold">$200</span></p>
                    </div>
                </li>
                <li>
                    <p class="bold title">
                        <a href="detail.html">Armani Tweed Blazer</a>
                    </p>
                    <div class="grey">
                        <p class="left">QTY: <span class="bold">3</span></p>
                        <p class="right">Price: <span class="bold">$200</span></p>
                    </div>
                </li>
            </ul>
            <p class="right bold sub">Sub total: $600</p>
            <div class="clear"></div>
            <a href="?mod=checkout" class="simplebtn right"><span>Checkout</span></a>
        </div>
        <div class="clear"></div>
        <div class="left_botm">&nbsp;</div>
    </div>
    <div class="poll">
        <div class="col1center">
            <div class="small_heading">
                <h5>Poll</h5>
            </div>
            <p>What is your favorite Magento feature?</p>
            <ul>
                <li><input name="layerd" type="radio" value="" > Layered Navigation</li>
                <li><input name="price" type="radio" value="" > Price Rules</li>
                <li><input name="category" type="radio" value="" > Category Management</li>
                <li><input name="compare" type="radio" value="" > Compare Products</li>
            </ul>
            <a href="#" class="simplebtn"><span>Vote</span></a>
        </div>
        <div class="clear"></div>
        <div class="left_botm">&nbsp;</div>
    </div>
    <div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
<!-- Footer Section -->
<div id="footer">
    <div class="foot_inr">
        <div class="foot_top">
            <div class="foot_logo">
                <a href="#"><img src="images/footer_logo.png" alt="" ></a>
            </div>
            <div class="botm_navi">
                <ul>
                    <li><a href="#">Home page</a></li>
                    <li><a href="#">Who we are</a></li>
                    <li><a href="#">Formoda news &amp; blog</a></li>
                    <li><a href="#">Follow us on Twitter</a></li>
                    <li><a href="#">Befriend us on Facebook</a></li>
                </ul>
                <ul>
                    <li><a href="#">Shipping &amp; Returns</a></li>
                    <li><a href="#">Secure Shopping</a></li>
                    <li><a href="#">International Shipping</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Group Sales</a></li>
                </ul>
                <ul>
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">Wish List</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul>
                    <li>Contact us</li>
                    <li>T: 01230 012312</li>
                    <li>E: <a href="mailto:info@abc.com">info@abc.com</a></li>
                    <li><a href="#">Site map</a></li>
                    <li><a href="#">Terms of use &amp; privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="foot_bot">
            <div class="emailsignup">
                <h5>Join Our Mailing List</h5>
                <ul class="inp">
                    <li><input name="newsletter" type="text" class="bar" ></li>
                    <li><a href="#" class="signup">Signup</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="botm_links">
                <ul>
                    <li class="first"><a href="#">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
                <div class="clear"></div>
                <p>© 2010 DUMY. All Rights Reserved</p>
            </div>
            <div class="copyrights">
                <p>
                    Registered address: County House, 1 New Road, BTQ5 8LZ. Company No. 6172469<br >
                    Office address: NewTrends Ltd, The Byre, Berry Pomeroy, Devon, TQ9 6LH
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="topdiv">
            <a href="#top" class="top">Top</a>
        </div>
    </div>
</div>
</body>
</html>