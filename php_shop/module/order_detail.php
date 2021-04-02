<div class="col2_center">
    <h2 class="heading colr">QUẢN LÝ ĐƠN HÀNG</h2>
    <div class="shoppingcart">
        <div class="subtotal">
            Mã đơn hàng:
            <div class="account_table">
                	<ul class="headtable">
                    	<li class="order bold">Sản phẩm</li>
                        <li class="order bold">Đơn giá</li>
                        <li class="order bold">Số lượng</li>
                        <li class="order bold last">Thành tiền</li>
                    </ul>
                    <?php
                    // print_r($order_detail);
                    // die();
                    foreach($order_detail as $detail){ ?>
                        <ul class="contable">
                    	<li class="order bold"><?=$detail['order_id'] ?></li>
                        <li class="order bold"><?=$detail['price'] ?></li>
                        <li class="order bold"><?=$detail['qty'] ?></li>
                        <li class="order bold last"><?=$detail['qty']*$detail['price']; ?></li>
                    </ul>
                  <?php  }
                    ?>
                </div>
        </div>
    </div>

</div>
            