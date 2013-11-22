<?php get_header( global_template_base() ); 
$url_field = get_field('hero_banner');
?>
<div id="banner-wrap" class="<?php if(!$url_field) { echo 'nohero'; } ?>">
  <?php
  if($url_field)
  {
  ?>
    <div id="banner-parallax-control">
    </div>
    <div id="banner" data-custom-background-image="<?php echo $url_field['url']; ?>" data-stellar-ratio="2" data-stellar-vertical-offset="95" data-stellar-offset-parent="true">
    </div>
    <div id="banner-bg-filler"></div>
  <div id="page-heading-wrap">
    <div id="page-heading-inner">
      <h1 id="page-heading"><?php the_title(); ?></h1>
    </div>
  </div>
  <?php } ?>
  
</div>
  <?php include global_template_path(); ?>
  <?php get_footer( global_template_base() ); ?>