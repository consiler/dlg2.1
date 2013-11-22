<?php
/*
Template: Generic Post
Comment: Just an all purpose post template...
*/
$required_fields = array('content');
$fieldset = verified_fieldset($required_fields);
if($fieldset) {
?>
<div class="emphasized_paragraph">
  <div class="spyOnMe" id="content-section-<?php the_ID(); ?>">
    <h1 class="generic_post_h1"><?php the_field('title'); ?></h1>
    <?php the_field('content'); ?>
  </div>
</div>
<?php } else {
  fieldset_mismatch_error($required_fields);
} ?>