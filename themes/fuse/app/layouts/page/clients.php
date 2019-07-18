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

namespace Fuse\Layout\ClientsPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandlers;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('clients') ){

		add_action( 'fuse_content', __NAMESPACE__ . '\load_clients', 1);

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_clients(){


	$section_data = [

		'client_logos'	=> Acf::field('client_logos')->get(),

	];

	render( 'fragments/sections/clients/_logos', $section_data );

}
