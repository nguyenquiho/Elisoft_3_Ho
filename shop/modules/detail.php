<?php
    include'connect.php';
?>
            <?php           
                if (!$getDetailProduct) {
                    printf("Error: %s\n", mysqli_error($link));
                    exit();
                } 
                $product_detail = mysqli_fetch_assoc($getDetailProduct);
                $count = mysqli_num_rows($getDetailProduct);
                if($count > 0){
                ?>
            <div class="col2_center">
        	<h4 class="heading colr"><?php echo $product_detail['name']; ?></h4>
            <div class="prod_detail">
            	<div class="big_thumb">
                <?php
                    //get image
                    $sql= "SELECT `url`,`alt` FROM `fs_product_img` WHERE `id` = $product_id";
                    $getImg = mysqli_query($link,$sql);
                    $img = $getImg->fetch_assoc();
                    // print_r($img);
                    // die();
                ?>
                	<div id="slider2">
                        <!-- <div class="contentdiv">
                        	<img src="images/detail_img1.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                      </div>
                        <div class="contentdiv">
                            <img src="images/detail_img2.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                            <img src="images/detail_img3.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                        	<img src="images/detail_img4.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div>
                        <div class="contentdiv">
                        	<img src="images/detail_img5.gif" alt="" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        </div> -->
                      <div class="contentdiv">
                      <?php
                        if($img['url'] != ""){ ?>
                            <img src="images/product/<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" >
                            <a rel="example_group" href="images/watch.jpg" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a>
                        
                        <?php } else { ?>
                        <img src="images/product/default.jpg" alt="" >
                        <?php } ?>
                        	
                      </div>
                    </div>
                    <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" ></a>
                    <div style="float:left; width:189px !important; overflow:hidden;">
                    <div class="anyClass" id="paginate-slider2">
                        <ul>
                            <li><a href="#" class="toc"><img src="images/detail_img1_small.gif" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/detail_img2_small.gif" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/detail_img3_small.gif" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/detail_img4_small.gif" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/detail_img5_small.gif" alt="" ></a></li>
                            <li><a href="#" class="toc"><img src="images/detail_img6_small.gif" alt="" ></a></li>
                        </ul>
                    </div>
                    </div>
                    <a href="javascript:void(null)" class="nextsmall"><img src="images/next.gif" alt="" ></a>
                    <script type="text/javascript" src="js/cont_slidr.js"></script>
                </div>
                <div class="desc">
                	<div class="quickreview">
                            <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
                            <div class="clear"></div>
                            <p class="avail"><span class="bold">Availability:</span> In stock</p>
                          <h6 class="black">Mô tả: </h6>
                        <p>
                        	<?php echo $product_detail['desc'] ?>
                        </p>
                    </div>
                    <div class="addtocart">
                        <?php if($product_detail['discount'] == 0){?>
                                <h4 class="left price colr bold"><?php echo number_format($product_detail['price'])." .đ"; ?></h4>
                                <!-- <h4 class="price-product-detail"></h4> -->
                                <hr>
                           <?php }
                           else { ?>
                                <h4 style="text-decoration-line:line-through;color:black;" class="price-product-detail"><?php echo number_format($product_detail['price'])." .đ"; ?></h4>&nbsp;&nbsp;
                                <h4 style="color:red"class="price-product-detail"><?php echo number_format($product_detail['discount'])." .đ"; ?></h4>
                                <hr>
                       <?php    }

                            ?>
                    	<h4 class="left price colr bold"></h4>
                            <div class="clear"></div>
                            <ul class="margn addicons">
                                <li>
                                    <a href="#">Add to Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">Add to Compare</a>
                                </li>
                        	</ul>
                            <div class="clear"></div>
                        <ul class="left qt">
                   	    <li class="bold qty">QTY</li>
                            <li><input name="qty" type="text" class="bar" ></li>
                            <li><a href="cart.html" class="simplebtn"><span>Add To Cart</span></a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="prod_desc">
                	<h4 class="heading colr">Product Description</h4>
                    <p>
                        <?php echo $product_detail['desc'] ?>
                    </p>
                </div>
            </div>
            <?php } ?>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <?php
                    //get product by type
                    $cat = $product_detail['category_id'];
                    $sql= "SELECT * FROM `fs_product` WHERE `category_id` = $cat ORDER BY id DESC LIMIT 4";
                    $getNewProducts = mysqli_query($link,$sql);
                    // print_r($getNewProducts);
                    // die();
                    
                ?>
                <ul>
                    <?php
                        $index = 0;
                        while($newProduct = $getNewProducts->fetch_assoc()){
                            $index ++;
                            //get image
                            $product_id = $newProduct['id'];
                            $sql= "SELECT `url`,`alt` FROM `fs_product_img` WHERE `id` = $product_id";
                            $getImg = mysqli_query($link,$sql);
                            $img = $getImg->fetch_assoc(); 
                            ?>
                            <li class = "<?php if($index %4 == 0){echo 'last';} ?>">
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
                                        }
                                ?>
                                    <a href="#">(3) Reviews</a>
                                </div>
                                <div class="addwish">
                                    <a href="#">Add to Wishlist</a>
                                    <a href="#">Add to Compare</a>
                                </div>
                                <div class="cart_price">
                                    <a href="cart.html" class="adcart">Add to Cart</a>
                                    <p class="price">$399.99</p>
                                </div>
                            </li>
                       <?php } ?>
                    
                </ul>
            </div>
            <div class="tags_big">
            	<h4 class="heading">Product Tags</h4>
                <p>Add Your Tags:</p>
                <span><input name="tags" type="text" class="bar" ></span>
                <div class="clear"></div>
                <span><a href="#" class="simplebtn"><span>Add Tags</span></a></span>
                <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
            </div>
            <div class="clear"></div>
            </div>