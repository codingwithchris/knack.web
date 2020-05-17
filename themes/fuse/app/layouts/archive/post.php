<?php
/**
 * This file controls what content is rendered on the blog page selected in WP Admin
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 * @see `layouts/template/landing.php` to see this in action
 *
 */

namespace Fuse\Layout\ArchivePost;
use Fuse\Controllers;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;


// Fire our layout setup once we have all Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on our main posts archive page.
	if( is_home() ){

		add_action( 'fuse_before_content', __NAMESPACE__ . '\load_hero' );
		add_action( 'fuse_content', __NAMESPACE__ . '\load_content', 5);

	}


}


/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_hero(){

}

function load_content(){

}
