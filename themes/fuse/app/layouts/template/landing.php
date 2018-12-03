<?php
/**
 * This file controls what content is rendered on the landing template page
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 */

namespace Fuse\Layout\TemplateLanding;
use Fuse\Controllers;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on our landing page
	if( is_page_template( 'page-templates/landing.php') ){

		// Allow oEmbeds on landing pages as many of them will contain videos
		remove_action( 'init' , 'Reactor\Optimize\RemoveEmbeds\disable_wp_embeds', 9999);

		/**
		 * Remove the Header and Footer from our landing page
		 */
		remove_action( 'fuse_header', 'Fuse\Structure\load_header', 1 );
		remove_action( 'fuse_footer', 'Fuse\Structure\load_footer', 1 );


	}


}


/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/