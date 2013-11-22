<?php
/*
 *-------------------------------------------------------
 *
 *                    Template Wrapper
 *
 *-------------------------------------------------------
*/

function global_template_path() {
  return Global_Wrapping::$main_template;
}

function global_template_base() {
  return Global_Wrapping::$base;
}


class Global_Wrapping {

  /**
   * Stores the full path to the main template file
   */
  static $main_template;

  /**
   * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
   */
  static $base;

  static function wrap( $template ) {
    self::$main_template = $template;

    self::$base = substr( basename( self::$main_template ), 0, -4 );

    if ( 'index' == self::$base )
      self::$base = false;

    $templates = array( 'docs/wrapper/wrapper.php' );

    if ( self::$base )
      array_unshift( $templates, sprintf( 'docs/wrapper/wrapper-%s.php', self::$base ) );

    return locate_template( $templates );
  }
}
add_filter( 'template_include', array( 'Global_Wrapping', 'wrap' ), 99 );
?>