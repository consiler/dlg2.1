	<!--footer-->
	<div class="clear"></div>
		
		<div id="footer">
		
	<!--footer container--><div id="footer-container">
		
		<div id="footer-widget">
			
			<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with four columns of widgets.
			 */
			get_sidebar( 'footer' );
			?>
			
			</div><!--footer widget end-->
			
			<div id="footer-info">		
			
			<div id="copyright"><?php _e( 'Copyright', 'target' ); ?> <?php echo get_the_date( 'Y' ); ?> <?php echo of_get_option('footer_cr'); ?> | <?php _e( 'Powered by', 'target' ); ?> <a href="http://www.wordpress.com">WordPress</a> | target theme by <a href="http://www.antthemes.com">antthemes</a></div>
			
			<div id="follow-box"><p><?php _e( 'Follow us:', 'target' ); ?></p>
	
		<?php if (of_get_option('footer_youtube') != '' ) { ?><a href="<?php echo of_get_option('footer_youtube'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="Youtube" /></a> <?php }?>
		<?php if (of_get_option('footer_twitter') != '' ) { ?><a href="<?php echo of_get_option('footer_twitter'); ?> "><img src="<?php echo get_template_directory_uri(); ?>/images/Twitter.png" alt="Twitter" /></a><?php }?>
		<?php if (of_get_option('footer_facebook') != '' ) { ?><a href="<?php echo of_get_option('footer_facebook'); ?> "><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="facebook" /></a><?php }?>
	
	</div>
					
			</div><!--footer info end-->
			
		</div><!-- footer container-->
		
	<div class="clear"></div>		
			
	</div>
	
	<?php wp_footer(); ?>

</body>

</html>