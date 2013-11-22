<?php
/*
Template: Team Member Bio
Comment: A template for a short fixed width bio of senior management.
*/
$required_fields = array(
  'name',
  'bio',
  'title',
  'headshot');
$fieldset = verified_fieldset($required_fields);
if($fieldset) {
?>
<div class="team_profile_right">
  <div class="spyOnMe" id="content-section-<?php the_ID(); ?>">
    <?php
      $headshot = get_field('headshot');
      if($headshot){
       echo "<img src=".$headshot['url']."></img>";
      }
    ?>
    <h1><?php the_field('name'); ?></h1>
    <p class="employee-title-field"><?php the_field('title'); ?></p>
    <p><?php the_field('bio'); ?></p>
  </div>
</div>
<?php } else {
  fieldset_mismatch_error($required_fields);
} ?>