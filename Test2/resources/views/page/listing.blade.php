@extends('master')
@section('content')
<?php
    // foreach($product_detail as $k=>$v){
    //     echo $k.'----'.$v.'<br>';
    // }
    // print_r($product_detail['desc']);
    // die();
    if(count($products) == 0){ ?>
        <div class="col2">
<br>
<br>
<h2>Không có sản phẩm
thuộc loại {{$cat_name}}</h2>
</div>
   <?php }
    else{
?>
<div class="col2">
        	<div class="col2_top">&nbsp;</div>
            <div class="col2_center">
        	<h4 class="heading colr">Featured Products</h4>
            <div class="small_banner">
            	<a href="#"><img src="asset/images/small_banner.gif" alt="" ></a>
            </div>
            <div class="sorting">
            	<p class="left colr"><?php//$data_paginate['noi'];?> Item(s)</p>
                <ul class="right">                	
                    <li class="text">
                        <!-- {{$products->links()}} -->
                        <!-- {{ $products->onEachSide(5)->links() }} -->
                        {{ $products->render('page.paginate') }}
                    </li>
                </ul>
                <div class="clear"></div>
                <p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                    	<a <?php //if($sort >= 3) echo 'class="current"' ?> href="{{route('listing',['cat'=>$cat, 'order_by'=>'name'])}}" class="colr">Name <?php if(Session::get('name') == 'asc') echo '<img src="asset/images/asc.png" alt="asc">';if(Session::get('name') == 'desc') echo '<img src="asset/images/desc.png" alt="desc">'?></a> | 
                        <a <?php //if($sort < 3) echo 'class="current"' ?> href="{{route('listing',['cat'=>$cat, 'order_by'=>'price'])}}">Price <?php if(Session::get('price') == 'asc') echo '<img src="asset/images/asc.png" alt="asc">';if(Session::get('price') == 'desc') echo '<img src="asset/images/desc.png" alt="desc">'?></a> 
                    </li>
                </ul>
          	</div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <ul>
                <?php
					$i = 1;
                ?>
                @foreach($products as $pr)
                @if($i % 4 == 0)<li class = 'last'>
                @else <li>
                @endif
                <?php $i ++; ?>
                    	<a href="{{route('product_detail',$pr->id)}}" class="thumb"><img src="asset/images/product/{{$pr['img_url']}}" alt="" ></a>
                        <h6 class="colr">{{$pr['name']}}</h6>
                        <div class="stars">
                        	<a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="asset/images/star_grey.gif" alt="" ></a>
                            <a href="#">(3) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price"><?=number_format($pr['price']/1000000,2)?> Tr</p>
                        </div>
                    </li>
                @endforeach
                   
                </ul>
                
            </div>
            </div>
            </div>
            <?php }?>
@endsection