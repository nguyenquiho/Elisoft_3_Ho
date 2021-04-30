        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                <?php
                            if(is_active_sidebar('sidebar-1'))
                            dynamic_sidebar('sidebar-1');

                            if(is_active_sidebar('left-sidebar-2'))
                            dynamic_sidebar('left-sidebar-2');

                            if(is_active_sidebar('right-sidebar-2'))
                            dynamic_sidebar('right-sidebar-2');
                    ?>
                    
                    
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Lorem ipsum</a></li>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aenean vulputate</a></li>
                                <li><a href="#">Vestibulum sit amet</a></li>
                                <li><a href="#">Nam dignissim</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Quick Links</h3>
                            <ul>
                                <li><a href="#">Lorem ipsum</a></li>
                                <li><a href="#">Pellentesque</a></li>
                                <li><a href="#">Aenean vulputate</a></li>
                                <li><a href="#">Vestibulum sit amet</a></li>
                                <li><a href="#">Nam dignissim</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Menu Start -->
        <div class="footer-menu">
            <div class="container">
                <div class="f-menu">
                <?php
                    foreach($footer_menu_items as $item){ ?>
                    <a href="<?=$item->url;?>"><?=$item->title;?></a><?php
                    }
                ?>
                    <!-- <a href="">Terms of use</a>
                    <a href="">Privacy policy</a>
                    <a href="">Cookies</a>
                    <a href="">Accessibility help</a>
                    <a href="">Advertise with us</a>
                    <a href="">Contact us</a> -->
                </div>
            </div>
        </div>
        <!-- Footer Menu End -->

        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
        <!-- <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script> -->

        <!-- Template Javascript -->
        <!-- <script src="js/main.js"></script> -->
        <?php
            wp_footer();
        ?>
    </body>
    
</html>