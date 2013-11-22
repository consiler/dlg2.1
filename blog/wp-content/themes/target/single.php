<?php get_header(); ?>
	
		<!--sub head container--><div id="subhead_container">

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

			<div class="meta-data">
			
			<?php target_posted_on(); ?> <?php _e( 'in', 'target' ); ?> <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'target' ), __( '1 Comment', 'target' ), __( '% Comments', 'target' ) ); ?>
			
			</div><!--meta data end-->
			<div class="clear"></div>

						<?php the_content( __( '', 'target' ) ); ?>
						<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'target' ), 'after' => '' ) ); ?>
						
						<?php the_tags('Social tagging: ',' > '); ?>
						
				 <nav id="nav-single"> <span class="nav-previous">
            <?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> Previous Post '); ?>
            </span> <span class="nav-next">
            <?php next_post_link( '%link', 'Next Post <span class="meta-nav">&rarr;</span>'); ?>
            </span> </nav>
						
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