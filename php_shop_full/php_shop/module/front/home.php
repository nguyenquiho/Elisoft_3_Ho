<?php
	//Lay 10 san pham xem nhieu nhat
	$sql = 'SELECT `id`, `name`, `price`, `img_url` 
	FROM `nn_product` WHERE `active` = 1
	order by `view` desc
	limit 0,10';
	$rs_view_most = mysqli_query($link, $sql);
	
	
	//Lay 20 san pham mới nhất
	$sql = 'SELECT `id`, `name`, `price`, `img_url` 
	FROM `nn_product` WHERE `active` = 1
	order by `id` desc
	limit 0,20';
	$rs_newest = mysqli_query($link, $sql);
?>
    <h4 class="heading colr">Featured Products</h4>
    <div id="prod_scroller">
    <a href="javascript:void(null)" class="prev">&nbsp;</a>
  <div class="anyClass scrol">
        <ul>
            <?php					
                while($r = mysqli_fetch_assoc($rs_view_most))
                {
            ?>
                <li>
                    <a href="?mod=detail&id=<?=$r['id']?>"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a>
                    <h6 class="colr"><?=$r['name']?></h6>
                    <p class="price bold"><?=number_format($r['price'])?></p>
                    <a href="?mod=cart_process&act=1&id=<?=$r['id']?>" class="adcart">Add to Cart</a>
                </li>
            <?php
                }
            ?>
        </ul>
    </div>
    <a href="javascript:void(null)" class="next">&nbsp;</a>
</div>
    <div class="clear"></div>
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
                    <a href="?mod=cart_process&act=1&id=<?=$r['id']?>" class="adcart">Add to Cart</a>
                    <p class="price"><?=number_format($r['price']/1000000,2)?> Tr</p>
                </div>
            </li>
            <?php
                }
            ?>
        </ul>
    </div>