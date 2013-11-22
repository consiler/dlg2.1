<?php
function dialog_admin_documentation_menu() {
  add_menu_page("Documentation", "Documentation", 'menu-documentation', 'menu-documentation', 'dialog_documentation_options', null, 24);
}

function dialog_documentation_options()
{
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  //require('../admin-documentation.php');
}

add_action('admin_menu', 'dialog_admin_documentation_menu');
?>