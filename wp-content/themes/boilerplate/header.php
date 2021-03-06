<?php
/**
 * Header Template
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="no-js ie ie6 lte7 lte8 lte9" dir="<?php bloginfo('text_direction'); ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7 ]><html class="no-js ie ie7 lte7 lte8 lte9" dir="<?php bloginfo('text_direction'); ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8 lte8 lte9" dir="<?php bloginfo('text_direction'); ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9 lte9" dir="<?php bloginfo('text_direction'); ?>" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" dir="<?php bloginfo('text_direction'); ?>" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title>Dialog Group</title>
    <!-- #cat app-min.js -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/orbit/jquery.orbit.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/navbar.js"></script>
    <!-- endcat -->
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/orbit/orbit.css">
<?php
		//If you delete this line, the wordpress admin menu will not appear at the top of the page
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
<div id="wrapper">
<div id="nav-menu-wrap">
  <nav id="nav-menu" class="centered">
    <a href="/" id="dlg-logo">
      <div id="dlg-logo-top"></div>
      <div id="dlg-logo-bottom"></div>
    </a>
    <?php
      wp_nav_menu(array(
        'theme_location'  => 'primary',
        'menu'            => 'Top Navigation'
        )
      );
    ?>
    <div id="nav-menu-social-buttons">
      <a href="https://twitter.com/DialogGroup" id="twitter" target="_blank"></a>
      <a href="https://www.facebook.com/dialoggroup" id="facebook" target="_blank"></a>
      <a href="http://www.linkedin.com/company/409027?trk=prof-exp-company-name" id="linkedin" target="_blank"></a>
    </div>
  </nav>
</div>
<div id="nav-menu-slide">
  <div id="nav-menu-slide-center" class="centered">
  </div>
</div>
<div id="sub-menu-wrap">
  <nav id="sub-menu" class="centered">

  </nav>
</div>