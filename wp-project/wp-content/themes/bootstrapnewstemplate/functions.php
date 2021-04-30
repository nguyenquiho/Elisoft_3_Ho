<?php
require get_template_directory().'/inc/menu-functions.php';

function dd($var){
	echo"<pre>";
	print_r($var);
	echo"</pre>";
	die();
}



if ( ! function_exists( 'myfirsttheme_setup' ) ) :
	//Add CSS
	wp_enqueue_style( 'css-boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
	wp_enqueue_style( 'font-awsome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/lib/slick/slick.css',false,'1.1','all');
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/lib/slick/slick-theme.css',false,'1.1','all');
	wp_enqueue_style( 'style', get_stylesheet_uri() );


	// Add Js
	wp_enqueue_script( 'js-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js',array('jquery'));
	wp_enqueue_script( 'js-boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js');
	wp_enqueue_script( 'js-easing', get_template_directory_uri() . '/lib/easing/easing.min.js',array(), 1.1 , true);
	wp_enqueue_script( 'js-slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array(), 1.1 , true);
	wp_enqueue_script( 'js-main', get_template_directory_uri() . '/js/main.js', array(), 1.1 , true);

	// Add filters to catch and modify the styles and scripts as they're loaded.
	// add_filter( 'style_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2 );
	// add_filter( 'script_loader_tag', __NAMESPACE__ . '\wpdocs_my_add_sri', 10, 2 );
	
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function myfirsttheme_setup() {
	 
		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );
	 
		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );
	 
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );
	 
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
			'secondary' => __('Secondary Menu', 'myfirsttheme' ),
			'social' => __('Social Menu', 'myfirsttheme' ),
			'contact' => __('Contact Menu', 'myfirsttheme' ),
			'footer' => __('Footer Menu', 'myfirsttheme' )
		) );
	 
		/**
		 * Enable support for the following post formsats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
	endif; // myfirsttheme_setup
	add_action( 'after_setup_theme', 'myfirsttheme_setup' );



	function bootstrap_news_template_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 1', 'bootstrapnewstemplate' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'bootstrapnewstemplate' ),
				'before_widget' => '<div class="col-lg-3 col-md-6"><div class="footer-widget">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3 class="title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Footer 2', 'bootstrapnewstemplate' ),
				'id'            => 'left-sidebar-2',
				'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'bootstrapnewstemplate' ),
				'before_widget' => '<div style="color:white" class="col-lg-3 col-md-6"><div class="footer-widget">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3 class="title">',
				'after_title'   => '</h3>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Right Footer 2', 'bootstrapnewstemplate' ),
				'id'            => 'right-sidebar-2',
				'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'bootstrapnewstemplate' ),
				'before_widget' => '<div style="color:white" class="col-lg-9 col-md-6"><div class="footer-widget">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h3 class="title">',
				'after_title'   => '</h3>',
			)
		);
	}
	add_action( 'widgets_init', 'bootstrap_news_template_widgets_init' );

	function getCrunchifyPostViews($postID){
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0 View";
		}
		return $count.' Views';
	}
	 
	function setCrunchifyPostViews($postID) {
		$count_key = 'post_views_count';
		$count = get_post_meta($postID, $count_key, true);
		if($count==''){
			$count = 0;
			// delete_post_meta($postID, $count_key);
			// add_post_meta($postID, $count_key, '0');
			update_post_meta($postID, $count_key, 1);
		}else{
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}
	 
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


	function register_my_session(){
		if( !session_id() )
			{
				session_start();
			}
	}

	add_action('init', 'register_my_session');

	function count_cat_post($category) {
		if(is_string($category)) {
			$catID = get_cat_ID($category);
		}
		elseif(is_numeric($category)) {
			$catID = $category;
		} else {
			return 0;
		}
		$cat = get_category($catID);
		return $cat->count;
		}


	//wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css',false,'1.1','all');
	// // Changing excerpt more
	// function new_excerpt_more($more) {
	// 	global $post;
	// 	return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
	// 	}
	// 	add_filter('excerpt_more', 'new_excerpt_more');
	
	// // Register Foo_Widget widget
	// add_action( 'widgets_init', 'register_foo' );

	// function register_foo() { 
	// 	register_widget( 'Foo_Widget' ); 
	// }

	// function add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() ) {
	// 	global $wp_settings_fields;
	 
	// 	if ( 'misc' === $page ) {
	// 		_deprecated_argument(
	// 			__FUNCTION__,
	// 			'3.0.0',
	// 			sprintf(
	// 				/* translators: %s: misc */
	// 				__( 'The "%s" options group has been removed. Use another settings group.' ),
	// 				'misc'
	// 			)
	// 		);
	// 		$page = 'general';
	// 	}
	 
	// 	if ( 'privacy' === $page ) {
	// 		_deprecated_argument(
	// 			__FUNCTION__,
	// 			'3.5.0',
	// 			sprintf(
	// 				/* translators: %s: privacy */
	// 				__( 'The "%s" options group has been removed. Use another settings group.' ),
	// 				'privacy'
	// 			)
	// 		);
	// 		$page = 'reading';
	// 	}
	 
	// 	$wp_settings_fields[ $page ][ $section ][ $id ] = array(
	// 		'id'       => $id,
	// 		'title'    => $title,
	// 		'callback' => $callback,
	// 		'args'     => $args,
	// 	);
	// }
	

