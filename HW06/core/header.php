<?php
//include 'connect.php';

$sql1= "SELECT d.id,d.name FROM `fs_department` as d";
 
$result1 = mysqli_query($link,$sql1);
$sql2= "SELECT c.id,c.name,c.department_id FROM `fs_category` as c";
$result2 = mysqli_query($link,$sql2);
if (!$result2) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/main.js"></script>
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <div class = "logo">
                <img src="../image/faceshop-logo.png" alt="">
            </div>
        </header>
        <nav class="navigation-menu is-desktop">
            <ul class="main-menu">
                <li><button id="btn-menu-bar"><i class="fa fa-bars" aria-hidden="true"></i></button></li>
                <li><a href="listing.php">Trang chủ</a></li>
                <li><a href="about_us.php">Giới thiệu</a></li>
                <li id="toggle-product"><a href="#"> Sản phẩm</a>
                    <ul class="sub-main-menu">
                        <?php
                            while($row = $result1->fetch_row()) { ?>
                                    <li><a href="#"><?php echo $row[1]; ?></a>
                                    <ul class="sub-menu-product"><?php
                                            while($row2 = mysqli_fetch_row($result2)) { 
                                                if($row[0] == $row2[2]){ ?>
                                                    <li><a href='category.php?cat=<?php echo $row2[0] ?>'><?php echo $row2[1]; ?></a></li>
                                                <?php }
                                                    ?>
                                        <?php }
                                        mysqli_data_seek($result2,0);
                                         ?>
                                    </ul>
                                    </li>
                           <?php

                           
                           
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="tutorial.php">Hướng dẫn</a></li>
                <li><a href="contact.php">Liên hệ</a></li>
            </ul>
            <form action="" id="search-form">
                <input type="text" name="search" id="">&nbsp;<button type="submit" class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            
        </nav>
