<?php
/**
 * This file controls what is loaded on all standard pages.
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 * @see `layouts/template/landing.php` to see this in action
 */

namespace Fuse\Layout\Page;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;
use Fuse\Helpers;

// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_page() && ! is_front_page() ){

		add_action( 'fuse_before_content', __NAMESPACE__ . '\load_hero', 1 );

	}

	if( is_page() ){
		add_action( 'fuse_content', __NAMESPACE__ . '\load_cta', 20 );
	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/


function load_hero(){

	$data = [

		'title'		=> Acf::field( 'hero_title' )->get(),
		'copy'		=> Acf::field( 'hero_subtitle' )->get(),

		'background_image'	=> [

			'media' => Acf::field( 'hero_bg' )->get(),
			'type'	=> 'bg'

		],

		'background_overlay'	=> [
			'overlay_type'	=> 'white--90'
		]

	];

	render( 'fragments/components/hero/_c-hero--page', $data );

}

function load_cta(){

	if( ! get_field( 'load_cta' ) ){
		return;
	}

	global $post;

	$cta_data = [

		'override_defaults' => Acf::field( 'override_cta_defaults' )->get(),
		'type'				=> Acf::field( 'cta_type' )->get(),
		'title'				=> Acf::field( 'cta_title' )->get(),
		'copy'				=> Acf::field( 'cta_copy' )->get(),
		'modifier_class'	=> 'c-cta--' . $post->post_name,
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
