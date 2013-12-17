<?php
/**
 * Template Name: Story Page
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
        <h1><?php the_field('page_heading_text'); ?></h1>
        <p><?php the_field('page_subheading_text'); ?></p>
      </header>
    </div>
  </div>




<!-- Start of blocks -->

<div id="story-block" class="dg-even">
  <div class="container" style="height:200px">
  </div> 
</div>


<div id="story-block" class="dg-bg bg3">
  <div class="container">
    <div class="sectionhead" style="background:url(<?php the_field('storybg_1'); ?>); background-repeat: no-repeat; background-position:center;">
      <header>
      <?php
      $header_1 = get_field('header_1');
      $subheader_1 = get_field('subheader_1');
      ?>
      <h1><?php echo $header_1 ?></h1>
      <h2><?php echo $subheader_1 ?></h2>
    </header>
    </div>
  </div> 
</div>

<div id="story-block" class="dg-odd">
  <div class="container">
    <div id="vision" style="background:url(<?php the_field('vision'); ?>); background-repeat: no-repeat; background-position: center;">
  </div> 
</div>

<div id="story-block" class="dg-bg bg1">
  <div class="container">
    <div class="sectionhead" style="background:url(<?php the_field('storybg_2'); ?>); background-repeat: no-repeat; background-position:center;">
      <header>
      <?php
      $header_2 = get_field('header_2');
      $subheader_2 = get_field('subheader_2');
      ?>
      <h1><?php echo $header_2 ?></h1>
      <h2><?php echo $subheader_2 ?></h2>
    </header>
    </div>
  </div> 
</div>

<div id="story-block" class="dg-odd">
  <div class="container">
    <div id="approach"style="background:url(<?php the_field('approach'); ?>); background-repeat: no-repeat; background-position: center;">
  </div> 
</div>

<div id="story-block" class="dg-bg bg2">
  <div class="container">
    <div class="sectionhead" style="background:url(<?php the_field('storybg_3'); ?>); background-repeat: no-repeat; background-position:center;">
      <header>
      <?php
      $header_3 = get_field('header_3');
      $subheader_3 = get_field('subheader_3');
      ?>
      <h1><?php echo $header_3 ?></h1>
      <h2><?php echo $subheader_3 ?></h2>
    </header>
    </div>
  </div> 
</div>

<div id="story-block" class="dg-odd">
  <div class="container">
    <div id="do" style="background:url(<?php the_field('whatwedo'); ?>); background-repeat: no-repeat; background-position: center;">
  </div> 
</div>




<!-- End of blocks -->





</div>
<?php get_footer(); ?>