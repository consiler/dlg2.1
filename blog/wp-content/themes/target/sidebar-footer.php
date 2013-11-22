<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area'  )
		&& ! is_active_sidebar( 'fourth-footer-widget-area' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="footer-bar1">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</ul>
<?php endif; ?>
</div><!--footer 1 end-->


<div id="footer-bar2">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
					</ul>
<?php endif; ?>
</div><!--footer 2 end-->


<div id="footer-bar3">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
					</ul>
<?php endif; ?>
</div><!--footer 3 end-->


<div id="footer-bar4">
<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
					<ul class="xoxo">
						<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
					</ul>
<?php endif; ?>
</div><!--footer 4 end-->