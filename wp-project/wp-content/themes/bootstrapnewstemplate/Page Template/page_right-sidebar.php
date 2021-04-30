<?php
/**
* Template Name: Right-Sidebar
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-8">
    <div class="sn-content">
        <h1 class="sn-title"><?=$post->post_title?></h1>
        <?=$post->post_content;?>
    </div>
    </div>
    <div class="col-sm-4">
      <h1 class='title'>Right Sidebar</h1>
    </div>
  </div>
</div>

<?php get_footer(); ?>