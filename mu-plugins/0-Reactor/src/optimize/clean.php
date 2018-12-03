<?php
namespace Reactor\Optimize\Clean;
use Reactor\Helpers\Posts;

/**
 * Clean up output of stylesheet <link> tags
 *
 * Taken from roots/soil
 * @link https://github.com/roots/soil/blob/master/modules/clean-up.php#L77
 */
add_filter('style_loader_tag', __NAMESPACE__ . '\clean_style_tag');

function clean_style_tag( $input ) {

    preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);

    if (empty($matches[2])) {
      return $input;
    }

    // Only display media if it is meaningful
    $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';

    return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";

  }


/**
 * Clean up output of <script> tags
 *
 * Taken from roots/soil
 * @link https://github.com/roots/soil/blob/master/modules/clean-up.php#L91
 */
add_filter('script_loader_tag', __NAMESPACE__ . '\clean_script_tag');

function clean_script_tag( $input ) {

    $input = str_replace( "type='text/javascript' ", '', $input );

    return str_replace( "'", '"', $input );

}

/**
 * Add and remove body_class() classes
 *
 * Taken from roots/soil
 * @link https://github.com/roots/soil/blob/master/modules/clean-up.php#L100
 */
add_filter('body_class', __NAMESPACE__ . '\body_class');

function body_class($classes) {

    // Add post/page slug if not present
    if ( is_single() || is_page() && ! is_front_page()) {

      if ( ! in_array( basename(get_permalink() ), $classes) ) {

        $classes[] = basename( get_permalink() );

      }

    }

    // Remove unnecessary classes
    $home_id_class = 'page-id-' . get_option('page_on_front');

    $remove_classes = [

      'page-template-default',
      $home_id_class

    ];

    $classes = array_diff( $classes, $remove_classes );

    return $classes;

  }


/**
 * REMOVE Support for WP-EMOJIS
 * because the script force loads in header...boooooooo
 *
 * @since  1.0.0
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove RSD Link from WP-Head
 *
 * If you need to add integration with services like Flickr...add this back.
 *
 * @since 1.0
 */
remove_action('wp_head', 'rsd_link');

/**
 * Remove Windows Live Writer
 *
 * @since  1.0.0
 */
remove_action('wp_head', 'wlwmanifest_link');


/**
 * Remove Post Relational Links
 *
 * @since  1.0.0
 */

remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );


/**
 * Remove Comment Feed Links from Head
 * @url https://wordpress.stackexchange.com/questions/190509/where-to-remove-link-from-comments-feed?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
 **/
add_filter( 'feed_links_show_comments_feed', '__return_false' );

/**
 * Remove WP Shortlink from Head
 */
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);



/**
 * Using Jetpack for WooCommerce Shipping Labels and we
 * DO NOT want it to load anything else. We can remove every
 * Jetpack Module from Admin ecxpet these 2
 *
 * https://woorkup.com/disable-jetpack-requests/
 */

 // Remove devicepx from load
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\dequeue_jetpack_scripts_styles', 1000 );

function dequeue_jetpack_scripts_styles() {

    wp_dequeue_script( 'devicepx' );

}

// Remove jetpack css from load
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

/**
 * Forcefully remove Jetpack Stats
 */
remove_action( 'jetpack_modules_loaded', 'stats_load' );



/**
 * Remove Dashicons fon anyone other than administrators
 */

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\maybe_remove_dashicon', 1000 );

function maybe_remove_dashicon() {

	if (current_user_can( 'update_core' ))
		return;

	wp_dequeue_style('dashicons');


}


/**
 * De-register the built in Wordpress Post Type and Taxonomies
 */

add_action('init', __NAMESPACE__ . '\deregister_wp_default_taxonomies');

function deregister_wp_default_taxonomies(){

  Posts\deregister_taxonomy( array( 'category', 'post_tag' ) );

}

 add_action('init', __NAMESPACE__ . '\deregister_wp_built_in_post_type');

 function deregister_wp_built_in_post_type(){

    Posts\deregister_any_post_type( 'post' );

 }