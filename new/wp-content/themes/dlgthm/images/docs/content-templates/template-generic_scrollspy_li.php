<?php
/*
Template: Generic Scrollspy Li
Comment: Simply displays the title. Css is done from the wrapper ul element. To customize, just make a template like this with a custom class or id.
*/
?>
<li>
  <a href="#content-section-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a>
</li>