<?php
/*
Template: News & Press
Comment: A template for news and press entries
*/
$required_fields = array(
  'article_title',
  'article_link',
  'article_blurb'
  );
$fieldset = verified_fieldset($required_fields);
if($fieldset) {
?>
<div class="news_press">
  <div class="spyOnMe" id="content-section-<?php the_ID(); ?>">
   <!--  <?php
      $headshot = get_field('article_title');
      if($headshot){
        echo $headshot;
      }
    ?> -->
    <h1><?php the_field('article_title'); ?></h1>
    <p class="article_blurb"><?php the_field('article_blurb'); ?></p>
  </div>
</div>
<?php } else {
  fieldset_mismatch_error($required_fields);
} ?>