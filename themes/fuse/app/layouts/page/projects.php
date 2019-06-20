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

namespace Fuse\Layout\projectsPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandlers;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('projects') ){

		// Load page sections
		add_action( 'fuse_before_content', __NAMESPACE__ . '\load_hero', 1);

		add_action( 'fuse_content', __NAMESPACE__ . '\load_content', 2);

		add_action( 'fuse_content', __NAMESPACE__ . '\load_cta', 6);

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/


function load_hero(){

	$data = [

		'title'		=> Acf::field( 'title' )->get(),
		'copy'		=> Acf::field( 'subtitle' )->get(),


		'background'	=> [
			//'image_url'		=> Acf::field( 'background_image' )->get(),
			'image_url'		=> 'https://picsum.photos/1920/400',
			'overlay_type'	=> 'white--90'
		]

	];

	render( 'fragments/components/hero/_c-hero--page', $data );

}

function load_content(){

	the_content();

}

function load_cta(){


	$cta_data = [

		'type'			=> 'simple',
		'title'			=> 'Now, it’s your turn!',
		'copy'			=> 'We’d love to learn a bit about you. Let’s have a chat!',
		'modifier_class'	=> 'c-cta--about',
		'action'	=> [

			'btn_type'	=> 'primary',
			'btn_text'	=> 'Drop us a line',
			'btn_url'	=> site_url( '/contact-us/' ),
			'btn_theme'	=> 'white',

		],
		'bg_image'	=> [
			'image_url' => 'https://picsum.photos/1920/500'
		]

	];

	render( 'fragments/components/_c-cta', $cta_data );

}
