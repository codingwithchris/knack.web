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


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_page() && ! is_front_page() ){

		add_action( 'fuse_before_content', __NAMESPACE__ . '\load_hero', 1 );
		add_action( 'fuse_content', __NAMESPACE__ . '\load_cta', 10 );

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

		'background'	=> [
			'image_url'		=> Acf::field( 'hero_bg' )->get(),
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

		'type'			=> 'simple',
		'title'			=> Acf::field( 'cta_title' )->escape( 'esc_html' )->get(),
		'copy'			=> Acf::field( 'cta_copy' )->escape( 'esc_html' )->get(),
		'modifier_class'	=> 'c-cta--' . $post->post_name,
		'action'	=> [

			'btn_type'	=> 'primary',
			'btn_text'	=> Acf::field( 'cta_action_text' )->escape()->get(),
			'btn_url'	=> Acf::field( 'cta_action_link' )->default( home_url('/contact') )->escape( 'esc_url' )->get(),
			'btn_theme'	=> 'white',

		],
		'bg_image'	=> [
			'image_url' => Acf::field( 'cta_bg' )->default( 'https://picsum.photos/1920/500' )->get()
		]

	];

	render( 'fragments/components/_c-cta', $cta_data );

}
