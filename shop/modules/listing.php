<?php

if(isset($_GET['cat'])){
    $cat = $_GET['cat'];


// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$result = mysqli_query($link, "select count(id) as total from fs_product where `category_id` = $cat");
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
 
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 20;
 
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
 
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){

    $current_page = $total_page;
}
else if ($current_page < 1){
    
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$listing = mysqli_query($link, "SELECT * FROM fs_product WHERE `category_id` = $cat LIMIT $start, $limit");

}
?>
<div class="col2_center">
        	<h4 class="heading colr">Featured Products</h4>
            <div class="small_banner">
            	<a href="#"><img src="images/small_banner.gif" alt="" ></a>
            </div>
            <div class="sorting">
            	<p class="left colr">4 Item(s)</p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                    	<a href="#" class="colr">Name </a>
                        <a href="#" class="colr">Price</a> 
                    </li>
                    <li class="text">Page
                        <a href="#" class="colr">1</a> 
                        <a href="#" class="colr">2</a> 
                        <a href="#" class="colr">3</a> 
                        <a href="#" class="colr">/ All</a> 
                    </li>
                </ul>
                <div class="clear"></div>
                <p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                    	<a href="#" class="colr">Name </a>
                        <a href="#" class="colr">Price</a> 
                    </li>
                </ul>
          	</div>
            <div class="listing">
                <?php
                    if($total_records > 0){ ?>
                                    	<h4 class="heading colr">New Products for March 2010</h4>
                <ul>
                <?php
                $index = 0;
                while($product = mysqli_fetch_assoc($listing)) {  $index++; ?>
                    <li class = "<?php if($index % 4 == 0){ echo 'last';} ?>">
                    <?php           
                        //get image
                        $id_product = $product['id'];
                        $sql= "SELECT `url`,`alt` FROM `fs_product_img` WHERE `id` = $id_product";
                        $getImg = mysqli_query($link,$sql);
                        $img = $getImg->fetch_assoc(); ?>
                    	<a href="index.php?module=detail&id=<?php echo $product['id']; ?>" class="thumb">
                        <?php
                                    if($img['url'] != ""){ ?>
                                    <img src="images/product/<?php echo $img['url']; ?>" alt="<?php echo $img['url']; ?>" >
                                    <?php } else { ?>
                                    <img src="images/product/default.jpg" alt="" >
                                    <?php } ?>
                        <h6 class="colr"><?php echo $product['name'];?></h6>
                        <div class="stars">
                        <?php 
                            $sql = "SELECT AVG(star) as `star` FROM fs_rating_product WHERE `id_product` = $id_product";
                            $res = mysqli_query($link,$sql);
                            $avg=mysqli_fetch_assoc($res);
                            $star = (int)$avg['star'];
                            for ($i=1; $i <= 5; $i++) {
                                if($i <= $star){ ?>
                                <a href="#"><img src="images/star_green.gif" alt="" ></a>
                             <?php   }
                             else  echo '<a href="#"><img src="images/star_grey.gif" alt="" ></a>';
                                ?>
                                
                         <?php   }
                            $sql= "SELECT COUNT(*) as `sum` FROM `fs_rating_product` WHERE `id_product` = $id_product";
                            $res = mysqli_query($link,$sql);
                            $data=mysqli_fetch_assoc($res);
                        ?>
                            <a href="#">(<?php echo $data['sum']; ?>) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            
                            <?php if($product['discount'] == 0){ ?>
                                <?php
                                    $price = (float)($product['price']/1000000);

                                ?>
                                <p class="price bold"><?php echo number_format($price,2,',',',').' .tr'; ?></p>
                           <?php }
                           else { 
                                $discount = (float)($product['discount']/1000000);
                                $price = (float)($product['price']/1000000);
                               ?>

                                <p style="text-decoration-line:line-through;color:black;" class="price"><?php echo number_format($price,2,',',',').' .tr'; ?></p>
                                <p style="color:red"class="price-product-detail" class="price"><?php echo number_format($discount,2,',',',').' .tr'; ?></p>
                            <?php    }

                            ?>
                            
                        </div>
                    </li>
                    <?php   }
                ?>
                </ul>
                  <?php  }
                  else{ ?>
                    <h2>Danh mục không có sản phẩm</h2>    
                <?php  } ?>

            </div>
            </div>
            <div class="pagination" style="text-align:center">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?module=listing&cat='.$cat.'&page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?module=listing&cat='.$cat.'&page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?module=listing&page='.($current_page+1).'">Next</a> | ';
            }
           ?>
            </div>