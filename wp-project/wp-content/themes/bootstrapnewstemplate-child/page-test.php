<?php
/* Tao action */

echo 'Action';
echo '<br>';

do_action('my_action',$post->ID);
echo"<hr>";
// do_action('my_action');


/* Tao filter */
// echo 'Filter';
// echo '<br>';
$test = 1;
$test2 = 2;
// echo apply_filters('my_filter',$test1);

echo apply_filters('my_filter',$test,$test2);
// echo apply_filters('my_filter',$test2);

// $my_widget = new Counter();
//dd($my_widget);


// WP Globals
// global $table_prefix, $wpdb;

// // Customer Table
// $customerTable = $table_prefix . 'counter';
// $sql = "CREATE TABLE `$customerTable` (";
// $sql .= " `count` int NOT NULL,";
// $sql .= " `ip` text NOT NULL,";
// $sql .= " `date` DATE  NOT NULL DEFAULT CURRENT_TIMESTAMP,";
// $sql .= " CONSTRAINT uinque_wp_counter UNIQUE (ip,date));";
// echo $sql;
// // $wpdb->query($sql);

// $sql = "REPLACE INTO $customerTable (`count`, `date`) VALUES (`count` + 1,date('Y-m-d'));";

// echo $sql;

// $ip = $_SERVER['REMOTE_ADDR'];
// // $customerTable = $table_prefix . 'counter';
// // echo $sql = "REPLACE INTO $customerTable (`count`,`ip`, `date`) VALUES (`count` + 1, '$ip',CURRENT_TIMESTAMP);";
// // $wpdb->query($sql);
// $count = $wpdb->get_results("SELECT `count` FROM $customerTable WHERE `ip` = '$ip'");
// // dd($count);
// echo '--------';
// $today = date("Y-m-d");
// echo $today;
// echo "<br>";
// $num = 12345;
// function display_by_image($num){
//     $result = str_split($num);
//     foreach($result as $re):
//         echo "<img src='$re.jpg' alt='Girl in a jacket' width='20' height='30'>";
//     endforeach;
// }
// display_by_image($num);

// $current_user = wp_get_current_user();
// dd($_SESSION['visiter']);


