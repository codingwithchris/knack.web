<?php
namespace Fuse\Controllers;
use Fuse;

/**
 * Controller file for handling the building of our WP wrapper class.
 * The idea is to have Wordpress redirect all requests through a central
 * layout wrapper in order to cut down on code repetition, increase
 * consistency, and reliability.
 *
 * This is a very slight modification of the thee wrapper created
 * by Scribu at http://scribu.net/wordpress/theme-wrappers.html,
 * who originally got the idea from the Roots Sage Theme Wrapper
 *
 * @since 1.0.0
 * @author  CreativeFuse
 * @package Fuse\Controllers
 *
 */


/**
 * Get the currently requested Wordpress template path
 *
 * @return string the full Wordpress template path
 */

function get_template_path() {
	return Wrapper::$main_template;
}

/**
 * Get the requested WP template basename
 *
 * @return string the stripped down basename of the currently requested WP template
 */

function get_template_base() {
	return Wrapper::$base;
}


/**
 * Our Wrapper class builds the main wrapper for our WP site and sends WP to
 * our `/resources/views/wrappers` folder to fetch the appropriate file.
 */
add_filter( 'template_include', array( __NAMESPACE__ . '\Wrapper', 'wrap' ), 99 );

class Wrapper{


	/**
	 * Stores the full path to the main template file
	 */
	static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	static $base;


	/**
	 * The main method for building our wrapper.
	 *
	 * @param string $template Current WP template
	 * @return array template requests
	 */
	static function wrap( $template ) {

		// Define our variables
		self::$main_template = $template;
		self::$base = basename( self::$main_template ,'.php');

		// If we are on the index, we don't have a base
		if ( 'index' == self::$base )
			self::$base = null;

		// Add our custom wrapper to a templates array
		$templates = array( '/views/wrappers/' . 'wrapper.php' );

		/**
		 * If we are on any page other than the index, it should mean $base is set,
		 * and we are going to use that to build a dynamic wrapper file name.
		 */
		if ( self::$base )
			array_unshift( $templates, sprintf( '/views/wrappers/' . 'wrapper-%s.php', self::$base ) );

		/**
		 * Return the array of templates to look through to WP
		 * and let it continue doing its thing.
		 */
		return locate_template( $templates );
	}
}
