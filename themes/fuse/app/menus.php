<?php
namespace Fuse\Menus;

/**
 * Remove WP Menu Item ID
 *
 * We want to remove the menu item ID from all WO menu items. This ID causes problems when we
 * try and duplicate the menus for mobile functionality and we don't ever need to tap into it
 * anyway!
 */
add_filter('nav_menu_item_id', __NAMESPACE__ . '\remove_wp_menu_item_attribute', 100, 1);
add_filter('page_css_class', __NAMESPACE__ . '\remove_wp_menu_item_attribute', 100, 1);
// Remove all Id's and classes except current-menu-item
function remove_wp_menu_item_attribute($var) {
  return '';
}

/**
 * Add a class to the WP Menus so we can style them
 * without affecting the rest of our anchors on the site
 */
add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\add_wp_menu_link_class', 100, 3);

function add_wp_menu_link_class($atts, $item, $args) {

  // All menus get the menu link class
  $atts['class'] = "c-menu__link";


  // Apply typography class to the primary menu only
  if( $args->theme_location == 'primary' ) {

    $atts['class'] .= " f-hs--m";

  }

  // Apply typography class to the utility menu only
  if( $args->theme_location == 'utility' ) {

    $atts['class'] .= " f-hs--base";

  }


  return $atts;

}