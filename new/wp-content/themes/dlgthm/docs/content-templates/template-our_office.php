<?php
/*
Template: Office Member Bios
Comment: A template for a list/grid of people in the office
*/
?>
<div class="spyOnMe" id="content-section-<?php the_ID(); ?>">
  <h1>Our Office</h1>
  <div class="our_office">
     <?php render_cpt_with_template('our_office'); ?>
  </div>
</div>