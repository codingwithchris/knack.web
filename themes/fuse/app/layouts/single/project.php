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
use function Fuse\Controllers\render as render;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;
use Fuse\Helpers;

// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_singular( 'projects' ) ){

		add_action( 'fuse_content', __NAMESPACE__ . '\load_hero', 1);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_media', 2);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_cta', 4);

		// Handle Custom Scripts & Styles
		add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_gallery_script', 1 );

		remove_filter ('acf_the_content', 'wpautop');

	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_hero(){

	$mediums = get_terms( array(
		'object_ids'	=> get_the_id(),
		'taxonomy'		=> 'type',
		'fields'		=> 'names',
	));

	$industries = get_terms( array(
		'object_ids'	=> get_the_id(),
		'taxonomy'		=> 'industry',
		'fields'		=> 'names',
	));

	$hero_data = [

		'info'	=> [
			'title'	=> get_the_title(),
			'description' => Acf::field( 'long_description' )->get(),
			'mediums'	=> implode( ', ', $mediums ),
		],

		'client' => [
			'name' 			=> Acf::field( 'client_name' )->get(),
			'website' 		=> Acf::field( 'client_website' )->get(),
			'description' 	=> Acf::field( 'client_description' )->get(),
			'industries'	=> implode( ', ', $industries ),
		],

		'image' => [
			'media'	=> Acf::field( 'featured_image' )->get(),
			'type'	=> 'bg',
		],

		'overlay'	=> [
			'overlay_type'	=> 'white--95',
		]

	];

	render( 'fragments/sections/single-project/_hero', $hero_data );

}


function load_media(){

	$media_data = [

		'photos' => Acf::field( 'photos' )->get(),
		'videos' => Acf::field( 'videos' )->get()

	];

	render( 'fragments/sections/single-project/_media', $media_data );

}


function load_cta(){

	if( ! get_field( 'load_cta' ) ){
		return;
	}

	$cta_data = [

		'override_defaults' => Acf::field( 'override_cta_defaults' )->get(),
		'type'				=> Acf::field( 'cta_type' )->get(),
		'title'				=> Acf::field( 'cta_title' )->get(),
		'copy'				=> Acf::field( 'cta_copy' )->get(),
		'modifier_class'	=> 'c-cta--project',

		'action'	=> [

			'btn_type'	=> 'primary',
			'btn_text'	=> Acf::field( 'cta_action_text' )->get(),
			'btn_url'	=> Acf::field( 'cta_action_link' )->get(),
			'btn_theme'	=> Acf::field( 'cta_type' )->get() == 'standard' ? 'white' : 'dark',

		],
		'remove_bg'	=> Acf::field( 'cta_bg_remove' )->get(),
		'bg'	=> [
			'media' => Acf::field( 'cta_bg' )->get()
		]

	];

	$cta_data = Helpers\fuse_remove_empty_values( $cta_data );

	render( 'fragments/components/_c-cta', $cta_data );


}


/**
 * Load custom post page scripts.
 */
function load_gallery_script(){

	AssetHandler\get_gallery_script_bundle();

}
