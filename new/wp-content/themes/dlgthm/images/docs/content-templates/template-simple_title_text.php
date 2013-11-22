<?php
$flds = array('title', 'text');
verify_assigned_fieldset();
?>
<div class="block-wrap">
  <div class="block-center">
    <h1><?php the_field($flds[0]); ?></h1>
    <p><?php the_field($flds[0]); ?></p>
  </div>
</div>