<?php
	//Lay danh sach chung loai
	// $sql = 'SELECT `id`,`name` FROM `nn_department` WHERE `active` = 1 ORDER BY `order`';
	// $rs_dept = mysqli_query($link, $sql);
	

	

	// print_r($data_pagi);
	// die();
?>
<div class="col2_center">
        	<h4 class="heading colr">Featured Products</h4>
            <div class="small_banner">
            	<a href="#"><img src="images/small_banner.gif" alt="" ></a>
            </div>
            <div class="sorting">
            	<p class="left colr"><?=$data_paginate['noi']?> Item(s)</p>
                <ul class="right">                	
                    <li class="text">Page
                    <?php
						for($i = 1; $i <= $data_paginate['nop']; $i++)
						{
					?>
                        <a <?php if($i == $page) echo 'class="current"' ?> href="?mod=listing&cid=<?=$cid?>&sort=<?=$sort?>&page=<?=$i?>" class="colr"><?=$i?></a> 
                    <?php
						}
					?>
                    </li>
                </ul>
                <div class="clear"></div>
                <p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                    	<a <?php if($sort >= 3) echo 'class="current"' ?> href="?mod=listing&cid=<?=$cid?>&sort=<?php if($sort==3) echo 4;else echo 3 ?>" class="colr">Name <?php if($sort==3) echo '<img src="images/asc.png" alt="asc">';if ($sort==4) echo '<img src="images/desc.png" alt="desc">'?></a> | 
                        <a <?php if($sort < 3) echo 'class="current"' ?> href="?mod=listing&cid=<?=$cid?>&sort=<?php if($sort==1) echo 2;else echo 1 ?>" class="colr">Price <?php if($sort==1) echo '<img src="images/asc.png" alt="asc">';if ($sort==2) echo '<img src="images/desc.png" alt="desc">'?></a> 
                    </li>
                </ul>
          	</div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <ul>
                <?php
					$i = 1;
					foreach($rs_paginate as $r)
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
            </div>