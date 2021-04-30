<?php
    get_header();
?>
    <!-- Breadcrumb Start -->
    <?php
        // dd($post);
        $id = $post->ID;
        //$_SESSION['view'] = [];
        $_SESSION['view'][] = $id;
        $flag = 0;
        foreach($_SESSION['view'] as $k=>$v){
            if($v == $id){
                $flag++;
            }
        }
        if($flag == 1){
            setCrunchifyPostViews(get_the_ID());
        }

        // echo getCrunchifyPostViews(get_the_ID());
        // die();

        $category_detail=get_the_category($post->ID);//$post->ID
        //$cat = $category_detail->cat_ID;
        //dd($category_detail);
        $cat = [];
        foreach($category_detail as $cd){
            $cat[] = $cd->cat_ID;
            $cat_name = $cd->name;
        }
        // dd($cat);
        // die();
        $args = array(
            'post_type' => 'post',
            'category__in'  => $cat
        );
        $related_posts = get_posts($args);
        //dd($related_posts);


        $posttags = get_the_tags();



        // Add comments post
        if(isset($_POST['submit'])){
            $content_cmt = $_POST['content_cmt'];
            // wp_insert_comment($commentdata );
            //dd($wpdb);
            // die();
        }

    ?>
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#"><?=$cat_name;?></a></li>
                <li class="breadcrumb-item active"><?=$post->post_title?></li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                        <?php
                            if ( has_post_thumbnail() ) {
                                set_post_thumbnail_size( 730, 465 );
                                echo $featured_image = get_the_post_thumbnail();
                            }
                            ?>
                            <!-- <img src="img/news-825x525.jpg" /> -->
                        </div>
                        <div class="sn-content">
                            <h1 class="sn-title"><?=$post->post_title?></h1>
                            <?=$post->post_content;?>
                        </div>
                        <span>
                        <?php
                        //dd($post->ID);
                            $author_id = get_post_field( 'post_author', $post->ID );
                            $author_name = get_the_author_meta( 'display_name', $author_id );
                            $url = get_author_posts_url($echo,$author_id);
                            echo get_author_posts_url($author_id);
                            //dd(the_author_posts_link());
                            
                            //dd(get_post_meta( $post->ID, 'post_views_count'));
                            //dd(get_post_type());
                            echo "Đăng bởi: "."<a href='$url'>".$author_name."</a><br>";
                            echo get_the_date()."<br>";
                            $count = get_post_meta( $post->ID, 'post_views_count');
                            if(get_post_type() == 'post')
                                echo "<span><i class='fa fa-eye' aria-hidden='true'></i> ".$count[0]. "</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo "<span><i class='fa fa-comments' aria-hidden='true'></i> ".get_comments_number()."</span><br>";
            ?>
                        </span><br> 
                    </div>
                    <!-- <div class='row'> -->
                        <div class='col-lg-6' style='float:left;text-align:left'><?php previous_post_link(); ?> </div>
                        <div class='col-lg-6'style='float:right;text-align:right'><?php next_post_link(); ?></div>
                    <!-- </div> -->
                    <div class="sn-related">
                        <!-- <h2>Comments</h2> -->
                        <?php
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>
                            <!-- <form action="" method='post'> 
                            Write Comments:
                            <textarea id="w3review" name="content_cmt" rows="3" cols="80"></textarea>
                            <input type="submit" name="submit" value="Send"><br>
                        </form> -->
                        
                        <div class="row sn-slider">
                            <?php //foreach($related_posts as $post): ?>
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <?php
                                        //if ( has_post_thumbnail() ) {
                                            //set_post_thumbnail_size( 224, 143 );
                                            //echo $image = get_the_post_thumbnail();
                                       //}
                                    ?>
                                    <!-- <img src="img/news-350x223-1.jpg" /> -->
                                    <div class="sn-title">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <?php //endforeach; ?>
                        </div>
                    </div>
                    <div class="sn-related">
                        <h2>Related News</h2>
                        <div class="row sn-slider">
                            <?php foreach($related_posts as $post): ?>
                            <div class="col-md-4">
                                <div class="sn-img">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            set_post_thumbnail_size( 224, 143 );
                                            echo $image = get_the_post_thumbnail();
                                        }
                                    ?>
                                    <!-- <img src="img/news-350x223-1.jpg" /> -->
                                    <div class="sn-title">
                                        <a href=""><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">In This Category</h2>
                            <div class="news-list">
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                                <div class="nl-item">
                                    <div class="nl-img">
                                        <img src="img/news-350x223-5.jpg" />
                                    </div>
                                    <div class="nl-title">
                                        <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="tab-news">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="featured" class="container tab-pane active">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-5.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="popular" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-1.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-2.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="latest" class="container tab-pane fade">
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>  
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-5.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-4.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                        <div class="tn-news">
                                            <div class="tn-img">
                                                <img src="img/news-350x223-3.jpg" />
                                            </div>
                                            <div class="tn-title">
                                                <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">News Category</h2>
                            <div class="category">
                                <ul>
                                <?php
                                //dd(get_the_category());
                                    $categories = get_categories();
                                    $i = 0;
                                    foreach($categories as $category): if($i == 5): break; endif;$i++; ?>
                                    <!-- echo $category->cat_name . ' '; -->
                                    <?php //dd($category); ?>
                                    <li><a href="<?php echo get_category_link($category->term_id); ?>"><?=$category->cat_name;?></a><span>(<?php echo count_cat_post($category->cat_ID); ?>)</span></li> 
                                    <?php endforeach;
                                ?>
                                    <!-- <li><a href="">National</a><span>(98)</span></li>
                                    <li><a href="">International</a><span>(87)</span></li>
                                    <li><a href="">Economics</a><span>(76)</span></li>
                                    <li><a href="">Politics</a><span>(65)</span></li>
                                    <li><a href="">Lifestyle</a><span>(54)</span></li>
                                    <li><a href="">Technology</a><span>(43)</span></li>
                                    <li><a href="">Trades</a><span>(32)</span></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image">
                                <a href="https://htmlcodex.com"><img src="img/ads-2.jpg" alt="Image"></a>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="sw-title">Tags Cloud</h2>
                            <div class="tags">
                            <?php
                                if ($posttags)
                                    foreach($posttags as $tag): //dd($tag); ?>
                                        <a href="<?php echo get_tag_link($tag->term_id) ?>"><?=$tag->name;?></a>
                                    <?php endforeach; ?>
                                <!-- <a href="">National</a>
                                <a href="">International</a>
                                <a href="">Economics</a>
                                <a href="">Politics</a>
                                <a href="">Lifestyle</a>
                                <a href="">Technology</a>
                                <a href="">Trades</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->

    <?php
        get_footer();
    ?>