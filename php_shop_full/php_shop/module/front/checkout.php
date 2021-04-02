<?php
	//Neu chua dang nhap => chuyen den trang dang nhap
	if(!isset($_SESSION['id']))header('location:?mod=login'); 
	
	$cart = $_SESSION['cart'];
	if(count($cart)>0)
	{
	
		$id = $_SESSION['id'];
		
		$sql = 'select * from `nn_user` where `id` ='.$id;
		$rs = mysqli_query($link,$sql);
		$r_user = mysqli_fetch_assoc($rs);
		
		//Khi submit form
		if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];
			$remark = $_POST['remark'];
			
			//Insert vao bang order
			$sql = "insert into `nn_order` values(NULL,'$id',now(),'$name','$address','','$email','$mobile','$remark','0')";
			mysqli_query($link, $sql);
			
			//Insert vao bang order_detail
			$order_id = mysqli_insert_id($link);
			foreach($cart as $k=>$v)
			{
				//Lay gia san pham
				$sql = 'select `price` from `nn_product` where `id`='.$k;
				$rs = mysqli_query($link,$sql);
				$r = mysqli_fetch_assoc($rs);
				$price = $r['price'];
				
				//Insert
				$sql = "insert into `nn_order_detail` values('$order_id','$k','$v','$price')";
				mysqli_query($link,$sql);				
			}
			//Xoa gio hang
			unset($_SESSION['cart']);
		?>
        	<script>
				alert('Bạn đã đặt hàng thành công');
				window.location='?mod=account';
			</script>
        <?php
		}

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
        foreach($cart as $k=>$v)
        {
            $i++;
            //Truy van lay thong tin (Ten, Gia, Hinh) cua tung san pham
            $sql = 'SELECT `name`,`img_url`,`price` FROM `nn_product` WHERE `id`='.$k;
            $rs = mysqli_query($link, $sql);
            $r = mysqli_fetch_assoc($rs);
            $s = $s + $r['price']*$v;
    ?>
        <ul class="cartlist <?php if($i%2==1) echo 'gray' ?>">
            <li class="remove txt"><?=$i?></li>
            <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
            <li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
            <li class="price txt"><?=number_format($r['price'])?></li>
            <li class="qty txt"><?=$v?></li>
            <li class="total txt"><?=number_format($r['price']*$v)?></li>
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
        <form action="" method="post" id="checkout">
             <ul class="forms">
                <li class="txt">Full name <span class="req">*</span></li>
                <li class="inputfield"><input name="name" type="text" class="bar" id="name" value="<?=$r_user['name']?>" ></li>
            </ul>
             <ul class="forms">
               <li class="txt">Email <span class="req">*</span></li>
                <li class="inputfield"><input type="text" name="email" class="bar" id="email" value="<?=$r_user['email']?>" ></li>
            </ul>
             <ul class="forms">
                <li class="txt">Mobile <span class="req">*</span></li>
                <li class="inputfield"><input type="text" name="mobile" class="bar" id="mobile"  value="<?=$r_user['mobile']?>" ></li>
            </ul>
             <ul class="forms">
               <li class="txt">Address <span class="req">*</span></li>
               <li class="textfield">
                 <textarea name="address" id="address"><?=$r_user['address']?>
                 </textarea>
               </li>
             </ul>
             <ul class="forms">
               <li class="txt">Remark<span class="req">*</span></li>
               <li class="textfield">
                 <textarea name="remark" id="remark"></textarea>
               </li>
             </ul>
         </form>
            <div class="clear"></div>
             <a href="?mod=cart" class="simplebtn"><span>Update</span></a>
                 <a href="javascript:" onClick="$('#name,#email,#mobile,#address,#remark').val('')" class="simplebtn"><span>Clear form</span></a>
        <a href="javascript:" onClick="document.getElementById('checkout').reset()" class="simplebtn"><span>Reset</span></a>
        <a href="javascript:" onClick="document.getElementById('checkout').submit()" class="simplebtn"><span>Checkout</span></a>

<?php
	}
	else //Chua co san pham
		echo 'Giỏ hàng đang trống. Hãy thêm sản phẩm vào giò hàng';
?>