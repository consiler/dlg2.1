<?php
$parent_id = $post->post_parent;
global $theme_color;
if($parent_id)
{
  //this is a child
  $theme_color = get_field('theme_color', (int)$parent_id);
} else {
  //this is a parent
  $theme_color = get_field('theme_color', (int)get_the_ID());
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php
    wp_head(); ?>
  </head>
  <body <?php body_class(); ?> data-stellar-background-ratio="0.5">
    <div class="header-wrap">
        <div class="header-inner">
          <div class="menu-wrap">
            <div class="menu-logo">
              <a href="/"></a>
              <div class="logo-top" <?php if($theme_color) { ?>style="background-color: <?php echo $theme_color; ?>" <?php } ?>></div>
              <img class="logo-bottom" src="<?php bloginfo('template_url'); ?>/images/dialog-logo.png">
            </div>
              <div class="menu">
              <?php
              $defaults = array(
                'theme_location'  => 'header-menu',
                'container'       => false,
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => new HeaderWalker()
              );
              wp_nav_menu($defaults);
              ?>
              </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="second-menu-wrap">
          <div class="second-menu">
          </div>
          <div class="second-menu-search">
          </div>
        </div>
      </div>
    <div id="body-wrap">