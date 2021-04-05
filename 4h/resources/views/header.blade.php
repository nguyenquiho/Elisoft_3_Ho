	<!-- Header -->
	<div id="masthead">
    	<div class="secnd_navi">
        	<ul class="links">
                @if(Auth::check())
                <li>Chào bạn {{Auth::user()->name}}</li>
                @else
                <li>Default welcome msg!</li>
                @endif
                <li><a href="{{route('account')}}">My Account</a></li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="{{route('cart')}}">My Cart</a></li>
                <li><a href="#">Checkout</a></li>
                @if(Auth::check())
                <li class="last"><a href="{{route('logout')}}">Log Out</a></li>
                @else
                <li class="last"><a href="{{route('login')}}">Log In</a></li>
                @endif
                
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
        	<li><input type="text" value="Search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search'; }" onfocus="if(this.value == 'Search') { this.value = ''; }" class="bar" ></li>
            <li><a href="#" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="static.html">About Us</a></li>
                <li class="dir"><a href="#">Comforters</a>
                    <ul class="bordergr big">
                    @foreach($departments as $de)
                        <li class="dir"><span class="colr navihead bold">{{$de['name']}}</span>
                            <ul>
                            @foreach($categories as $cat)
                            @if($cat['department_id'] == $de['id'])
                                <li><a href="{{route('listing',['cat'=>$cat->id, 'order_by'=>'id'])}}">{{$cat['name']}}</a></li>
                            @endif
                            @endforeach
                            </ul>
                        </li>
                    @endforeach






                        <!-- <li class="dir"><span class="colr navihead bold">Calvin Klein</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li>
                        <li class="dir"><span class="colr navihead bold">Citizen</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li>
                        <li class="dir"><span class="colr navihead bold">Calvin Klein</span>
                            <ul>
                                <li><a href="categories.html">AK Anne Klein</a></li>
                                <li><a href="categories.html">Alexander Christie</a></li>
                                <li><a href="categories.html">Arbutus</a></li>
                                <li><a href="categories.html">Armitron</a></li>
                                <li><a href="categories.html">Body Glove</a></li>
                                <li><a href="categories.html">Calvin Klein</a></li>
                            </ul>
                        </li> -->
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
                                <li class="clear"><a href="{{route('login')}}">Login Page</a></li>
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