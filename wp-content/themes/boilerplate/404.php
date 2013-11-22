<?php

get_header(); ?>
<div id="internal-wrap">
  <div id="internal-header-wrap">
    <div id="internal-header" class="centered">
      <header id="internal-header-text">
        <h3>404 File Not Found</h3>
        <p>The requested page does not exist.</p>
      </header>
      <div id="internal-banner-image">
        <img src="">
      </div>
    </div>
  </div>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div id="internal-lower-wrap">
    <div id="internal-lower" class="centered">
      <div id="internal-main">
        <nav id="internal-main-nav">
        </nav>
        <article id="internal-main-content">
        </article>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>