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
                        if(isset($_GET['cat'])){
                            $cat = $_GET['cat'];
                        }
                        $sql= "SELECT * FROM `fs_product` WHERE `category_id` = $cat ORDER BY id DESC LIMIT 20";
                        $result = mysqli_query($link,$sql);
                        if (!$result) {
                            printf("Error: %s\n", mysqli_error($link));
                            exit();
                        }
                        $num=mysqli_num_rows($result);
                        if($num > 0){
                            for ($i=0; $i < 20; $i++) { 
                                $row = mysqli_fetch_assoc($result); ?>
                                    <div class="product">
                                        <span class="product-name"><?php echo $row['name']; ?></span>
                                        <img class="product-img" src="../image/iphone.jpg" alt="Điện thoại iphone 12 giá 12.000.000đ">
                                        <span class="product-price"><?php echo number_format($row['price'])." .đ"; ?></span>
                                        <button class="btn-buy">Mua</button>
                                    </div>
                         <?php   }
                        }
                        else{
                            $sql2= "SELECT * FROM `fs_category` WHERE `id` = $cat LIMIT 1";
                            $result2 = mysqli_query($link,$sql2);
                            $row2 = mysqli_fetch_assoc($result2); ?>
                            <div>
                                <h2 style="color:red;padding:20px">
                                <?php echo "Hiện tại, loại ".$row2['name']." chưa có sản phẩm, vui lòng quay lại sau!"; ?>
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