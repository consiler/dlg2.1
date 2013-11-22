<?php
/**
 * Enqueues scripts and styles for front end.
 * @return void
 */

function dialog_scripts_styles() {
  // Adds JavaScript to pages with the comment form to support sites with
  // threaded comments (when in use).
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  // Loads Boilerplate plugins JS
  wp_enqueue_script('dialog-boilerplate-js', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '0.1', true);

  //Loads Stellar, a lib we use to do parallax effects
  wp_enqueue_script('stellar-js', get_template_directory_uri() . '/js/bower_components/jquery.stellar/jquery.stellar.js', array('jquery'), '0.1', true);

  //Loads main JS
  wp_enqueue_script('dialog-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '0.1', true);

  //Loads formalize
  wp_enqueue_script('dialog-main-js', get_template_directory_uri() . '/js/jquery.formalize.js', array('jquery'), '0.1', true);

  //Loads scrollspy
  global $scrollspy;
  $scrollspy = get_field('scrollspy', get_the_ID());
  if($scrollspy)
  {
    wp_enqueue_script('dialog-scrollspy-js', get_template_directory_uri() . '/js/spybar.js', array('jquery'), '0.1', true);
  }
  wp_enqueue_script('dialog-hero-parallax', get_template_directory_uri() . '/js/hero-parallax.js', array('jquery'), '0.1', true);

  // Add Genericons font, used in the main stylesheet.
  wp_enqueue_style('genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09');

  // Loads our theme metadata stylesheet.
  wp_enqueue_style('dialog-style', get_stylesheet_uri(), array(), '2013-07-18');

  //Loads our actual stylesheet.
  wp_enqueue_style('dialog-main-style', get_template_directory_uri() . '/css/main.css', array(), '0.1');

  //Loads the formalize stylesheet.
  wp_enqueue_style('dialog-formalize-style', get_template_directory_uri() . '/css/formalize.css', array(), '0.1');

  if(is_front_page())
  {
    //Loads the front page stylesheet.
    wp_enqueue_style('dialog-fp', get_template_directory_uri() . '/css/frontpage.css', array(), '0.1');
    //Loads front page scripts
    wp_enqueue_script('dialog-fp-script', get_template_directory_uri() . '/js/frontpage.js', array('jquery'), '0.1', true);
  }

  // Loads the Internet Explorer specific stylesheet.
  //wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '0.1' );
  //wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'dialog_scripts_styles' );
?>