<?php

function dialog_setup() {

  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

  register_nav_menus( 
    array(
       'header-menu' => 'Header Menu',
       'footer-menu' => 'Footer Menu'
      )
    );
  
  //custom img size for featured img, disp. on std. posts/pages.
  //add_theme_support( 'post-thumbnails' );
  //set_post_thumbnail_size(THUMB_W, THUMB_H, CROP_THUMBS);
}
add_action('after_setup_theme', 'dialog_setup');
?>