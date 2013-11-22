<?php $l = page_get_cpt_list();
$frontpage_slides = $l[0]; ?>
<div class="fp-scrollspy-placeholder"></div>
<div class="fp-scrollspy">
  <div class="fp-scrollspy-inner fp-scrollspy-large">
    <?php render_cpt_with_template($frontpage_slides, 'fp_scrollspy_anchor'); ?>
  </div>
</div>
<?php
render_cpt_with_template($frontpage_slides, NULL, true);
?>