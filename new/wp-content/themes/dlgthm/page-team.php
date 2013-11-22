<?php
/* Template Name: Team Template */
?>
<div class="content-wrap">
  <?php
  $cpt_info = get_field('cpt_set');
  $cpt_info = explode(', ', $cpt_info);
  $office_team = $cpt_info[1];
  $senior_team = $cpt_info[0];
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
        <?php render_cpt_with_template($senior_team, 'generic_scrollspy_li'); ?>
      </ul>
    </div>
  <?php } ?>
  <div class="content-body <?php if(!$scrollspy) { echo 'content-body-fullwidth'; } ?>">
    <?php
      render_cpt_with_template($senior_team);
    ?>
  </div>
</div>