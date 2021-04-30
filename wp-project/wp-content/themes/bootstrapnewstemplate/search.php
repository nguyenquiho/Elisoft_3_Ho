<?php get_header();

// $abc = get_the_archive_description();
//$tax = $wp_query->get_queried_object();
// echo $tax->name;
// die();
global $wp_query;
$num_results = $wp_query->found_posts;
?>

<header class="page-header alignwide">
<div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <?php //echo post_type_archive_title( '', false ); ?>
                <li class="breadcrumb-item">Tìm kiếm</li>
            </ul>
            <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'shape' ), '<span>"' . get_search_query() .'" ('. $num_results.' kết quả)</span>' ); ?></h2>
        </div>
        
    </div>
</header>

<div class="single-news">
    <div class="container">
        <div class="row">
            <?php
foreach($posts as $post):
    // echo '<pre>';
    // var_dump($post);
    // echo '</pre>'; 
?>
    <!-- // echo '<pre>';
    // var_dump($post);
    // echo '</pre>'; -->
    <div class="col-lg-6" style='float:left;'>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <?php if (has_post_thumbnail( $post->ID ) ) ?>
        <img width = '500' height='300' src="<?=get_the_post_thumbnail_url();?>" />
		<?php
		the_content(
			//twenty_twenty_one_continue_reading_text()
		);

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'bootstrapnewstemplate' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'bootstrapnewstemplate' ),
			)
		);

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php //twenty_twenty_one_entry_meta_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
</div>
<?php endforeach; ?>
<!-- // dd($posts); -->

            <!-- <div class="col-lg-6"></div> -->
        </div>
		<div class='row'>
			<div class="col-lg-12"><?php wpbeginner_numeric_posts_nav(); ?></div>
		</div>
    </div>
</div>

<php get_footer(); ?>
 