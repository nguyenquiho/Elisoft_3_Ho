<?php
 include'connect.php';
 include('header.php');
 if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $updateView= "UPDATE fs_product SET `view` = view + 1 WHERE id = $product_id";
    $exe = mysqli_query($link,$updateView); 
}
?>
        <div class="make-bg">
            
        </div>
        <div id="main-content">
            <aside id="aside-left">Left</aside>
            <article>
                <section>
                <?php
                        if(isset($_GET['id'])){
                            $product_id = $_GET['id'];
                        }
                        $sql= "SELECT * FROM `fs_product` WHERE id = $product_id";
                        $result = mysqli_query($link,$sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error($link));
                            exit();
                        } 
                        $row = mysqli_fetch_assoc($result);
                        $count = mysqli_num_rows($result);
                        if($count > 0){
                        ?>
                    <div class="detail-product-box">
                        <div class="img-product-detail">
                        <img class="product-img" src="../image/iphone.jpg" alt="<?php echo $row['name']; ?>">
                        </div>
                        <div class="product-detail">
                            <h1 class="name-product-detail"><?php echo $row['name']; ?></h1>
                            <!-- <div class="rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div> -->
                            <?php
                            if($row['discount'] == 0){ ?>
                                <span class="price-product-detail"><?php echo number_format($row['price'])." .đ"; ?></span>
                                <hr>
                           <?php }
                           else { ?>
                                <span style="text-decoration-line:line-through;color:black;" class="price-product-detail"><?php echo number_format($row['price'])." .đ"; ?></span>&nbsp;&nbsp;
                                <span style="color:red"class="price-product-detail"><?php echo number_format($row['discount'])." .đ"; ?></span>
                                <hr>
                       <?php    }

                            ?>
                            
                            <div class="desc-product-detail">
                            <?php echo $row['desc']; ?>
                           </div><hr>
                            <span class="view-product-detail"><i class="fa fa-eye" aria-hidden="true"></i> Lượt xem: <?php echo $row['view']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php
                                $sql= "SELECT COUNT(*) as `sum` FROM `fs_rating_product` WHERE `id_product` = $product_id";
                                $res = mysqli_query($link,$sql);
                                $data=mysqli_fetch_assoc($res);
                            ?>
                            <span class="rating-product-detail">Đánh giá(<?php echo $data['sum']; ?>):
                            <?php
                                $sql = "SELECT AVG(star) as `star` FROM fs_rating_product WHERE `id_product` = $product_id";
                                $res = mysqli_query($link,$sql);
                                $avg=mysqli_fetch_assoc($res);
                                $star = (int)$avg['star'];
                                for ($i=1; $i <= 5; $i++) {
                                    if($i <= $star){ ?>
                                    <span class="fa fa-star checked"></span>
                                 <?php   }
                                 else  echo '<span class="fa fa-star"></span>';
                                    ?>
                                    
                             <?php   }
                            ?>
                            </span>
                            <span class="coutn-rating-product-detail"><?php //echo $row['desc']; ?></span>
                        </div>
                    </div>

                 <?php  }
                    else{ ?>
                        <div>
                        <h2 style="color:red;padding:20px">
                        <?php echo "Sản phẩm không tại!"; ?>
                        <br><img src="../image/no_product.jpg" alt="">
                        </h2>
                    </div>
                   <?php } 
                 
                 ?>
                </section>
            </article>
            <aside id="aside-right">right</aside>
        </div>
<?php
    include('footer.php');
?>

<script>
    $(function() {
    
});
</script>

