<?php
	//Loai hien tai
	if(empty($_GET['cid']))
		$cid = 1;
	else
		$cid = $_GET['cid'];
	
	//Trang hien tai
	if(empty($_GET['page']))
		$page = 1;
	else
		$page = $_GET['page'];
	
	//Kieu sap xep hien tai
	if(empty($_GET['sort']))
		$sort = 1;
	else
		$sort = $_GET['sort'];
	
	//Dem so trang
	$sql = "SELECT count(*) as `total` 
	FROM `nn_product` 
	WHERE `active` = 1 AND `category_id` = {$cid}";
	$rs = mysqli_query($link, $sql);
	$r = mysqli_fetch_assoc($rs);
	$nop = ceil($r['total']/20);
	
	$pos = ($page - 1)*20;
	
	$order = '`name` asc';
	
	if($sort == 2)
		$order = '`name` desc';
	if($sort == 3)
		$order = '`price` asc';
	if($sort == 4)
		$order = '`price` desc';
	
	//Lay 20 san pham mới nhất
	echo $sql = "SELECT `id`, `name`, `price`, `img_url` 
	FROM `nn_product` 
	WHERE `active` = 1 AND `category_id` = {$cid}
	order by {$order}
	limit {$pos},20";
	$rs_newest = mysqli_query($link, $sql);
?>
    <h4 class="heading colr">Featured Products</h4>
    <div class="small_banner">
        <a href="#"><img src="images/small_banner.gif" alt="" ></a>
    </div>
    <div class="sorting">
        <p class="left colr">4 Item(s)</p>
        <ul class="right">                	
            <li class="text">Page
            <?php
                for($i = 1; $i <= $nop; $i++)
                {
            ?>
                    <a <?php if($i == $page) echo 'class="current"' ?> href="?mod=product&cid=<?=$cid?>&page=<?=$i?>&sort=<?=$sort?>" class="colr"><?=$i?></a> 
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
                <a href="?mod=product&cid=<?=$cid?>&page=1&sort=<?php if($sort == 1)echo 2;else echo 1 ?>" class="colr <?php if($sort < 3) echo 'current' ?>">Name 
                <?php
                    if($sort == 1) echo '<img src="images/asc.png" alt="asc" title="Ascending">';
                    if($sort == 2) echo '<img src="images/desc.png" alt="desc" title="Descending">';
                ?>
                </a> | 
                <a href="?mod=product&cid=<?=$cid?>&page=1&sort=<?php if($sort == 3)echo 4;else echo 3 ?>" class="colr <?php if($sort > 2) echo 'current' ?>">Price
                 <?php
                    if($sort == 3) echo '<img src="images/asc.png" alt="asc">';
                    if($sort == 4) echo '<img src="images/desc.png" alt="desc">';
                ?>
                </a> 
            </li>
        </ul>
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
                    <a href="?mod=cart_process&act=1&id=<?=$r['id']?>" class="adcart">Add to Cart</a>
                    <p class="price"><?=number_format($r['price']/1000000,2)?> Tr</p>
                </div>
            </li>
            <?php
                }
            ?>
        </ul>
    </div>