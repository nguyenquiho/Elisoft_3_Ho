<?php
	//Neu chua dang nhap => chuyen den trang dang nhap
	if(!isset($_SESSION['id']))header('location:?mod=login'); 
	
	$order_id = $_GET['id'];
	
	$user_id = $_SESSION['id'];
	
	//Lay thong tin don hang	
	$sql = "SELECT `name`, `address`, `email`, `mobile`, `remark` FROM `nn_order` WHERE id = {$order_id} AND `user_id` = {$user_id}";
	$rs = mysqli_query($link,$sql);
	
	if(mysqli_num_rows($rs)==0)
		echo 'Access denied !';
	else
	{
	
		$r_order = mysqli_fetch_assoc($rs);
		
		//Lay thong tin san pham cua don hang
		$sql = 'SELECT `product_id`,a.`qty`, a.`price`,`name`,`img_url` 
				FROM `nn_order_detail` a, `nn_product` b 
				WHERE a.`product_id` = b.id AND `order_id`='.$order_id;
		$rs = mysqli_query($link, $sql);
?>
<h2 class="heading colr">ORDER INFO</h2>
<div class="shoppingcart">
<ul class="tablehead">
	<li class="remove colr">Remove</li>
	<li class="thumb colr">&nbsp;</li>
	<li class="title colr">Product Name</li>
	<li class="price colr">Unit Price</li>
	<li class="qty colr">QTY</li>
	<li class="total colr">Sub Total</li>
</ul>
<?php
	$i = 0;
	$s = 0;
	while($r = mysqli_fetch_assoc($rs))
	{
		$i++;
		$s = $s + $r['price']*$r['qty'];
?>
	<ul class="cartlist <?php if($i%2==1) echo 'gray' ?>">
		<li class="remove txt"><?=$i?></li>
		<li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
		<li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
		<li class="price txt"><?=number_format($r['price'])?></li>
		<li class="qty txt"><?=$r['qty']?></li>
		<li class="total txt"><?=number_format($r['price']*$r['qty'])?></li>
	</ul>
<?php
	}
?>
<div class="clear"></div>
<div class="subtotal">
   
	<h3 class="colr"><?=number_format($s)?></h3>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<h2 class="heading colr">SHIPPING INFO</h2>
		 <ul class="forms">
			<li class="txt">Full name <span class="req">*</span></li>
			<li class="inputfield"><input name="name" type="text" class="bar" id="name" value="<?=$r_order['name']?>" readonly ></li>
		</ul>
		 <ul class="forms">
		   <li class="txt">Email <span class="req">*</span></li>
			<li class="inputfield"><input name="email" type="text" class="bar" id="email" value="<?=$r_order['email']?>" readonly ></li>
		</ul>
		 <ul class="forms">
			<li class="txt">Mobile <span class="req">*</span></li>
			<li class="inputfield"><input name="mobile" type="text" class="bar" id="mobile"  value="<?=$r_order['mobile']?>" readonly ></li>
		</ul>
		 <ul class="forms">
		   <li class="txt">Address <span class="req">*</span></li>
		   <li class="textfield">
			 <textarea name="address" readonly id="address"><?=$r_order['address']?>
			 </textarea>
		   </li>
		 </ul>
		 <ul class="forms">
		   <li class="txt">Remark<span class="req">*</span></li>
		   <li class="textfield">
			 <textarea name="remark" readonly id="remark"><?=$r_order['remark']?></textarea>
		   </li>
		 </ul>
		<div class="clear"></div> 
     <a href="javascript:history.go(-1)" class="simplebtn"><span>Back</span></a>
			 
<?php
	}
?>             
             
             
             
             
             
             
             
             
             
             
             
