<?php
	//print_r($_POST);
	//Tu khoa
	$kw = $_REQUEST['kw'];

	//Tim theo loai
	$cid = $_REQUEST['cid'];
	
	//Khoang gia
	$price = $_REQUEST['price'];
	
	//Mac dinh => tim theo keyword
	$cond ="`active` = 1 AND `name` LIKE '%{$kw}%'";
	
	//Neu tim theo Loai
	if($cid >0)
		$cond = $cond . " AND `category_id`={$cid}";
	
	//Neu tim theo gia
	if($price == 1)
		$cond = $cond . " AND `price`< 5000000";
		
	if($price == 2)
		$cond = $cond . " AND `price` between 5000000 and 10000000";
		
	if($price == 3)
		$cond = $cond . " AND `price` between 10000000 and 20000000";
		
	if($price == 4)
		$cond = $cond . " AND `price` between 20000000 and 30000000";
		
	if($price == 5)
		$cond = $cond . " AND `price`> 30000000";
	
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
	WHERE {$cond}";
	$rs = mysqli_query($link, $sql);
	$r = mysqli_fetch_assoc($rs);
	$noi = $r['total'];//number of items
	$nop = ceil($noi/20);//number of pages
	
	$pos = ($page - 1)*20;
	
	$order = '`name` asc';
	
	if($sort == 2)
		$order = '`name` desc';
	if($sort == 3)
		$order = '`price` asc';
	if($sort == 4)
		$order = '`price` desc';
	
	//Lay 20 san pham
	echo $sql = "SELECT `id`, `name`, `price`, `img_url` 
	FROM `nn_product` 
	WHERE {$cond}
	order by {$order}
	limit {$pos},20";
	$rs_newest = mysqli_query($link, $sql);
	
	
	//Lay danh sach loai san pham
	$sql = 'SELECT d.`name` as `d_name`, c.`id`,c.`name` 
			FROM `nn_category` c,`nn_department` d
			WHERE c.`department_id` = d.`id` AND c.`active` =1
			ORDER BY d.`order`,d.`id`, c.`order`';
	$rs_cate = mysqli_query($link, $sql);
	
	//Chuyen sang mảng 2 chiều
	$data = array();
	while($r = mysqli_fetch_assoc($rs_cate))
	{
		$data[$r['d_name']][$r['id']]=$r['name'];
	}
	//echo '<pre>';
	//print_r($data);
?>
    <h4 class="heading colr">SEARCH</h4>
   	<form action="" method="post">
         <ul class="forms">
            <li class="txt">Keyword:<span class="req">*</span></li>
            <li class="inputfield"><input name="kw" type="search" class="bar" id="kw" value="<?php if(!empty($kw)) echo $kw; ?>" ></li>
        </ul>
         <div class="clear"></div>
         <ul class="forms">
            <li class="txt">Loại:<span class="req"></span></li>
            <li class="inputfield">
            	<select name="cid">
                	<option value="0">--- Chọn loại ---</option>
                	<?php
						foreach($data as $d_name => $cate)
						{
					?>
                            <optgroup label="<?=$d_name?>">
                            	<?php
									foreach($cate as $id=>$name)
									{
								?>
                                		<option <?php if($cid==$id) echo 'selected' ?> value="<?=$id?>"><?=$name?></option>
                                <?php
									}
								?>
                            </optgroup>
                    <?php
						}
					?>
                	
                </select>
            </li>
        </ul>
         <div class="clear"></div>
         <ul class="forms">
            <li class="txt">Khoảng giá:<span class="req"></span></li>
            <li class="inputfield">
            	<select name="price">
                  <option value="0">--- Chọn khoảng giá ---</option>
            	  <option <?php if(1==$price) echo 'selected' ?> value="1">Dưới 5 triệu</option>
            	  <option <?php if(2==$price) echo 'selected' ?> value="2">Trừ 5 đến 10 triệu</option>
            	  <option <?php if(3==$price) echo 'selected' ?> value="3">Từ 10 đến 20 triệu</option>
            	  <option <?php if(4==$price) echo 'selected' ?> value="4">Từ 20 đến 30 triệu</option>
            	  <option <?php if(5==$price) echo 'selected' ?> value="5">Trên 30 triệu</option>	
                </select>
           </li>
        </ul>
         <div class="clear"></div>
         <ul class="forms">
            <li class="txt"><span class="req"></span></li>
            <li class="inputfield">
            	<button type="submit">Search</button>
           </li>
        </ul>
        
    </form>
    <div class="clear"></div>
    <div class="sorting">
        <p class="left colr"><?=$noi; ?> Item(s)</p>
        <ul class="right">                	
            <li class="text">Page
            <?php
                for($i = 1; $i <= $nop; $i++)
                {
            ?>
                    <a <?php if($i == $page) echo 'class="current"' ?> href="?mod=search&cid=<?=$cid?>&page=<?=$i?>&sort=<?=$sort?>&kw=<?=$kw?>&price=<?=$price?>" class="colr"><?=$i?></a> 
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
                <a href="?mod=search&cid=<?=$cid?>&page=1&kw=<?=$kw?>&price=<?=$price?>&sort=<?php if($sort == 1)echo 2;else echo 1 ?>" class="colr <?php if($sort < 3) echo 'current' ?>">Name 
                <?php
                    if($sort == 1) echo '<img src="images/asc.png" alt="asc" title="Ascending">';
                    if($sort == 2) echo '<img src="images/desc.png" alt="desc" title="Descending">';
                ?>
                </a> | 
                <a href="?mod=search&cid=<?=$cid?>&page=1&kw=<?=$kw?>&price=<?=$price?>&sort=<?php if($sort == 3)echo 4;else echo 3 ?>" class="colr <?php if($sort > 2) echo 'current' ?>">Price
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