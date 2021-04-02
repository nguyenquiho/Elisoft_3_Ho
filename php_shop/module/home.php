<div class="col2_center">
        	<h4 class="heading colr">Featured Products</h4>
            <div id="prod_scroller">
            <a href="javascript:void(null)" class="prev">&nbsp;</a>
       	  <div class="anyClass scrol">
                <ul>
                <?php
					foreach($rs_hot as $r)
					{
				?>
                    <li>
                    	<a href="?mod=detail&id=<?=$r['id']?>"><img src="images/sanpham/<?=$r['img_url']?>" alt="<?=$r['name']?>" ></a>
                        <h6 class="colr"><?=$r['name']?></h6>
                        <p class="price bold"><?=number_format($r['price'])?></p>
                        <a href="?mod=cart&act=1&id=<?=$r['id']?>" class="adcart">Add to Cart</a>
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
					$i = 1;
					foreach($rs_new as $r)
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
                        	<a href="?mod=cart_process&act=1&id=<?=$r['id']?>" class="adcart">Add to Cart</a>
                            <p class="price"><?=number_format($r['price']/1000000,2)?> Tr</p>
                        </div>
                    </li>
                <?php
					}
				?>
                </ul>
            </div>
            </div>