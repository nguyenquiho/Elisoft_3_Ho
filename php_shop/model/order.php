<?php
class Order{
    public function create_order($cart){
        if(isset($_POST)){
            $id = $_SESSION['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            global $link;
            $sql="INSERT INTO `nn_order`(`user_id`, `name`, `address`,`email`, `mobile`,`status`) VALUES ('$id','$name','$address','$email','$mobile',0)";
            $rs_order=mysqli_query($link,$sql);
            if($rs_order){
                $sql="SELECT `id` FROM `nn_order` ORDER BY `id` DESC LIMIT 1";
                $rs=mysqli_query($link,$sql);
                $order = mysqli_fetch_assoc($rs);
                $order_id = $order['id'];
                // echo $order_id;
                // die();
            }
            foreach($cart as $k=>$v){
                $sql="SELECT `price` FROM `nn_product` WHERE `id` = $k";
                $rs=mysqli_query($link,$sql);
                $price = mysqli_fetch_assoc($rs);
                $price = $price['price'];
                
                $sql="INSERT INTO `nn_order_detail`(`order_id`, `product_id`, `qty`,`price`) VALUES ('$order_id','$k','$v',$price)";
                $rs_order_detail=mysqli_query($link,$sql);

                $sql="INSERT INTO `nn_order_detail`(`order_id`, `product_id`, `qty`,`price`) VALUES ('$order_id','$k','$v',$price)";
                $rs_order_detail=mysqli_query($link,$sql);
                

                //     $sql="UPDATE `nn_product` SET 
                //         `qty`='$fullname',
                //         `mobile`='$mobile',
                //         `gender`='$gender',
                //         `dob` = '$dob',
                //         `address` = '$address'
                //     WHERE `id` = $id_user";

                // //Thuc hien update
                // $rs=mysqli_query($link,$sql);
            }
            unset($_SESSION['cart']);
            echo "<h2>Đặt hàng thành công! Hệ thống chuyển đến trang quản lý đơn hàng...</h2>";
            ?>
            <script>
            setTimeout("window.location='?mod=m_orders';",3000);//Chuyen trang sau 3s
            </script>

        <?php }

    }
}

?>