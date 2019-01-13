<?php
/**
 * This file controls what content is rendered on the custom post type archive for Projects.
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

namespace Fuse\Layout\ArchiveProjects;
use Fuse\Controllers;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;


// Fire our layout setup once we have all Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on our custom post type
	if( is_archive( 'projects' ) ){

        add_action( 'fuse_content', __NAMESPACE__ . '\load_content', 5);

	}


}


/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_content(){

}
