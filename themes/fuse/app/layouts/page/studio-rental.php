<?php
/**
 * This file controls what content is rendered on the "Studio Rental" page
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

namespace Fuse\Layout\StudioRentalPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('studio-rental') ){

		add_action( 'fuse_content', __NAMESPACE__ . '\load_intro', 1);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_rental_guidelines', 2);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_gallery', 2);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_embedded_scheduler', 2);

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

		'image'		=> [
			'media' => Acf::field( 'studio_rental_intro_image' )->get(),
		],

		'content'	=> Acf::field( 'studio_rental_intro_content' )->get(),

		'gallery_action' => [

			'btn_text'		=> Acf::field( 'studio_rental_intro_gallery_btn_text' )->get(),
			'btn_url'		=> '#studio-rental-gallery',
			'btn_type'		=> 'secondary',
			'btn_theme'		=> 'dark',
			'btn_modifier'	=> '',

		],
		'booking_action'	=> [

			'btn_text'		=> Acf::field( 'studio_rental_intro_book_btn_text' )->get(),
			'btn_url'		=> '#studio-rental-scheduler',
			'btn_type'		=> 'primary',
			'btn_theme'		=> 'navy',
			'btn_modifier'	=> '',

		],

	];

	render( 'fragments/sections/studio-rental/_intro', $section_data );

}

function load_rental_guidelines(){

	$section_data = [
		'title'		=> Acf::field( 'studio_rental_guidelines_title' )->get(),
		'content'	=> Acf::field( 'studio_rental_guidelines_content' )->get(),
	];

	render( 'fragments/sections/studio-rental/_rental-guidelines', $section_data );

}

function load_gallery(){

	$section_data = [
		'title'		=> Acf::field( 'studio_rental_gallery_title' )->get(),
		'photos'	=> Acf::field( 'studio_rental_gallery_photos' )->get(),

	];

	render( 'fragments/sections/studio-rental/_gallery', $section_data );

}


function load_embedded_scheduler(){

	$section_data = [
		'title'		=> Acf::field( 'studio_rental_scheduler_title' )->get(),
		'copy'		=> Acf::field( 'studio_rental_scheduler_copy' )->get(),
		'embed'		=> Acf::field( 'studio_rental_scheduler_embed' )->get()
	];

	render( 'fragments/sections/studio-rental/_embedded-scheduler', $section_data );

}

function load_gallery_script(){

	AssetHandler\get_gallery_script_bundle();

}
