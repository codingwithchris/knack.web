<?php
/**
 * This file controls what content is rendered on a singular project custom post type page
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

namespace Fuse\Layout\SingleProject;
use Fuse\Controllers;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_singular( 'projects' ) ){

		add_action( 'fuse_before_content', __NAMESPACE__ . '\load_hero' );

		add_action( 'fuse_content', __NAMESPACE__ . '\load_gallery', 5);

		// Handle Custom Scripts & Styles
		add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_projects_script', 1 );

	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_hero(){

	$header_data = [


	];

	Controllers\render( 'fragments/components/hero/_c-hero--project', $header_data );

}

function load_gallery(){

	$gallery_data = [

		'photos' => Acf::field( 'photos' )->get()

	];

	Controllers\render( 'fragments/components/_c-gallery--photo', $gallery_data );

}

function load_footer_content(){

}


/**
 * Load custom post page scripts.
 */
function load_projects_script(){

	$script = [

		'handle' 			=> 'project-script',
		'location'			=> AssetHandler\get_asset_from_manifest( 'project.js' ),
		'dependencies'		=> ['app-script'],
		'version'			=> null,
        'load_in_footer'	=> 'true',

	];

	wp_register_script( $script['handle'], $script['location'], $script['dependencies'], $script['version'], $script['load_in_footer'] );

	wp_enqueue_script( $script['handle'] );

}
