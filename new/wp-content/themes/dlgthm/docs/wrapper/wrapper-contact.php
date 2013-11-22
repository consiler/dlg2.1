<?php get_header( global_template_base() ); 
?>
<div id="banner-wrap" class="nohero">
  <div id="page-heading-wrap">
    <div id="page-heading-inner" class="light">
      <h1 id="page-heading" class="light"><?php the_title(); ?></h1>
    </div>
  </div>
</div>
  <?php include global_template_path(); ?>
  <?php get_footer( global_template_base() ); ?>