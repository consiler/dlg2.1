<?php
$myID = get_the_ID();

//this makes the link to current page blue
$current_page_class = "current-page";

//this menu is based on parent-child relationships of the pages themselves
//it's a backup for when we can't get information from the top nav menu
function dlg_default_sidebar_menu() {
  global $myID;
  $all_pages = get_pages();
  $children = get_page_children($myID, $all_pages);
  $children_count = 0;
  foreach($children as $child)
  {
    $children_count++;
    $child_href = get_page_link($child->ID);
    $child_title = $child->post_title;
    ?>
      <li><a href="<?php echo $child_href; ?>"><?php echo $child_title; ?></a></li>
    <?php
  }
  if(!$children_count){
    $all_pages = get_pages();
    $children = get_page_children($post->post_parent, $all_pages);
    $children_count = 0;
    foreach($children as $child)
    {
      $children_count++;
      $child_href = get_page_link($child->ID);
      $child_title = $child->post_title;
        echo '<li><a ';
        if($child->ID == $myID) echo 'class="'.$current_page_class.'" ';
        echo 'href="'.$child_href.'">'.$child_title.'</a></li>';
    }
  }
}

if($nav_items = wp_get_nav_menu_items('Top Navigation')) {
  $parent = 0;
  $myNavID = -1;
  //linear search for the current page in nav_items
  //if found, save the menu_item ID and the nav parent
  foreach ($nav_items as $nav_item) {
    if($nav_item->object_id == $myID) {
      $myNavID = $nav_item->ID;
      $parent = $nav_item->menu_item_parent;
    }
  }
  //if we never found this page in the nav, display the default menu
  if($myNavID == -1)
    dlg_default_sidebar_menu();
  //otherwise print the children/siblings of this page
  else {
    //if this is a top level page, print its children
    //otherwise print its siblings
    if(!$parent) $parent = $myNavID;
    foreach ($nav_items as $sb_menu_item) {
      if ($sb_menu_item->menu_item_parent == $parent) {
        echo '<li><a ';
        if ($sb_menu_item->ID == $myNavID)
          echo 'class="'.$current_page_class.'" ';
        echo 'href="'.$sb_menu_item->url.'">'.$sb_menu_item->title.'</a></li>';
      }
    }
  }
}
else dlg_default_sidebar_menu();
?>