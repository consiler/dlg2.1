<?php
/**
 * Template Name: Main Page Template
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
    <div id="internal-header" class="centered">
      <header id="internal-header-text">
        <h1><?php the_field('page_heading_text'); ?></h1>
        <p><?php the_field('page_subheading_text'); ?></p>
      </header>
      <div id="internal-banner-image">
        <img src="<?php the_field('page_heading_image'); ?>">
      </div>
    </div>
  </div>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <div id="internal-lower-wrap">
    <div id="internal-lower" class="centered">
      <div id="internal-main"<?php if(!get_field('has_sidebar')){ ?> class="internal-main-fullwidth"<?php } ?>>
        <nav id="internal-main-nav">
          <ul>
            <?php $sidebar = get_field('left_sidebar'); if($sidebar == 'nav') include('template-child-sib-menu.php'); ?>
            <?php if($sidebar == 'jump'){ ?>
              <script>
              $(document).ready(function(){
                $('#internal-main-content h2').each(function(i,v){
                  $(v).attr('id', 'jump-heading-'+i);
                  $('#internal-main-nav > ul').append('<li><a href="#jump-heading-'+i+'">'+$(v).html()+'</a></li>');
                });
              });
              </script>
            <?php } ?>
          </ul>
        </nav>
        <article id="internal-main-content"<?php if(!get_field('has_sidebar')){ ?> class="internal-main-content-fullwidth"<?php } ?>>
          <?php the_content(get_the_ID()); ?>
        </article>
      </div>
      <?php if(get_field('has_sidebar')){ ?>
      <aside id="internal-sidebar">
        <?php if(get_field('detour_link_heading')){ ?>
        <div id="internal-sidebar-detour-link">
          <h4><?php the_field('detour_link_heading'); ?></h4>
          <a href="<?php the_field('detour_link_page'); ?>"><span class="lighter-grey-button"><?php the_field('detour_link_cta'); ?></span></a>
        </div>
        <?php } ?>
        <?php if(get_field('custom_html')){ ?>
          <div id="internal-sidebar-custom">
            <?php the_field('custom_html'); ?>
          </div>
        <?php } ?>
      </aside>
      <?php } ?>
    </div>
  </div>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>