<?php get_header(); ?>

		<div id="subhead_container">
			
			<div id="subhead_wrapper">
				<div id="subhead">
		
		<h1><?php if ( is_category() ) {
		single_cat_title();
	} elseif (is_archive() ) {
		echo 'Archives for '; single_month_title();
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
        
<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
          
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <p><?php _e('&#8249; Return to', 'target'); ?> <a href="<?php echo get_permalink($post->post_parent); ?>" rel="gallery"><?php echo get_the_title($post->post_parent); ?></a></p>

			<div class="meta-data">
			
			<?php target_posted_on(); ?> | <?php comments_popup_link( __( 'Leave a comment', 'target' ), __( '1 Comment', 'target' ), __( '% Comments', 'target' ) ); ?>
			
			</div><!--meta data end-->
			<div class="clear"></div>
                                
                <div class="attachment-entry">
                    <a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'large' ); ?></a>
					<?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
                    <?php the_content(__('Read more &#8250;;', 'target')); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'target'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->

          <nav id="nav-single">
				<span class="nav-previous"><?php previous_image_link( false, '&larr; Previous Image' ); ?></span>
				<span class="nav-next"><?php next_image_link( false, 'Next Image &rarr;' ); ?></span>
            </span> </nav>
                        
                <?php if ( comments_open() ) : ?>
                <div class="post-data">
				    <?php the_tags(__('Tagged with:', 'target') . ' ', ', ', '<br />'); ?> 
                    <?php the_category(__('Posted in %s', 'target') . ', '); ?> 
                </div><!-- end of .post-data -->
                <?php endif; ?>             

            <div class="post-edit"><?php edit_post_link(__('Edit', 'target')); ?></div>             
            </div><!-- end of #post-<?php the_ID(); ?> -->
            
			<?php comments_template( '', true ); ?>
            
        <?php endwhile; ?>  

<?php endif; ?>  
      
  </div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div>
</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>