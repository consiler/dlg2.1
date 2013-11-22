<?php get_header(); ?>

<div id="home-container">

	<!--slideshow-->
	
	<div id="slideshow">

			<div>
			 <img src="<?php if(of_get_option('slider_image') != NULL){ echo of_get_option('slider_image');} else echo get_template_directory_uri() . '/images/slide1.png' ?>" alt="<?php echo of_get_option('slider_head'); ?>" />
			 
			 <?php if(of_get_option('slider_text') != NULL){ ?>
			 
			 <?php global $more;
				// set $more to 0 in order to only get the first part of the post
					$more = 0; ?>
			 <span class="information"><span class="info-title"><?php if(of_get_option('slider_head') != NULL){ echo of_get_option('slider_head');} else echo "Business wordpress theme" ?></span><p><?php if(of_get_option('slider_text') != NULL){ echo of_get_option('slider_text');} else echo "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam." ?></p>
			 <a href="<?php echo of_get_option('slider_link'); ?>"><span class="read-more-slide"><?php _e( 'Read More', 'target' ); ?></span></a>
			 </span>
			
			<?php } ?>
			
			</div>
		
		</div> <!--slideshow end-->

  </div><!--home container end-->

<div class="clear"></div>
				
		<!--boxes-->
		<div id="box_container">
				
		<?php for ($i = 1; $i <= 4; $i++) { ?>
		
		
				<div class="boxes <?php if ($i == 1) {echo "box1";} ?><?php if($i == 2) {echo "box2";} ?> <?php if($i == 3) {echo "box3";} ?>">
						<div class="box-head">
								
	<a href="<?php echo of_get_option('box_link' . $i); ?>"><img src="<?php if(of_get_option('box_image' . $i) != NULL){ echo of_get_option('box_image' . $i);} else echo get_template_directory_uri() . '/images/box' .$i. '.png' ?>" alt="<?php echo of_get_option('box_head' . $i); ?>" /></a>

					
					</div> <!--box-head close-->
					
				<div class="title-box">						
						
				<div class="title-head"><?php if(of_get_option('box_head' . $i) != NULL){ echo of_get_option('box_head' . $i);} else echo "Box heading" ?></div></div>
					
					<div class="box-content">

				<?php if(of_get_option('box_text' . $i) != NULL){ echo of_get_option('box_text' . $i);} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?>
					
					</div> <!--box-content close-->

				
				</div><!--boxes  end-->
				
		<?php } ?>
		
		</div><!--box-container end-->
			
			<div class="clear"></div>
		
	<!--welcome-->
	<div id="welcome_container">

		<div id="welcome-box">
		
	<h1><?php if(of_get_option('welcome_text') != NULL){ echo of_get_option('welcome_text');} else echo "write your headline here" ?></h1>
		
	</div>

</div><!--welcome end-->

<div class="clear"></div>
		
</div>
<!--wrapper end-->

<?php get_footer(); ?>