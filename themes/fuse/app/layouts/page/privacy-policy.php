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

namespace Fuse\Layout\PrivacyPolicyPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandlers;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('privacy-policy') ){

		remove_action( 'fuse_content', 'Fuse\Layout\Page\load_cta', 10 );
		add_action( 'fuse_content', __NAMESPACE__ . '\load_content_container', 1);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_content', 2);

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_content_container(){

	echo '<section class="f-section p-privacy-policy">';
		echo '<div class="f-container f-container--max--xs f-container--width">';

}

function load_content(){

	the_content();

}
