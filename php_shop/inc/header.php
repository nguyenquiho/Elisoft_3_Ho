<?php
//start session
// session_start();
//cache output xu ly loi cho header()


// require('lib/db.php');

//global $link;
//lấy danh sach cac chung loai
// $sql='SELECT `id`,`name` FROM `nn_department` where `active`=1 order by `order`';
// $rs_dep=mysqli_query($link,$sql);
//lấy 10 san pham quan tam nhieu nhat - view lon nhat
// global $link;
// $sql='SELECT `id` ,`name`,`img_url`,`price` FROM `nn_product` WHERE `active`=1 ORDER BY `view` desc LIMIT 0,10';
// $rs_prod=mysqli_query($link,$sql);
// //lây 20 sap moi nhat
// $sql='SELECT `id`,`name`,`price`, `img_url` FROM `nn_product` WHERE `active`=1 ORDER BY `id` DESC LIMIT 0,20';
// $rs_prod20=mysqli_query($link,$sql);
// print_r($rs_dep);
// die();

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Estore 16</title>
    <!-- // Stylesheets // -->
    <link rel="stylesheet" href="css/style.css" type="text/css" >
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" >
    <link rel="stylesheet" href="css/default.advanced.css" type="text/css" >
    <link rel="stylesheet" href="css/contentslider.css" type="text/css"  >
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" >
    <!-- // Javascript // -->
    <!--<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.min14.js"></script>-->
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
    <script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    <script type="text/javascript" src="js/ddaccordion.js"></script>
    <script type="text/javascript" src="js/acordn.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/Trebuchet_MS_400-Trebuchet_MS_700-Trebuchet_MS_italic_700-Trebuchet_MS_italic_400.font.js"></script>
    <script type="text/javascript" src="js/cufon.js"></script>
    <script type="text/javascript" src="js/contentslider.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
    <script type="text/javascript" src="js/lightbox.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
<a name="top"></a>
<div id="wrapper_sec">
    <!-- Header -->
    <div id="masthead">
        <div class="secnd_navi">
            <ul class="links">
                <li>
                    <?php
                    if(isset($_SESSION['id']))
                    {
                        //$sql="SELECT `name` FROM `nn_user` WHERE  `id`=".$_SESSION['id'];
                        //$rs=mysqli_query($link,$sql);
                        //$r=mysqli_fetch_assoc($rs);
                        //neu nhu da dang nhap
                        //echo 'Xin chao '.$r['name'];
                        echo 'Xin chao '.$_SESSION['name'];

                    }
                    ?>
                </li>
                <?php
                if(isset($_SESSION['id']))
                {
                    ?>
                    <li><a href="?mod=account">My Account</a></li>
                    <?php
                }
                ?>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="?mod=cart">My Cart</a></li>
                <li><a href="#">Checkout</a></li>
                <li><a href="?mod=signup">Register</a></li>
                <li class="last">
                    <?php
                    //neu nhu chua dang nhap
                    if(!isset($_SESSION['id']))
                        echo '<a href="?mod=login">Log In</a>';
                    else
                        echo  '<a href="?mod=logout">Log Out</a>';
                    ?>

                </li>
            </ul>
            <ul class="network">
                <li>Share with us:</li>
                <li><a href="#"><img src="images/linkdin.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/rss.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/twitter.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/facebook.gif" alt="" ></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="logo">
            <a href="index.html"><img src="images/sanpham/logo.png" width='150px'  alt="" ></a>
            <h5 class="slogn">The best watches for all</h5>
        </div>
        <ul class="search">
            <li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" ></li>
            <li><a href="#" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="static.html">Giới thiệu</a></li>
                <li class="dir"><a href="#">Sản phẩm</a>
                    <ul class="bordergr big">
                        <?php
                        foreach($rs_dep as $r_dep)
                        {
                            //lay danh sach cac cataloge
                            // $sql='SELECT `id`,`name` FROM `nn_category` where `active`=1 and `department_id`='.$r_dep['id'].' ORDER By `order`';
                            // $rs_cat=mysqli_query($link,$sql);
                            ?>
                            <li class="dir"><span class="colr navihead bold"><?=$r_dep['name']?></span>
                                <ul>
                                    <?php
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
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </li>
                <li><a href="login.html">BedSheets</a></li>
                <li class="dir"><a href="#">Pages</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Pages</span>
                            <ul>
                                <li class="clear"><a href="index.html">Home Page</a></li>
                                <li class="clear"><a href="account.html">Account Page</a></li>
                                <li class="clear"><a href="cart.html">Shopping Cart Page</a></li>
                                <li class="clear"><a href="categories.html">Categories</a></li>
                                <li class="clear"><a href="detail.html">Product Detail Page</a></li>
                                <li class="clear"><a href="listing.html">Listing Page</a></li>
                                <li class="clear"><a href="login.html">Login Page</a></li>
                                <li class="clear"><a href="static.html">Static Page</a></li>
                                <li class="clear"><a href="contact.html">Contact Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <li class="dir"><a href="#">Themes</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Themes</span>
                            <ul>
                                <li class="clear"><a href="../blue/index.html">Blue</a></li>
                                <li class="clear"><a href="../green/index.html">Green</a></li>
                                <li class="clear"><a href="../orange/index.html">Orange</a></li>
                                <li class="clear"><a href="index.html">Purple</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="lang">
                <li>Your Language:</li>
                <li><a href="#"><img src="images/flag1.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/flag2.gif" alt="" ></a></li>
                <li><a href="#"><img src="images/flag3.gif" alt="" ></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Banner Section -->
    <!--<div id="banner">
        <div id="slider4" class="nivoSlider">
            <a href="detail.html"><img src="images/banner1.jpg" alt="" ></a>
            <a href="detail.html"><img src="images/banner2.jpg" alt="" ></a>
            <a href="detail.html"><img src="images/banner3.jpg" alt="" ></a>
            <a href="detail.html"><img src="images/banner4.jpg" alt="" ></a>
        </div>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="js/nivo.js"></script>
    </div>-->
    <div class="clear"></div>
    <!-- Scroolling Products -->
    <div class="content_sec">
        <!-- Column2 Section -->
        <div class="col2">
            <div class="col2_top">&nbsp;</div>