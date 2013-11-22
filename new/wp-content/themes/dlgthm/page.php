<?php
/* Template Name: Generic Page */
?>
<div class="content-wrap">
  <?php
  $cpt_info = get_field('cpt_set');
  //No cpt, no page.
  if(!$cpt_info) die('Every page needs a CPT. This one doesn\'t. Go fix this by editing this page.');
  if($scrollspy)
  {
  ?>
    <div class="content-scrollspy">
      <ul id="spyMenu">
        <style type="text/css">
          #spyMenu > li.active > a { border-right: 5px  solid; color: <?php echo $theme_color; ?>; }
        </style>
        <?php render_cpt_with_template($cpt_info, 'generic_scrollspy_li'); ?>
      </ul>
    </div>
  <?php } ?>
  <div class="content-body <?php if(!$scrollspy) { echo 'content-body-fullwidth'; } ?>">
    <?php
      render_cpt_with_template($cpt_info);
    ?>
  </div>
</div>