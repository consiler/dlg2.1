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
  <div id="internal-header-wrap">
    <div id="internal-header" class="centered" style="background:url(<?php the_field('page_heading_image'); ?>); background-repeat: no-repeat; background-position:right;">
      <header id="internal-header-text">
        <h1><?php the_field('page_heading_text'); ?></h1>
        <p><?php the_field('page_subheading_text'); ?></p>
      </header>
    </div>
  </div>




<!-- Start of blocks -->

<div id="story-block" class="dg-bg bg3">
  <div class="container">
    <div class="sectionhead">
      <header>
      <h1>OUR VISION</h1>
      <h2>clarity. alignment. flexibility.</h2>
    </header>
    </div>
  </div> 
</div>

<div id="story-block" class="dg-odd">
  <div class="container">
    <img id="vision">
  </div> 
</div>

<div id="story-block" class="dg-bg bg1">
  <div class="container">
    <div class="sectionhead">
      <header>
      <h1>OUR APPROACH</h1>
      <h2>analysis. expertise. advise.</h2>
    </header>
    </div>
  </div> 
</div>

<div id="story-block" class="dg-odd">
  <div class="container">
    <img id="approach">
  </div> 
</div>

<div id="story-block" class="dg-bg bg2">
  <div class="container">
    <div class="sectionhead">
      <header>
      <h1>WHAT WE DO</h1>
      <h2>growth acceleration.</h2>
    </header>
    </div>
  </div> 
</div>

<div id="story-block" class="dg-odd">
  <div class="container">
    <img id="do">
  </div> 
</div>




<!-- End of blocks -->





</div>
<?php get_footer(); ?>