<?php
	//$cart = array(1=>3,420=>2,200=>5,442=>7);
	if(isset($_SESSION['cart']))
		$cart = $_SESSION['cart'];
	else
		$cart = array();
		
	print_r($cart);
?>
<h2 class="heading colr">BedSheets</h2>
<div class="shoppingcart">
<ul class="tablehead">
    <li class="remove colr">Remove</li>
    <li class="thumb colr">&nbsp;</li>
    <li class="title colr">Product Name</li>
    <li class="price colr">Unit Price</li>
    <li class="qty colr">QTY</li>
    <li class="total colr">Sub Total</li>
</ul>
<form action="?mod=cart_process&act=2" method="post" id="cart">
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
        <li class="remove txt"><a onClick="return confirm('Sure ?')" href="?mod=cart_process&act=3&id=<?=$k?>"><img src="images/delete.gif" alt="" ></a></li>
        <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?=$r['img_url']?>" alt="" ></a></li>
        <li class="title txt"><a href="detail.html"><?=$r['name']?></a></li>
        <li class="price txt"><?=number_format($r['price'])?></li>
        <li class="qty"><input name="<?=$k?>" type="number" value="<?=$v?>" min="1" ></li>
        <li class="total txt"><?=number_format($r['price']*$v)?></li>
    </ul>
<?php
	}
?>
</form>
<div class="clear"></div>
<div class="subtotal">
    <a href="?mod=product" class="simplebtn"><span>Continue Shopping</span></a>
    <?php
		if(count($cart))
		{
	?>
        <a href="javascript:" onClick="document.getElementById('cart').submit()" class="simplebtn"><span>Update</span></a>
        <a href="?mod=checkout" class="simplebtn"><span>Checkout</span></a>
    <?php
		}
	?>
    <h3 class="colr"><?=number_format($s)?></h3>
</div>
<div class="clear"></div>
<div class="sections">
    <div class="cartitems">
        <h6 class="colr">Based on your selection, you may be interested in the following items:</h6>
        <ul>
            <li>
                <div class="thumb">
                    <a href="detail.html"><img src="images/prod_cart.gif" alt="" ></a>
                </div>
                <div class="desc">

                    <a href="#" class="title bold">Alexander Christie</a>
                    <p class="bold">$300</p>
                    <a href="#" class="simplebtn"><span>Add to Cart</span></a>
                    <div class="clear"></div><br >
                    <a href="#"><u>Add to Wishlist</u></a><br >
                    <a href="#"><u>Add to Compare</u></a>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <a href="detail.html"><img src="images/prod_cart.gif" alt="" ></a>
                </div>
                <div class="desc">
                    <a href="detail.html" class="title bold">Alexander Christie</a>
                    <p class="bold">$300</p>
                    <a href="cart.html" class="simplebtn"><span>Add to Cart</span></a>
                    <div class="clear"></div><br >
                    <a href="#"><u>Add to Wishlist</u></a><br >
                    <a href="#"><u>Add to Compare</u></a>
                </div>
            </li>
        </ul>
        <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
    <div class="centersec">
    <div class="discount">
        <h6 class="colr">Discount Codes</h6>
        <p>Enter your coupon code if you have one.</p>
        <ul>
            <li><input name="discount" type="text" class="bar" ></li>
            <li><a href="#" class="simplebtn"><span>Apply Coupon</span></a></li>
        </ul>
        <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
  <div class="estimate">
        <h6 class="colr">Estimate Shipping and Tax</h6>
    <p>Enter your destination to get a shipping estimate.</p>
      <ul>
          <li class="bold">Country</li>
          <li>
            <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                <option>item1</option>
                <option>item2</option>
                <option>item3</option>
            </select>
          </li>
      </ul>
      <ul>
          <li class="bold">State/Province</li>
          <li>
            <select name="jumpMenu" id="jumpMenu1" onchange="MM_jumpMenu('parent',this,0)" class="bar">
                <option>item1</option>
                <option>item2</option>
                <option>item3</option>
            </select>
          </li>
      </ul>
      <ul>
          <li class="bold">Zip code</li>
          <li><input name="discount" type="text" class="bar" ></li>
          <li><a href="#" class="simplebtn"><span>Submit</span></a></li>
      </ul>
      <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
    </div>
    <div class="grand_total">
        <ul>
            <li class="title">Subtotal</li>
            <li class="price bold">$349.99</li>
        </ul>
        <ul>
            <li class="title"><h5>Grand total</h5></li>
            <li class="price"><h5>$349.99</h5></li>
        </ul>
        <div class="clear"></div>
        <a href="#" class="proceed right">Proceed to Checkout</a>
        <div class="clear"></div>
        <a href="#" class="right">Checkout with Multiple Addresses</a>
        <div class="clear"></div>
        <div class="sec_botm">&nbsp;</div>
    </div>
</div>
</div>
<div class="clear"></div>