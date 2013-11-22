<?php
/* Template Name: Contact Page */
?>
<div class="content-wrap content-wrap-pad-top">
  <div class="content-body <?php if(!$scrollspy) { echo 'content-body-fullwidth'; } ?>">
    <div class="contact-top">
      Banner will go here.
    </div>
    <div class="contact-wrap">
      <div class="contact-left">
        <p>Thank you for your interest in Dialog.</p>
      </div>
      <div class="contact-right">
        <div class="contact-form-wrap">
          <?php if(function_exists('ninja_forms_display_form')){ ninja_forms_display_form(1); } ?>
        </div>
      </div>
    </div>
  </div>
</div>