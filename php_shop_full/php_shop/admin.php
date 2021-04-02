<?php
	session_start();
	ob_start();//cache output, de su dung header(...)
	require('lib/db.php');
	
	//Lay ds chung loai
	$sql = 'SELECT `id`, `name` FROM `nn_department` WHERE `active` = 1 order by `order`';
	$rs_dep = mysqli_query($link, $sql);
	
	//Lay cau hoi poll dang active
	$sql = 'SELECT `id`,`content` FROM `nn_question` WHERE `active`=1';
	$rs = mysqli_query($link, $sql);
	$r_question = mysqli_fetch_assoc($rs);
	
	//Lay cac lua chon cua cau hoi 
	$sql = 'SELECT `id`,`content`,`vote` FROM `nn_answer` WHERE `question_id`='.$r_question['id'];
	$rs_answer = mysqli_query($link, $sql);
	
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Admin - Estore 16</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" href="css/admin_style.css" type="text/css" >
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" >
<link rel="stylesheet" href="css/default.advanced.css" type="text/css" >
<link rel="stylesheet" href="css/contentslider.css" type="text/css"  >
<link rel="stylesheet" href="css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" >
<!-- // Javascript // -->
<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript" src="js/acordn.js"></script>
<script type="text/javascript" src="js/contentslider.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
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
					//Neu da dang nhap
					if(isset($_SESSION['admin_id']))
					{
						//$sql = 'SELECT `name` FROM `nn_user` WHERE `id`='.$_SESSION['id'];
						//$rs = mysqli_query($link,$sql);
						//$r = mysqli_fetch_assoc($rs);
						
						echo 'Welcome ',$_SESSION['admin_name'],'!';
					}
                ?>
                </li>
                <li><a href="?mod=account">My Account</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="?mod=cart">My Cart</a></li>
                <li><a href="?mod=checkout">Checkout</a></li>
                <li class="last">
				<?php
					if(!isset($_SESSION['admin_id']))
						echo '<a href="?mod=login">Log In</a>';
					else
						echo '<a href="?mod=logout">Log Out</a>';
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
        	<a href="index.html"><img src="images/logo.png" alt="" ></a>
            <h5 class="slogn">The best watches for all</h5>
        </div>
        <ul class="search">
        	<li>
            <form action="?mod=search" method="post" id="search">
            	<input type="search" id="searchBox" value="<?php if(isset($_REQUEST['kw']))echo $_REQUEST['kw'] ?>" name="kw" placeholder="Nhập từ khóa" class="bar" >
            </form>
            </li>
            <li><a href="javascript:" onClick="$('#search').submit()" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="index.php">Home</a></li>
                <li><a href="?mod=dept">Chủng loại</a></li>
                <li><a href="?mod=cate">Loại sản phẩm</a></li>
                <li><a href="?mod=product">Sản phẩm</a></li>                
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
        <div class="col3">
        	<div class="col3_top">&nbsp;</div>
            <div class="col3_center">
				<?php				
                    if(empty($_GET['mod']))
                        $mod = 'login';
                    else
                        $mod = $_GET['mod'];
                    
                    include("module/back/{$mod}.php");
                ?>
            </div>
            <div class="clear"></div>
            <div class="col3_botm">&nbsp;</div>
        </div>
    <!-- Column1 Section --></div>
    <div class="clear"></div>
</div>
<!-- Footer Section -->
	<div id="footer">
    	<div class="foot_inr">
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