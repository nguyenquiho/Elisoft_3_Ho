<?php
// use WP_Widget;

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

    // Register Foo_Widget widget
    // add_action( 'widgets_init', 'register_my_widget' );
 
    // function register_my_widget() {
    //     register_widget( 'widgets\Foo_Widget_Class' );
    // }


// Register Foo_Widget widget
// add_action( 'widgets_init', 'register_foo' );
     
// function register_foo() { 
//     register_widget( 'Foo_Widget' ); 
// }

function test_action($post_id){
    echo "output from callback 1 $post_id <br>";
}

function test_action2(){
    echo "output from callback 2<br>";
}

add_action('my_action','test_action',12);
add_action('my_action','test_action2',11);

function test_filter($params1,$params2){
    return '<b>'.$params1.$params2.'</b>';
}
function test_filter2($params2){
    return '<i>'.$params2.'</i>';
}
add_filter('my_filter','test_filter',10,2);
add_filter('my_filter','test_filter2',11);



function my_general_settings_register_fields() {

    register_setting('general', 'phone_number', 'esc_attr'); 
    add_settings_field(
        'phone_number', 
        '<label for="phone_number">'.__('Phone number' , 'phone_number' ).'</label>' , 
        'my_general_phone_number', 
        'general'
    ); 


    register_setting('general', 'general_email', 'esc_attr'); 
    add_settings_field(
        'general_email', 
        '<label for="general_email">'.__('Email' , 'general_email' ).'</label>' , 
        'my_general_email', 
        'general'
    );

    
    // register_setting('general', 'general_ads', 'esc_attr'); 
    // add_settings_field(
    //     'general_ad', 
    //     '<label for="general_ads">'.__('Adversity' , 'general_ads' ).'</label>' , 
    //     'my_general_ads', 
    //     'general'
    // );

    // register_setting('general', 'general_logo', 'esc_attr'); 
    // add_settings_field(
    //     'general_logo', 
    //     '<label for="general_logo">'.__('Logo' , 'general_logo' ).'</label>' , 
    //     'my_general_logo', 
    //     'general'
    // );
        
    
    }

function my_general_phone_number() { 
$phone_number = get_option( 'phone_number', '' ); 
echo '<input id="phone_number" style="width: 35%;" type="number" name="phone_number" value="' . $phone_number . '" />'; 
}

function my_general_email() { 
$email = get_option( 'general_email', '' ); 
echo '<input id="general_email" style="width: 35%;" type="text" name="general_email" value="' . $email . '" />'; 
}


add_filter('admin_init', 'my_general_settings_register_fields'); 



// add_filter('admin_init', 'general_settings_register_fields'); 

function add_general_setting_upload_file()
{
    //add_settings_section("section", "Section", null, "general");
    add_settings_field("logo-file", "Logo", "upload_file_display", "general",'default',array( 'name' => 'logo' ));  
    register_setting("general", "logo-file", "handle_file_upload_logo");

    //add_settings_section("section", "Section", null, "general");
    add_settings_field("ads-file", "Advertisement", "upload_file_display", "general",'default',array( 'name' => 'ads' ));  
    register_setting("general", "ads-file", "handle_file_upload_ads");

}

function handle_file_upload_logo($option)
{

  if(!empty($_FILES["logo-file"]["tmp_name"]))
  {

    $urls = wp_handle_upload($_FILES["logo-file"], array('test_form' => FALSE));
    //dd($urls);
    $temp = $urls["url"];

    return $temp;  
  }
 
  return $option;
}

function handle_file_upload_ads($option)
{
    if(!empty($_FILES["ads-file"]["tmp_name"]))
    {
      $urls = wp_handle_upload($_FILES["ads-file"], array('test_form' => FALSE));
      $temp = $urls["url"];
        //dd($urls);
      return $temp;  
    }  
 
  return $option;
}

function upload_file_display($args)
{   


    if($args['name'] == 'logo'){
        $val = '';
        $val = get_option('logo-file'); ?>
        <input type="file" name="logo-file" value='<?=$val;?>' />
        <?php   echo get_option('logo-file');
    }
    if($args['name'] == 'ads'){
        $val = '';
        $val = get_option('ads-file'); ?>
        <input type="file" name="ads-file" value='<?=$val;?>' />
        <?php   echo get_option('ads-file');
    }


}

add_filter("admin_init", "add_general_setting_upload_file");


function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
    printf( '<li>%s</li>' . "\n", "Page $paged of $max" );
    //echo '<li>Page of</li>';

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        // printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
        
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) ){
            //echo '<li>…</li>';
        }
            
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
    
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            //echo '<li>…</li>' . "\n";
    
        $class = $paged == $max ? ' class="active"' : '';
    }
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), 'Last &raquo;' );
    echo '</ul></div>' . "\n";
 
}




