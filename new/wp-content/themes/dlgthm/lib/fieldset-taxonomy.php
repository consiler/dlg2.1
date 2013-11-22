<?php
function fieldset_taxonomy_init() {
  // get the names of all the CPTs so we can assign the content_templates taxonomy to them
  $pt = get_post_types(array('show_ui' => true));
  // list of post types we won't consider for this tax, i.e. utility CPTs like acf, post, attachment, and page
  $pt_ignores = array('post', 'page', 'acf', 'attachment');
  $pt_to_assign_our_tax_to = array_diff($pt, $pt_ignores);
  // create a new taxonomy
  $labels = array(
    'name'              => _x( 'Fieldset Assignments', 'taxonomy general name' ),
    'singular_name'     => _x( 'Fieldset Assignment', 'taxonomy singular name' )
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'public'            => true
  );

  register_taxonomy( CPT_FIELDSET_TAX_NAME, $pt_to_assign_our_tax_to, $args );
}
add_action( 'init', 'fieldset_taxonomy_init' );
?>