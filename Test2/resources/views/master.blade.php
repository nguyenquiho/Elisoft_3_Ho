<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Estore 16</title>
<!-- // Stylesheets // -->
<base href="{{asset('')}}">
<link rel="stylesheet" href="asset/css/style.css" type="text/css" >
<link rel="stylesheet" href="asset/css/nivo-slider.css" type="text/css" media="screen" >
<link rel="stylesheet" href="asset/css/default.advanced.css" type="text/css" >
<link rel="stylesheet" href="asset/css/contentslider.css" type="text/css"  >
<link rel="stylesheet" href="asset/css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" >
<link rel="stylesheet" href="asset/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css" media="screen" >

<!-- // Javascript // -->
<script type="text/javascript" src="asset/js/jquery.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.min14.js"></script>
<script type="text/javascript" src="asset/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="asset/js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="asset/js/scroll.js"></script>
<script type="text/javascript" src="asset/js/ddaccordion.js"></script>
<script type="text/javascript" src="asset/js/acordn.js"></script>
<script type="text/javascript" src="asset/js/cufon-yui.js"></script>
<script type="text/javascript" src="asset/js/Trebuchet_MS_400-Trebuchet_MS_700-Trebuchet_MS_italic_700-Trebuchet_MS_italic_400.font.js"></script>
<script type="text/javascript" src="asset/js/cufon.js"></script>
<script type="text/javascript" src="asset/js/contentslider.js"></script>
<script type="text/javascript" src="asset/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="asset/js/lightbox.js"></script>
</head>

<body>
    <?php
    //print_r($_REQUEST['module']);
    ?>
<a name="top"></a>
<div id="wrapper_sec">
	<!-- Header -->
    @include('header')
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
        @yield('content')
        <!-- Column1 Section -->
        @if(!isset($_REQUEST['module']) || $_REQUEST['module'] != 'login' && $_REQUEST['module'] != 'signup' && $_REQUEST['module'] != 'cart' && $_REQUEST['module'] != 'account')
        @include('rightside')
        @endif
    </div>
    <div class="clear"></div>
</div>
<!-- Footer Section -->
@include('footer')
</body>
</html>