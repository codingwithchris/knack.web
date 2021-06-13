<?php
/**
 * This file controls what is loaded on our 404 "not-found" error page.
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

namespace Fuse\Layout\ErrorPage;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;



// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a 404 page
	if( is_404() ){

		// remove_action( 'fuse_header', 'Fuse\Structure\load_header', 1 );
		remove_action( 'fuse_before_content', 'Fuse\Layout\Page\load_hero', 1 );
		// remove_action( 'fuse_footer', 'Fuse\Structure\load_footer', 1 );

        // Load 404 Content
		add_action( 'fuse_no_content', __NAMESPACE__ . '\load_content', 1 );

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

 /**
  * We are going to load our Hero on all standard PAGES.
  * Settings for out hero are contained inside of the
  * hero pattern itself and can be over-ridden if desired using
  * a filter.
  *
  * @return void
  */
function load_content(){

	$action_props = [

		'btn_text'		=> Acf::option( '404_action_text' )->get(),
		'btn_url'		=> Acf::option( '404_action_link' )->get(),
		'btn_type'		=> 'primary',
		'btn_theme'		=> 'navy',
		'btn_modifier'	=> '',

	];

    $props = [

        'logo'		=> render( 'fragments/foundations/_f-logo', [], false ),
        'title'		=> Acf::option( '404_title' )->get(),
		'copy'		=> Acf::option( '404_copy' )->get(),
		'action'	=> render( 'fragments/components/_c-btn', $action_props, false )

    ];

	render( 'fragments/sections/404/_content', $props );

}
