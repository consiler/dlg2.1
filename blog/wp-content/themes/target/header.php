<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php if (is_front_page() ) {
    bloginfo('name');
	} elseif ( is_category() ) {
		single_cat_title(); echo ' - ' ; bloginfo('name');
	} elseif (is_single() ) {
		single_post_title();
	} elseif (is_page() ) {
		single_post_title(); echo ' - '; bloginfo('name');
	} elseif (is_archive() ) {
		single_month_title(); echo ' - '; bloginfo('name');
	} else {
		wp_title('',true);
	} ?></title>
			
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!--wrapper-->
	<div id="wrapper">
	
	<!--headercontainer-->
	<div id="header_container">
	
		<!--header-->
		<div id="header2">

				<?php if ( ( of_get_option('logo_image') ) != '' ) { ?>
		<div id="logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><img src="<?php echo of_get_option('logo_image'); ?>" alt="<?php echo of_get_option('footer_cr'); ?>" /></a></div><!--logo end-->
	<?php } else { ?>
			<div id="logo2"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo( 'name' ); ?></a></div><!--logo end-->
	<?php } ?>
			
			<!--menu-->
			
		<div id="menubar">
	
	<?php $navcheck = wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class' => 'dropdown dropdown-horizontal reset' ,'fallback_cb' => '', 'echo' => false ) );  ?>
	
	 <?php  if ($navcheck == '') { ?>
	
	<ul class="dropdown dropdown-horizontal reset">
		<li class="page_item"><a href="<?php echo home_url(); ?>" title="Home">Home</a></li>				
		<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>

	</ul>
<?php } else echo($navcheck); ?> 

	</div>
		
	
	<!--menu end-->
			
			<div class="clear"></div>
			
		</div><!-- header end-->
		
	</div><!--header container end-->	
		
