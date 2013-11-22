<?php get_header(); ?>

		<div id="subhead_container">

			<div id="subhead_wrapper">
				<div id="subhead">
		
		<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo 'Archives for '; single_tag_title();
	} elseif (is_archive() ) {
		echo (__( 'Archives for ', 'target' )); single_month_title();
	} else {
		wp_title('',true);
	} ?></h1>
			
			</div>
			
	<div id="search-header"><?php get_search_form(); ?></div><!--search header end-->
	
	<div class="clear"></div>		
			
			</div>
		</div>
		
			

		<!--content-->
		<div id="content_container">
			
			<div id="content">
		
				<div id="left-col">
			
			<?php get_template_part( 'loop', 'index' ); ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div> 
</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>