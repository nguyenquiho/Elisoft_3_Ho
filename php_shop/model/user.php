<?php 
class User{

    function sign_up($data){
        
        $fullname = $data['fullname'];
        $pass = $data['pass'];
        $repass = $data['repass'];
        $email = $data['email'];
        $mobile = $data['mobile'];

        if($fullname=='')
            $msg = 'Bạn phải nhập name';
        else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
            $msg = 'email khong  hop le';
        else if(strlen($pass)<8)
            $msg = 'Pass>8 ky tu';
        else if($pass!=$repass)
            $msg = 'Pass nhap lai khong dung';
        else //Tat ca du lieu hop de => insert vao DB
        {
            global $link;
            $pass=hash('sha512', $pass);
            $sql="INSERT INTO `nn_user`(`name`, `password`, `email`, `mobile`) VALUES ('$fullname','$pass','$email','$mobile')";
            $rs=mysqli_query($link,$sql);
            
            if(!$rs)
            {
                $msg = 'Email này đã được đăng ký. Hãy dùng email khác';
                
                //header('location:?mod=login');
            }
            else $msg = 'Đang ky thanh cong! Hệ thống chuyển đến trang đăng nhập...'; ?>
            <script>
            setTimeout("window.location='?mod=login';",3000);//Chuyen trang sau 3s
            </script>
                
      <?php  }

        return $msg;
    }

    public function login($data){
        // print_r($data);
        // die();
        $email= $data['email'];
        $pass=hash('sha512',$data['pass']);
        
        global $link;
        $sql="SELECT `id`,`name` FROM `nn_user` WHERE `email`='$email' and `password`='$pass'";
        $rs=mysqli_query($link,$sql);
        //kiem tra co dong nao duoc tra ve khong
        if(mysqli_num_rows($rs)==0)
            echo 'Email or Pass khong dung!';
        else
        {	
            $r=mysqli_fetch_assoc($rs);
            $_SESSION['id']=$r['id'];
            $_SESSION['name']=$r['name'];
            //echo 'Dang nhap thanh cong';
            //chueyn trang bang php
            header('location:?mod=home');
        }
    }


    //get detail account page account
    public function get_detail_account(){
        //Neu chua dang nhap => chuyen den trang dang nhap
        if(!isset($_SESSION['id']))header('location:?mod=login');

        $id_user = $_SESSION['id'];

        //Lay tat ca thong tin
        global $link;
        $sql = 'select * from `nn_user` WHERE `id`='.$id_user;
        $rs = mysqli_query($link, $sql);
        $r = mysqli_fetch_assoc($rs);
        return $r;
    }

    //get order account page account
    public function get_orders(){
        //Neu chua dang nhap => chuyen den trang dang nhap
        $id_user = $_SESSION['id'];
        //Lay tat ca thong tin
        global $link;        
        $sql = 'select * from `nn_order` WHERE `user_id`='.$id_user;
        $rs = mysqli_query($link, $sql);
        $data = [];
        while($r = mysqli_fetch_assoc($rs)){
            $data[] = $r;
        }
        return $data;
    }

    //get detail order 
    public function get_detail_order($id){
        //Lay tat ca thong tin
        global $link;        
        $sql = 'select * from `nn_order_detail` WHERE `order_id`='.$id;
        $rs = mysqli_query($link, $sql);
        $data = [];
        // echo "aaaaaaa";
        // die();
        while($r = mysqli_fetch_assoc($rs)){
            $data[] = $r;
        }
        return $data;
    }


