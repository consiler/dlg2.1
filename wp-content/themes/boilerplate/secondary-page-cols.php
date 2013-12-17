<?php
/**
 * Template Name: Secondary Page Columns
 *
 * A custom page template with an optional sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<div id="internal-wrap">
  <div id="large-internal-header-wrap">
    <div id="large-internal-header" class="centered" style="background:url(<?php the_field('page_heading_image'); ?>); background-repeat: no-repeat; background-position:right;">
      <header id="large-internal-header-text">
        <h1 style="color: <?php the_field('header_text_color');?>;"><?php the_field('page_heading_text'); ?></h1>
        <p style="color: <?php the_field('header_text_color');?>;"><?php the_field('page_subheading_text'); ?></p>
        <?php if($label = get_field('header_cta_label', $id)){ ?>
         <a href="<?php the_field('header_cta_link'); ?>"><span class="lighter-grey-button"><?php echo $label; ?></span></a>
        <?php } ?>
      </header>
    </div>
  </div>
  
  <div id="internal-lower-wrap">
    <div id="fp-testimonials" class="centered">
    <div id="fp-testimonials-seemore">
      <?php
      $header = get_field('header_1');
      $copy = get_field('copy_1');
      ?>
      <h4><?php echo $header ?></h4>
      <p><?php echo $copy ?></p>
    </div>
    <div id="fp-testimonials-seemore">
      <?php
      $header = get_field('header_2');
      $copy = get_field('copy_2');
      $cta = get_field('cta_2');
      $cta_link = get_field('cta_link_2');
      ?>
      <h4><?php echo $header ?></h4>
      <p><?php echo $copy ?></p>
      <a href="<?php echo $cta_link ?>"><span class="light-grey-button"><?php echo $cta ?></span></a>
    </div>
    <div id="fp-testimonials-seemore">
      <?php
      $header = get_field('header_3');
      $copy = get_field('copy_3');
      $cta = get_field('cta_3');
      $cta_link = get_field('cta_link_3');
      ?>
      <h4><?php echo $header ?></h4>
      <p><?php echo $copy ?></p>
      <a href="<?php echo $cta_link ?>"><span class="light-grey-button"><?php echo $cta ?></span></a>
    </div>
    <!-- <div id="fp-testimonials-logos">
      <img src="<?php bloginfo('template_url'); ?>/images/testimonials-client-logos.jpg">
      <button><?php //arrow button, may indicate that this is a slideshow of images with logos ?></button>
    </div> -->
  </div>
</div>
<?php get_footer(); ?>