@extends('master')
@section('content')
<?php
    // foreach($product_detail as $k=>$v){
    //     echo $k.'----'.$v.'<br>';
    // }
    // print_r($product_detail['desc']);
    // die();
?>
<div class="col2">
        	<div class="col2_top">&nbsp;</div>
            <div class="col2_center">
        	<h4 class="heading colr"><?=$product_detail['name']?></h4>
            <div class="prod_detail">
            	<div class="big_thumb">
                	<div id="slider2">
                        <div class="contentdiv">
                        	<img src="asset/images/product/<?=$product_detail['img_url']?>" alt="" >
                            <a rel="example_group" href="asset/images/product/<?=$product_detail['img_url']?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                    </div>
                    <a href="javascript:void(null)" class="prevsmall"><img src="asset/images/prev.gif" alt="" ></a>
                    <div style="float:left; width:189px !important; overflow:hidden;">
                    <div class="anyClass" id="paginate-slider2">
                        <ul>
                            <li><a href="#" class="toc"><img src="asset/images/product/<?=$product_detail['img_url']?>" alt="" ></a></li>
                        </ul>
                    </div>
                    </div>
                    <a href="javascript:void(null)" class="nextsmall"><img src="asset/images/next.gif" alt="" ></a>
                    <script type="text/javascript" src="js/cont_slidr.js"></script>
                </div>
                <div class="desc">
                	<div class="quickreview">
                            <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
                            <div class="clear"></div>
                            <p class="avail"><span class="bold">Availability:</span> <?=$product_detail['qty']?></p>
                            <p class="avail"><span class="bold">View:</span> <?=$product_detail['view']?></p>
                          <h6 class="black">Quick Overview</h6>
                        <p>
                        	<?=$product_detail['desc']?> 
                        </p>
                    </div>
                    <div class="addtocart">
                    	<h4 class="left price colr bold"><?=number_format($product_detail['price'])?></h4>
                            <div class="clear"></div>
                            <ul class="margn addicons">
                                <li>
                                    <a href="#">Add to Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">Add to Compare</a>
                                </li>
                        	</ul>
                            <div class="clear"></div>
                        <ul class="left qt">
                        <li class="bold qty">QTY</li>
                           <form method = 'get' id = "form_add_cart"action="">
                            <li><input id = "val_qty" value='' name="qty" type="number" class="bar" ></li>
                            <li><a href="javascript:" onclick= "document.getElementById('form_add_cart').submit();" class="simplebtn"><span>Add To Cart</span></a></li>
                            </form>
                            <script>
                                $( "#val_qty" ).change(function() {
                                var qty = ($("#val_qty").val());
                                if(qty <= 0){
                                    alert("So luong phai lon hon 0");
                                    location.reload();
                                }
                                $('#form_add_cart').attr('action', "cart/add/<?=$product_detail->id;?>/"+qty);
                                });                                
                            </script>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Product Description</h4>
                    <p>
                    	<?=$product_detail['detail']?>. 
                    </p>
                </div>
            </div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <ul>
                    <?php $i=1; ?>
                    @foreach($new_products_by_cat as $pr)
                    @if($i % 4 == 0)<li class = 'last'>
                	@else <li>
                    @endif
                    <?php $i ++; ?>
                    	<a href="{{route('product_detail',$pr->id)}}" class="thumb"><img src="asset/images/product/<?=$pr['img_url']?>" alt="" ></a>
                        <h6 class="colr"><?=$pr['name']?></h6>
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
            <div class="tags_big">
            	<h4 class="heading">Product Tags</h4>
                <p>Add Your Tags:</p>
                <span><input name="tags" type="text" class="bar" ></span>
                <div class="clear"></div>
                <span><a href="#" class="simplebtn"><span>Add Tags</span></a></span>
                <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
            </div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="col2_botm">&nbsp;</div>
        </div>
@endsection