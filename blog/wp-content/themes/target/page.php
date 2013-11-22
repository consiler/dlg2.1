<?php get_header(); ?>
		
		<div id="subhead_container">

		<div id="subhead_wrapper">		
			<div id="subhead">
		
		<h1><?php the_title(); ?></h1>
			
			</div>
			
		<div id="search-header"><?php get_search_form(); ?></div><!--search header end-->
			
				<div class="clear"></div>
			
		</div>
	</div>		
	
		<!--content-->
		<div id="content_container">
			
			<div id="content">
		
				<div id="left-col">
		

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<div class="post-entry">

						<?php the_content(); ?>
						<div class="clear"></div>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'target' ), 'after' => '' ) ); ?>
						
					</div><!--post-entry end-->
					
					<?php comments_template( '', true ); ?>

<?php endwhile; ?>
</div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div> 
</div>
<!--content end-->
	
</div>
<!--wrapper end-->
<?php get_footer(); ?>