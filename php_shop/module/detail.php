<?php
    $id = $_GET['id'];
    // print_r($r);
    // die();
	
	// //Cap nhat so luot xem
	// $sql = 'UPDATE `nn_product` SET `view`=`view`+1 WHERE `id`='.$id;
	// mysqli_query($link, $sql);
	//global $link;
	//Lay thong tin hien tai cua san pham
	// $sql = 'SELECT `category_id`, `name`, `price`, `desc`, `detail`, `img_url`, `qty`, `view` 
	// 		FROM `nn_product` 
	// 		WHERE `id` = '.$id;
	// $rs = mysqli_query($link, $sql);
	
	// $r =  mysqli_fetch_assoc($rs);
	
	
?>
<div class="col2_center">
        	<h4 class="heading colr"><?=$r['name']?></h4>
            <div class="prod_detail">
            	<div class="big_thumb">
                	<div id="slider2">
                        <div class="contentdiv">
                        	<img src="images/sanpham/<?=$r['img_url']?>" alt="" >
                            <a rel="example_group" href="images/sanpham/<?=$r['img_url']?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                    </div>
                    <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
                    <div style="float:left; width:189px !important; overflow:hidden;">
                    <div class="anyClass" id="paginate-slider2">
                        <ul>
                            <li><a href="#" class="toc"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
                        </ul>
                    </div>
                    </div>
                    <a href="javascript:void(null)" class="nextsmall"><img src="images/next.gif" alt="" ></a>
                    <script type="text/javascript" src="js/cont_slidr.js"></script>
                </div>
                <div class="desc">
                	<div class="quickreview">
                            <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
                            <div class="clear"></div>
                            <p class="avail"><span class="bold">Availability:</span> <?=$r['qty']?></p>
                            <p class="avail"><span class="bold">View:</span> <?=$r['view']?></p>
                          <h6 class="black">Quick Overview</h6>
                        <p>
                        	<?=$r['desc']?> 
                        </p>
                    </div>
                    <div class="addtocart">
                    	<h4 class="left price colr bold"><?=number_format($r['price'])?></h4>
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
                           <form method = 'POST' id = "form_add_cart"action="?mod=cart&act=1&id=<?=$id?>">
                            <li><input id = "val_qty" value='' name="qty" type="number" class="bar" ></li>
                            <li><a href="javascript:" onclick= "document.getElementById('form_add_cart').submit();" class="simplebtn"><span>Add To Cart</span></a></li>
                            </form>
                            <script>
                                // if(document.getElementById('form_add_cart').submit() == true){
                                //     num = document.getElementById("val_qty").value);
                                //     alert("abc");
                                // }
                                
                                
                            </script>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Product Description</h4>
                    <p>
                    	<?=$r['detail']?>. 
                    </p>
                </div>
            </div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <ul>
                <?php
					$i = 1;
					foreach($new_product_by_cat as $r)
					{
				?>
                	<li <?php if($i % 4 == 0) echo 'class="last"'; $i++; ?>>
                    	<a href="?mod=detail&id=<?=$r['id']?>" class="thumb"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a>
                        <h6 class="colr"><?=$r['name']?></h6>
                        <div class="stars">
                        	<a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_green.gif" alt="" ></a>
                            <a href="#"><img src="images/star_grey.gif" alt="" ></a>
                            <a href="#">(3) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price"><?=number_format($r['price']/1000000,2)?> Tr</p>
                        </div>
                    </li>
                <?php
					}
				?>
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