<?php
get_header();

$sticky = get_option( 'sticky_posts' );

$args = array(
    'numberposts' => 5,
    'post_type'      => 'slider'
);
$slider_posts = get_posts($args);

//get top news post
$args = array(
    'posts_per_page' => 4,
    // 'post__in' => $sticky,
    // 'ignore_sticky_posts' => false,
    //'include_sticky_posts' => true,
    'category'      => 45
);
$top_news_posts = get_posts($args);

//get posts by category news
$args = array(
    'numberposts' => 3,
    'category'      => 3
);
$news_posts = get_posts($args);

//get posts by category sport
$args = array(
    'numberposts' => 3,
    'category'      => 6
);
$sport_posts = get_posts($args);

//get post bt cat bussiness
$args = array(
    'numberposts' => 3,
    'category'      => 4
);
$bussiness_posts = get_posts($args);

//get posts by cat entertainment
$args = array(
    'numberposts' => 3,
    'category'      => 5
);
$entertaiment_posts = get_posts($args);


//get most viewed posts
$args = array(
    'numberposts' => 3,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num'
);
$most_viewed_posts = get_posts($args);

//get most recent posts
$args = array(
    'post_type' => 'post',
    'numberposts' => 3,
    'orderby' => 'ID',
    'order' => 'DESC'
);
$most_recent_posts = get_posts($args);

$sticky = get_option( 'sticky_posts' );
// dd($sticky);
?>
        <!-- Top News Start-->
        <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <?php
                            //dd($posts);
                            foreach($slider_posts as $post){ ?>
                                <div class="col-md-6">
                                <div class="tn-img">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <!-- <img src="img/news-450x350-1.jpg" /> -->
                                    <img width = '540' height='344' src="<?=get_the_post_thumbnail_url();?>" />
                                <?php endif; ?>
                                    <div class="tn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                        <?php   } ?>


                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                        <?php

                            //dd($posts);
                            foreach($top_news_posts as $post){ ?>
                            <div class="col-md-6">
                                <div class="tn-img">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <!-- <img src="img/news-450x350-1.jpg" /> -->
                                    <img width = '270' height='172' src="<?=get_the_post_thumbnail_url();?>" />
                                <?php endif; ?>
                                    <!-- <img src="img/news-350x223-4.jpg" /> -->
                                    <div class="tn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>News</h2>
                        <div class="row cn-slider">
                        <?php
                            //dd($posts);
                            foreach($news_posts as $post){
                            ?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                <?php if (has_post_thumbnail( $post->ID ) ) ?>
                                    <img width = '255' height='162' src="<?=get_the_post_thumbnail_url();?>" />
                                    <div class="cn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Sports</h2>
                        <div class="row cn-slider">
                        <?php

                            //dd($posts);
                            foreach($sport_posts as $post){
                            ?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                <?php if (has_post_thumbnail( $post->ID ) ) ?>
                                    <img width = '255' height='162' src="<?=get_the_post_thumbnail_url();?>" />
                                    <div class="cn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->

        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Business</h2>
                        <div class="row cn-slider">
                        <?php
                            //dd($posts);
                            foreach($bussiness_posts as $post){
                            ?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                <?php if (has_post_thumbnail( $post->ID ) ) ?>
                                    <img width = '255' height='162' src="<?=get_the_post_thumbnail_url();?>" />
                                    <div class="cn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Entertainment</h2>
                        <div class="row cn-slider">
                        <?php
                            //dd($posts);
                            foreach($entertaiment_posts as $post){
                            ?>
                            <div class="col-md-6">
                                <div class="cn-img">
                                <?php if (has_post_thumbnail( $post->ID ) ) ?>
                                    <img width = '255' height='162' src="<?=get_the_post_thumbnail_url();?>" />
                                    <div class="cn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->
                                
        <!-- Tab News Start-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#featured">Featured News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#popular">Popular News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#latest">Latest News</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="featured" class="container tab-pane active">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                            </div>
                            <div id="popular" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-5.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                            </div>
                            <div id="latest" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#m-viewed">Most Viewed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-read">Most Read</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-recent">Most Recent</a>
                            </li>
                        </ul>

                        <div class="tab-content">                 
                            <div id="m-viewed" class="container tab-pane active">
                            <?php
                            foreach($most_viewed_posts as $post){
                                //echo getCrunchifyPostViews(get_the_ID($post->ID));
                                ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                    <?php if (has_post_thumbnail( $post->ID ) ) ?>
                                    <img width = '150' height='96' src="<?=get_the_post_thumbnail_url();?>" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-4.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div> -->
                            </div>
                            <div id="m-read" class="container tab-pane fade">
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-2.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-1.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="img/news-350x223-3.jpg" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="">Lorem ipsum dolor sit amet</a>
                                    </div>
                                </div>
                            </div>
                            <div id="m-recent" class="container tab-pane fade">
                            <?php
                            foreach($most_recent_posts as $post){
                                //echo getCrunchifyPostViews(get_the_ID($post->ID));
                                ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                    <?php if (has_post_thumbnail( $post->ID ) ) ?>
                                    <img width = '150' height='96' src="<?=get_the_post_thumbnail_url();?>" />
                                    </div>
                                    <div class="tn-title">
                                        <a href="<?php the_permalink();?>"><?=$post->post_title;?></a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab News Start-->

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-5.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-1.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-2.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-3.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="img/news-350x223-4.jpg" />
                                    <div class="mn-title">
                                        <a href="">Lorem ipsum dolor sit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>Read More</h2>
                            <ul>
                                <li><a href="">Lorem ipsum dolor sit amet</a></li>
                                <li><a href="">Pellentesque tincidunt enim libero</a></li>
                                <li><a href="">Morbi id finibus diam vel pretium enim</a></li>
                                <li><a href="">Duis semper sapien in eros euismod sodales</a></li>
                                <li><a href="">Vestibulum cursus lorem nibh</a></li>
                                <li><a href="">Morbi ullamcorper vulputate metus non eleifend</a></li>
                                <li><a href="">Etiam vitae elit felis sit amet</a></li>
                                <li><a href="">Nullam congue massa vitae quam</a></li>
                                <li><a href="">Proin sed ante rutrum</a></li>
                                <li><a href="">Curabitur vel lectus</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->

<?php
    get_footer();
?>