    public function update_info_account(){
        //Neu chua dang nhap => chuyen den trang dang nhap
        if(!isset($_SESSION['id']))header('location:?mod=login');

        //Neu da dang nhap => lay thong tin hien tai
        $id_user = $_SESSION['id'];

        //Update lai thong tin khi user submit
        $msg = '';
        if(isset($_POST['fullname']))
        {
            $fullname=$_POST['fullname'];
            $pass=$_POST['pass'];
            $repass=$_POST['repass'];
            $mobile= $_POST['mobile'];
            $gender= $_POST['gender'];
            
            $dob= $_POST['dob'];
            //Chuyen format tu dd-mm-yyyy => yyyy-mm-dd
            $dob = date('Y-m-d',strtotime($dob));
            
            $address= $_POST['address'];
            
            if($fullname=='')
                $msg = 'Bạn phải nhập name';
            else if(strlen($pass) > 0 && strlen($pass) < 8 )
                $msg = 'Pass>8 ky tu';
            else if($pass!=$repass)
                $msg = 'Pass nhap lai khong dung';
            else //Tat ca du lieu hop de => update DB
            {
                if($pass != '')//Neu co thay doi password
                {
                    $pass=hash('sha512', $pass);
                    $sql="UPDATE `nn_user` SET 
                        `name`='$fullname',
                        `password`='$pass',
                        `mobile`='$mobile',
                        `gender`='$gender',
                        `dob` = '$dob',
                        `address` = '$address'
                    WHERE `id` = $id_user";
                }
                else
                {
                    global $link;
                    $sql="UPDATE `nn_user` SET 
                        `name`='$fullname',
                        `mobile`='$mobile',
                        `gender`='$gender',
                        `dob` = '$dob',
                        `address` = '$address'
                    WHERE `id` = $id_user";
                }
                //Thuc hien update
                $rs=mysqli_query($link,$sql);
                
                if($rs){
                    $_SESSION['name'] = $fullname;
                    $msg = 'Cập nhật thành công!';
                }
                else
                    $msg = 'Cập nhật không thành công!';
            }
            
        }

        return $msg;
    }

    public function upload_avt(){
        if (isset($_POST['submit'])) {
            $id = $_SESSION['id'];
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";
            $error=array(); // Khai báo mảng lỗi. để sau kiểm tra nếu mảng rỗng mới OK
            // Bước 1: tạo folder upload avetar để chứa ảnh
            $target_dir="images/avt/";
            $target_file= $target_dir.basename($_FILES['fileUpload']['name']); // Lấy target nối với tên file cần upload
            print_r($target_file);
            die();
            // Bước 2: Kiểm tra điều kiện file
            // 
            // 1: Ktra kích thước file
                if ($_FILES['fileUpload']['size']>5242880) {
                $error['fileUpload']="Chỉ được upload file dưới 5MB !";
            }
            // 2: Kiểm tra đuôi(loại) file (png ,jpeg,jpg,gif)
            $file_type=pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);// Lấy đuôi file
            // echo $file_type;
            $file_type_allow= array('png','jpg','jpeg','gif'); //Lưu đuôi file cho phép upload vào 1 mảng để ktra
                if (!in_array(strtolower($file_type), $file_type_allow)) {// Kiểm tra đuôi file có là 1 trong số dạng file cho phép hay k,( tham số T!: đuôi file upload------- Tham số T2: Mảng cho phép)
                $error['fileUpload']='Chỉ cho phép upload file ảnh!';
            }
            
            // 3: Kiểm tra sự tồn tại của file
                if (file_exists($target_file)) {
                $error['fileUpload']="File đã tồn tại!";
            }

            // Bước 3: Kiểm tra và chuyển file từ bộ nhớ tạm lên SEVER
                if (empty($error)) {
                if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file)) {
                        
                        $flag=true;
                    }
            }	else echo "<span style='color:red'>".$error['fileUpload']."</span>";

        }
            if (isset($flag)) {// Nếu upload thành công
            // echo $target_file;
            // echo $user;
            global $link;
            $_SESSION['target_file']=$target_file;
            $insert=mysqli_query($link,"UPDATE `nn_user` SET `avt`='$target_file' WHERE `id`= $id");
            if ($insert) {
                echo "<span style='color:#3270d3'> Upload thành công!</span>";
            }
        }
    }



}

?>