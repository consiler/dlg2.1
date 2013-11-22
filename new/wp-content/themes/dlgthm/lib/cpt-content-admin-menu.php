<?php
//keeping until nav menu overhaul
$CPT_name_list = array(
  //About Us
    //Team
      'Office People',
      'Leadership People',
    'Faculty',
    'Our Partners',
    'Our Values',
    'News & Press',
  //Services
    //Marketing
      'Branding',
      'Messaging',
      'Demand Generation',
    //Leadership
      'Organizational Alignment',
    //Data & Analytics
      'RAD & TAM Modeling',
      'Campaign Performance',
      'Market Sizing',
    //Ecosystem Management
  //Industries
      //Healthcare
      //Technology
      //SMB
      //Channel
      //Public Sector
        'K12',
        'HED',
        'SLG',
        'FED',
  //Landing Page
    'Landing Slide',
  //Practice Areas
    //Digital
      'SEO',
      'Websites',
      'eCommerce',
      'Mobile Apps',
    //Analytics
    //Publishing
  //Insights
      //Blog
      //Publications/Articles
      //Live Dialog
        //View content
        //Upcoming Live Dialogs
        //Request an Invitation
  //Contact ("Reach Out maybe? lol")
      //Maps/Directions
        'Our Offices',
      //Connect via Social
      //Subscribe
      //Careers
      //Alumni
      //Open Door Program
  //Course Offerings
      //Health & Wellness
      //Leadership (Perch)
  //Landing Page
      //Clients
        'Client Logos',
        'Testimonials',
        'Case Studies'
      //Our Story
  );
$CPT_singular_name_list = array(
  //About Us
    //Team
      'Office People',
      'Leadership People',
    'Faculty',
    'Our Partners',
    'Our Values',
    'News & Press',
  //Services
    //Marketing
      'Branding',
      'Messaging',
      'Demand Generation',
    //Leadership
      'Organizational Alignment',
    //Data & Analytics
      'RAD & TAM Modeling',
      'Campaign Performance',
      'Market Sizing',
    //Ecosystem Management
  //Industries
      //Healthcare
      //Technology
      //SMB
      //Channel
      //Public Sector
        'K12',
        'HED',
        'SLG',
        'FED',
  //Landing Page
    'Landing Slide',
  //Practice Areas
    //Digital
      'SEO',
      'Websites',
      'eCommerce',
      'Mobile Apps',
    //Analytics
    //Publishing
  //Insights
      //Blog
      //Publications/Articles
      //Live Dialog
        //View content
        //Upcoming Live Dialogs
        //Request an Invitation
  //Contact ("Reach Out maybe? lol")
      //Maps/Directions
        'Our Offices',
      //Connect via Social
      //Subscribe
      //Careers
      //Alumni
      //Open Door Program
  //Course Offerings
      //Health & Wellness
      //Leadership (Perch)
  //Landing Page
      //Clients
        'Client Logos',
        'Testimonials',
        'Case Studies'
      //Our Story
  );

/*
 *-------------------------------------------------------
 *
 *         Top Level Content Admin Menu for CPTs
 *
 *-------------------------------------------------------
*/

function dialog_cpt_crud_menu() {
  add_menu_page("Content Manager", "Content", 'manage_options', 'content-manager', 'dialog_cpt_crud_options', null, 24);
}

function dialog_cpt_single_options()
{
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  echo '
  <script type="text/javascript">
    window.location="/wp-admin/edit.php?post_type=industrycontent";
  </script>';
}

add_action('admin_menu', 'dialog_cpt_crud_menu');
?>