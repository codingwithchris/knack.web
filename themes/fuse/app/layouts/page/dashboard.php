<?php
/**
 * This file controls what is loaded on the "dashboard" page
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

namespace Fuse\Layout\DashboardPage;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;
use Fuse\Helpers;

// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_page() && is_page( 'dashboard' ) ){

		add_action( 'fuse_content', __NAMESPACE__ . '\load_header', 1 );
		add_action( 'fuse_content', __NAMESPACE__ . '\load_tiles', 2 );

	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/


function load_header(){

	$data = [

		'logo'			=> render( 'fragments/foundations/_f-logo', [], false ),

		'instagram'		=> [
			'handle'	=> Acf::field( 'ig_profile_handle' )->get(),
			'link'		=> Acf::field( 'ig_profile_link' )->get(),
		],

	];

	render( 'fragments/sections/dashboard/_header', $data );

}

function load_tiles(){

	$newsletter_data = [

		'title'	=> Acf::field( 'newsletter_title' )->get(),
		'copy'	=> Acf::field( 'newsletter_copy' )->get(),
		'form' => do_shortcode( '[mc4wp_form id="1505"]' ),

	];

	$data = [

		'signup_component' => render( 'fragments/components/_c-signup-card', $newsletter_data, false ),
		'tiles' => Acf::field( 'tiles' )->get(),

	];

	render( 'fragments/sections/dashboard/_content', $data );

}
