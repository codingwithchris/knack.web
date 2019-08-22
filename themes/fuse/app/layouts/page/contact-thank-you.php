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

namespace Fuse\Layout\ContactThankYouPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandlers;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('thank-you') ){

		///add_filter( 'fuse_template_landing_header', __NAMESPACE__ . '\remove_logo_from_landing_template' );
		add_action( 'fuse_template_landing_after_logo', __NAMESPACE__ . '\load_video_embed', 1);

		add_filter('oembed_fetch_url', function( $provider, $url, $args ) {

			$provider = add_query_arg( 'autoplay', 1, $provider );
			$provider = add_query_arg( 'muted', 0, $provider );

			return $provider;

		}, 10, 3 );


	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_video_embed(){

	$props = [

		'video' => Acf::field( 'video_embed' )->get()

	];

	render( 'fragments/components/_c-responsive-video', $props );

}

function remove_logo_from_landing_template( $props ){

	$props['logo'] = '';

	return $props;

}
