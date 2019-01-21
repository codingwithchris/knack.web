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
		add_action( 'fuse_content', __NAMESPACE__ . '\load_meta', 2);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_description', 3);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_photo_gallery', 4);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_video_gallery', 5);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_cta', 6);

		// Handle Custom Scripts & Styles
		add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_projects_script', 1 );

		remove_filter ('acf_the_content', 'wpautop');

	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_hero(){

	$header_data = [

		'title'	=> get_the_title(),
		'background' => [

			'overlay_type'	=> 'white--70'

		]

	];

	Controllers\render( 'fragments/components/hero/_c-hero--project', $header_data );

}

function load_intro(){

	$section_data = [

		'title' 		=> get_the_title(),
		'description'	=> Acf::field( 'long_description' )->get()

	];

	Controllers\render( 'fragments/sections/single-project/_intro', $section_data );

}

function load_meta(){

	$section_data = [

		'client_name' => Acf::field( 'client_name' )->get(),
		'client_website' => Acf::field( 'client_website' )->get(),
		'client_description' => Acf::field( 'client_description' )->get(),
		'industries'  => wp_get_post_terms( get_the_id(), 'industry', array( 'fields' => 'names' ) )

	];

	Controllers\render( 'fragments/sections/single-project/_meta', $section_data );


}

function load_description(){

	$section_data = [

		'title' => 'The Project',
		'description' => Acf::field( 'long_description' )->get(),

	];

	Controllers\render( 'fragments/sections/single-project/_description', $section_data );


}


function load_photo_gallery(){

	$gallery_data = [

		'photos' => Acf::field( 'photos' )->get()

	];

	Controllers\render( 'fragments/sections/single-project/_photo-gallery', $gallery_data );

}

function load_video_gallery(){

	$gallery_data = [

		'videos' => Acf::field( 'videos' )->get()

	];

	Controllers\render( 'fragments/sections/single-project/_video-gallery', $gallery_data );

}



function load_cta(){


	$cta_data = [

		'type'			=> 'inverted',
		'title'			=> 'A simple call to action',
		'copy'			=> 'A short yet legit subtitle',
		'modifier_class'	=> 'c-cta--project',
		'action'	=> [

			'btn_type'	=> 'primary',
			'btn_text'	=> 'Drop us a line',
			'btn_url'	=> site_url( '/contact-us/' ),
			'btn_theme'	=> 'dark',

		],
		'bg_image'	=> [
			'image_url' => 'https://picsum.photos/1920/500'
		]

	];

	Controllers\render( 'fragments/components/_c-cta', $cta_data );

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
