<?php
	//id cua san pham can xem chi tiet
	if(empty($_GET['id']))
		$id = 1;
	else
		$id = $_GET['id'];
	
	//Tang so luot view
	$sql = 'UPDATE `nn_product` SET `view` = `view` + 1 WHERE `id` = '.$id;
	mysqli_query($link, $sql);
	
	//Lay thong tin chi tiet san pham
	$sql = "SELECT `category_id`,`name`,`price`,`img_url`,`qty`,`desc`,`detail`,`view`
			FROM `nn_product`
			WHERE `id`={$id}";
			
	$rs = mysqli_query($link, $sql);
	$r_product  = mysqli_fetch_assoc($rs);
	
	//Lay id loai cua san pham hien tai
	$cid = $r_product['category_id'];
	
	//Lay 20 san pham cùng loại mới nhất
	$sql = "SELECT `id`, `name`, `price`, `img_url` 
	FROM `nn_product` WHERE `active` = 1 AND `category_id` = {$cid} AND `id` != {$id}
	order by `id` desc
	limit 0,20";
	$rs_newest = mysqli_query($link, $sql);
?>
    <h4 class="heading colr"><?=$r_product['name']?></h4>
    <div class="prod_detail">
        <div class="big_thumb">
            <div id="slider2">
                <div class="contentdiv">
                    <img src="images/sanpham/<?=$r_product['img_url']?>" alt="" >
                    <a rel="example_group" href="images/sanpham/<?=$r_product['img_url']?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
              </div>
                <!--<div class="contentdiv">
                    <img src="images/detail_img2.gif" alt="" >
                    <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                </div>
                <div class="contentdiv">
                    <img src="images/detail_img3.gif" alt="" >
                    <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                </div>
                <div class="contentdiv">
                    <img src="images/detail_img4.gif" alt="" >
                    <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                </div>
                <div class="contentdiv">
                    <img src="images/detail_img5.gif" alt="" >
                    <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                </div>
              <div class="contentdiv">
                    <img src="images/detail_img6.gif" alt="" >
                    <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
              </div>-->
            </div>
            <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
            <div style="float:left; width:189px !important; overflow:hidden;">
            <div class="anyClass" id="paginate-slider2">
                <ul>
                    <li><a href="#" class="toc"><img src="images/sanpham/<?=$r_product['img_url']?>" alt="" ></a></li>
                   <!-- <li><a href="#" class="toc"><img src="images/detail_img2_small.gif" alt="" ></a></li>
                    <li><a href="#" class="toc"><img src="images/detail_img3_small.gif" alt="" ></a></li>
                    <li><a href="#" class="toc"><img src="images/detail_img4_small.gif" alt="" ></a></li>
                    <li><a href="#" class="toc"><img src="images/detail_img5_small.gif" alt="" ></a></li>
                    <li><a href="#" class="toc"><img src="images/detail_img6_small.gif" alt="" ></a></li>-->
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
                    <p class="avail"><span class="bold">Availability:</span> <?=$r_product['qty']?><br><span class="bold">View:</span> <?=$r_product['view']?></p>
                  <h6 class="black">Quick Overview</h6>
                <p>
                    <?=$r_product['desc']?>
                </p>
            </div>
            <div class="addtocart">
                <h4 class="left price colr bold"><?=number_format($r_product['price'])?></h4>
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
                    <li><input name="qty" type="number" min="1" class="bar" id="qty" ></li>
                    <li><a href="javascript:" onClick="window.location='?mod=cart_process&act=1&id=<?=$id?>&qty='+$('#qty').val()" class="simplebtn"><span>Add To Cart</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="prod_desc">
            <h4 class="heading colr">Product Description</h4>
            <p>
                <?=$r_product['detail']?> 
            </p>
        </div>
    </div>
    <div class="listing">
        <h4 class="heading colr">New Products for March 2010</h4>
        <ul>
            <?php
                $i = 0;
                while($r = mysqli_fetch_assoc($rs_newest))
                {
                    $i++;
            ?>
            <li <?php if($i % 4 == 0) echo 'class="last"' ?>>
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