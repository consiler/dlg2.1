<?php
class FooterWalker extends Walker_Nav_Menu {
  //eliminates line breaks between lis in the footer.
  //allows us to get around whitespace put between inline-blocks
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>";
  }
}
class HeaderWalker extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $page_color_class = '';
    if($depth == 0)
    {
      $page_color_class = '000000';
      $page_color = get_field('theme_color', (int)$item->object_id);
      if(in_array($page_color, array(
        '#518fcc',
        '#572700',
        '#b42d38',
        '#e47f26',
        '#f4c017',
        '#becb31',
        '#007489',
        '#6d6e71',
        '#939598',
        '#bcbec0',
        '#e6e7e8',
        '#c5c19d',
        '#e1dcc9',
        '#f4f1e9'
      )))
      {
        $page_color_class = substr($page_color, 1);
      }
    }
    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    if($depth == 0)
      $class_names = $class_names ? ' data-theme-color="'.$page_color_class.'" class="' . esc_attr( $class_names ) . '"' : '';
    else
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $atts = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
?>