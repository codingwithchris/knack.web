<?php
/**
 * This file controls what content is rendered on the "Home" page of our site
 * as selected through WP Admin.
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

namespace Fuse\Layout\HeadshotsPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('headshots') ){


		add_action( 'fuse_content', __NAMESPACE__ . '\load_intro', 1);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_gallery', 2);

		// Handle Custom Scripts & Styles
		add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_gallery_script', 1 );

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_intro(){

	$section_data = [

		'icon' => [

			'name' 	=> 'camera',
			'title'	=> 'A graphical icon representing headshots',

		],
		'copy'		=> Acf::field( 'headshots_intro' )->get(),

	];

	render( 'fragments/sections/headshots/_intro', $section_data );

}

function load_gallery(){

	$section_data = [
		'photos'	=> Acf::field( 'headshot_photos' )->get(),

	];

	if( $section_data['photos'] ){

		render( 'fragments/sections/headshots/_gallery', $section_data );

	}

}

function load_gallery_script(){

	AssetHandler\get_gallery_script_bundle();

}
