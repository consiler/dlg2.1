<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

		<div id="subhead_container">
			
			<div id="subhead_wrapper">
				<div id="subhead">
		
		<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo 'Archives for '; single_tag_title();
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
			
<?php

global $more; $more = false; # some wordpress wtf logic

  $query_args = array(
     'post_type' => 'post', 
     'paged' => $paged
      );

query_posts($query_args);

if (have_posts()) : while (have_posts()) : the_post();

	$thumb_small = '';
								
	if(has_post_thumbnail(get_the_ID(), 'large'))
	{
	    $image_id = get_post_thumbnail_id(get_the_ID());
	    $thumb_small = wp_get_attachment_image_src($image_id, 'large', true);

	}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-head">
	
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'target' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			</div><!--post-heading end-->
			
			<div class="meta-data">
			
			<?php target_posted_on(); ?> in <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'target' ), __( '1 Comment', 'target' ), __( '% Comments', 'target' ) ); ?>
			
			</div><!--meta data end-->
			<div class="clear"></div>

<div class="post-entry <?php if ($thumb_small <> '') {echo "timbg";} ?>">
	
				<?php if($thumb_small<>'') { ?>
		
		<a href="<?php the_permalink() ?>"><img src="<?php echo $thumb_small[0]; ?>" alt="<?php the_title(); ?>" /></a>
		
		<?php } ?>
		
			<?php the_content( __( '<span class="read-more">Read More</span>', 'target' ) ); ?>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'target' ), 'after' => '' ) ); ?>
				
				
				</div><!--post-entry end-->


		<?php comments_template( '', true ); ?>

</div> <!--post end-->

<?php endwhile; endif; ?>

<!--pagination-->
<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } 
		else { ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link( __( '&larr; Older posts', 'target' ) ); ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'target' ) ); ?></div>
	</div><?php } ?>

</div> <!--left-col end-->

<?php get_sidebar(); ?>

	</div>
</div>
<!--content end-->
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>