<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Bootstrap News Template - Free HTML Templates</title>
        <base href="/elisoft/wp-project/wp-content/themes/bootstrapnewstemplate/">
        <base href="<?php get_template_directory_uri().'/' ?>">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"> -->
        <!-- <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet"> -->

        <!-- Template Stylesheet -->
        <!-- <link href="style.css" rel="stylesheet"> -->
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
    <?php
        $phone = get_option('phone_number');
        $email = get_option('general_email');
        $ads = get_option('ads-file');
        $logo = get_option('logo-file');
        
    ?>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i><?=$email;?></p>
                            <p><i class="fas fa-phone-alt"></i><?=$phone;?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="">About</a>
                            <a href="">Privacy</a>
                            <a href="">Terms</a>
                            <a href="">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="index.php">
                            <img src="<?=$logo;?>" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="b-ads">
                            <a href="https://htmlcodex.com">
                                <img src="<?php echo $ads; ?>" alt="ads">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                        <?php get_search_form ( ); ?> 
                            <!-- <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <?php
                            display_menu($_location='primary',$is_boostrap = true);
                            display_menu($_location='social');
                        ?>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->