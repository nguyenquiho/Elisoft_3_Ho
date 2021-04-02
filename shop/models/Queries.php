<?php
    include('connect.php');
    if(isset($_GET['test'])){
        $test = "OK";
    }
    $sql = "SELECT * FROM fs_product";
    $getProduct = mysqli_query($link,$sql);

    //get department
    $sql= "SELECT d.id,d.name FROM `fs_department` as d";
    $getDepartments = mysqli_query($link,$sql);

    //get category
    $sql= "SELECT c.id,c.name,c.department_id FROM `fs_category` as c";
    $getCategorys = mysqli_query($link,$sql);

    //get featured product
    $sql= "SELECT `id`,`name`,`price`,`discount`,`view` FROM `fs_product` ORDER BY `view` DESC LIMIT 10";
    $getFeaturedProducts = mysqli_query($link,$sql);

    //get new product
    $sql= "SELECT `id`,`name`,`price`,`discount`,`view` FROM `fs_product` ORDER BY `id` DESC LIMIT 20";
    $getNewProducts = mysqli_query($link,$sql);
    
    //update view and get Detail Product
    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
        $updateView= "UPDATE fs_product SET `view` = view + 1 WHERE id = $product_id";
        
        
        $sql= "SELECT * FROM fs_product WHERE id = $product_id";
        $getDetailProduct = mysqli_query($link,$sql); 
    }

    //regis
    if (isset($_POST['name'])) {// kiểm tra nếu người dùng đã ấn nút Đăng ký để gửi thông tin

        $email = $_POST["email"];
        $name = $_POST["name"];
        $password = md5($_POST["password"]);
        $day = $_POST["date"];
        $month = $_POST["month"];
        $year = $_POST["year"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];
        $dob = $year."-".$month."-".$day;
        $t=time();
        $create_at= date("Y-m-d",$t);

        // echo $password;
        // die();
        // echo $name;
        // echo $password;
        // echo $day;
        // echo $month;
        // echo $year;
        // echo $gender;
        // echo $address;
        // die();

        //
        $sql = "INSERT INTO `fs_user` (`password`, `email`, `name`, `mobile`, `address`, `dob`, `gender`,`create_at`,`group_id`,`active`,`code`) VALUES ('$password', '$email', '$name', '$mobile','$address','$dob','$gender',$create_at,0,0,'0')";
        // $sql= "INSERT INTO fs_user (`password`, `email` , `name`, `mobile`,`address`,`dob`,`gender`) VALUES ($password, $email, $name, $mobile,$address,$dob,$gender)";
        // echo $sql;
        // die();
        $insertUser = mysqli_query($link,$sql);
        if (!$insertUser) {
            // printf("Error: %s\n", mysqli_error($link));
            // exit();
            echo "Đăng ký không thành công, vui lòng thử lại!";
        }else{
            echo "Đăng ký thành công!";
        }
        //echo $username . " | " .$password . " | " .$email . " | " .$sex . " | " .$age . " | " .$birthday ; // xuất dữ liệu lấy được ra cho phía server
        
        //Dưới đây sẽ là những đoạn code xử lý data theo ý bạn
        //Chẳng hạn như lưu data xuống database, kiểm tra data,...
    }

?>