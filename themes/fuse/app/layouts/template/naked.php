<?php
/**
 * This file controls what content is rendered on the naked template page
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 */

namespace Fuse\Layout\TemplateNaked;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on our naked page
	if( is_page_template( 'page-templates/naked.php') ){

		/**
		 * Remove the Header, Hero, and Footer from our naked page
		 */
		remove_action( 'fuse_header', 'Fuse\Structure\load_header', 1 );
		remove_action( 'fuse_footer', 'Fuse\Structure\load_footer', 1 );

		add_filter( 'body_class', __NAMESPACE__ . '\add_template_class_to_body_class', 10, 1 );

	}


}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function add_template_class_to_body_class( $classes ){

	$classes[] = 't-naked';

	return $classes;

}
