<div class="col2_center">
        	<h4 class="heading colr">Featured Products</h4>
            <div id="prod_scroller">
            <a href="javascript:void(null)" class="prev">&nbsp;</a>
       	  <div class="anyClass scrol">
                <ul>
                    <?php
                        while($featuredProduct = $getFeaturedProducts->fetch_assoc()) { ?>
                            <li>
                                <?php
                                    //get image
                                    $id_product = $featuredProduct['id'];
                                    $sql= "SELECT `url`,`alt` FROM `fs_product_img` WHERE `id` = $id_product";
                                    $getImg = mysqli_query($link,$sql);
                                    $img = $getImg->fetch_assoc();
                                ?>
                                <a href="index.php?module=detail&id=<?php echo $id_product; ?>">
                                <?php
                                    if($img['url'] != ""){ ?>
                                    <img src="images/product/<?php echo $img['url']; ?>" alt="<?php echo $img['url']; ?>" >
                                    <?php } else { ?>
                                    <img src="images/product/default.jpg" alt="" >
                                    <?php } ?>
                                
                                </a>
                                <h6 class="colr"><?php echo $featuredProduct['name']; ?></h6>
                                <?php
                                    $price = (float)($featuredProduct['price']/1000000);

                                ?>
                                <p class="price bold"><?php echo number_format($price,2,',',',').' .tr'; ?></p>
                                <a href="cart.php" class="adcart">Add to Cart</a>
                            </li>
                    <?php } ?>
                </ul>
			</div>
            <a href="javascript:void(null)" class="next">&nbsp;</a>
        </div>
            <div class="clear"></div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2021</h4>
                <ul>
                <?php 
                    $index = 1;
                    while($newProduct = $getNewProducts->fetch_assoc()){ ?>
                    <li class = "<?php if($index % 4 == 0){ echo 'last';} ?>">
                    <?php
                        $index++;
                        //get image
                        $product_id = $newProduct['id'];
                        $sql= "SELECT `url`,`alt` FROM `fs_product_img` WHERE `id` = $product_id";
                        $getImg = mysqli_query($link,$sql);
                        $img = $getImg->fetch_assoc();
                    ?>
                    	<a href="detail.php?id=<?php echo $product_id; ?>" class="thumb">
                        <?php
                        if($img['url'] != ""){ ?>
                        <img src="images/product/<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" >
                        <?php } else { ?>
                        <img src="images/product/default.jpg" alt="" >
                        <?php } ?>
                        </a>
                        <h6 class="colr"><?php echo $newProduct['name']; ?></h6>
                        <div class="stars">
                        <?php 
                            $sql = "SELECT AVG(star) as `star` FROM fs_rating_product WHERE `id_product` = $product_id";
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
                            $sql= "SELECT COUNT(*) as `sum` FROM `fs_rating_product` WHERE `id_product` = $product_id";
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
                        	<a href="cart.php" class="adcart">Add to Cart</a>
                            <?php
                                $price = (float)($newProduct['price']/1000000);
                            ?>
                            <p class="price"><?php echo number_format($price,2,',',',').' .tr'; ?></p>
                        </div>
                    </li>
                 <?php   } ?>
                </ul>
            </div>
            </div>