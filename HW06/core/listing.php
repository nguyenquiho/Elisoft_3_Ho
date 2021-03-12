<?php
 include'connect.php';
 include('header.php');
?>
        <div class="make-bg">
            
        </div>
        <div id="main-content">
            <aside id="aside-left">Left</aside>
            <article>
                <section>
                    <?php
                        $sql3= "SELECT * FROM `fs_product`";
                        $result3 = mysqli_query($link,$sql3);
                        if (!$result3) {
                            printf("Error: %s\n", mysqli_error($link));
                            exit();
                        }
                        for ($i=0; $i < 20; $i++) { 
                            $row3 = mysqli_fetch_assoc($result3); ?>
                                <div class="product">
                                    <span class="product-name"><a href="detail.php?id=<?php echo $row3['id']; ?>"><?php echo $row3['name']; ?></a></span>
                                    <a href="detail.php?id=<?php echo $row3['id']; ?>"><img class="product-img" src="../image/iphone.jpg" alt="<?php echo $row3['name']; ?>"></a> 
                                    <span class="product-price"><?php echo number_format($row3['price'])." .đ"; ?></span>
                                    <button class="btn-buy"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>&nbsp;&nbsp;<button class="btn-detail">Chi tiết <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                </div>
                     <?php   }
                    ?>
                </section>
            </article>
            <aside id="aside-right">right</aside>
        </div>
<?php
    include('footer.php');
?>