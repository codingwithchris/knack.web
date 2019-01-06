<?php
namespace Fuse\Structure;
use Fuse\Controllers;
use Fuse\AssetHandler;
use Reactor\Helpers;

/**
 * Load Critical styles & scripts first. These
 * will get injected straight into the head :)
 */
add_action( 'wp_head', __NAMESPACE__ . '\inject_critical_scripts_and_styles', 1);

/**
 * Disable oEmbeds across the site using a function from our Reactor Plugin.
 *
 * Note that if we want to re-enable oEmbed on specific pages, we will
 * need to remove this action :)
 */
add_action( 'init',  'Reactor\Optimize\RemoveEmbeds\disable_wp_embeds', 9999 );


// Get the heck out autop!!
remove_filter ('acf_the_content', 'wpautop', 10, 1);
remove_filter ('the_content', 'wpautop', 10, 1 );


// Bring in site assets
add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_app_styles_bundle', 9999999999 ); // LOAD LAST to make sure we override any plugin styles
add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_app_script_bundle', 1 );
add_action( 'fuse_after_body_open', __NAMESPACE__ . '\load_svg_sprite', 1 );

// Render site content wrappers
add_action( 'fuse_site_begin',		__NAMESPACE__ . '\open_site',			1 );
add_action( 'fuse_header',			__NAMESPACE__ . '\load_header',			1 );
add_action( 'fuse_footer',			__NAMESPACE__ . '\load_footer',			1 );
add_action( 'fuse_site_end',		__NAMESPACE__ . '\close_site',			1 );

// Remove default WooCommerce Theme Wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


// Render Site-wide Structural Header Components
// add_action( 'fuse_header_content',	__NAMESPACE__ . '\load_utility_nav',	1 );
add_action( 'fuse_header_content',	__NAMESPACE__ . '\load_primary_nav',	2 );


// Render Site-wide Structural Footer
add_action( 'fuse_footer_content',	__NAMESPACE__ . '\load_footer_content', 1 );
add_action( 'fuse_footer_content',	__NAMESPACE__ . '\load_copyright',		2 );


/*************************************************************
 * The following functions load sitewide assets
 * into our application.
 ************************************************************/

/**
 * Inline Critical CSS & JS
 *
 * https://gomakethings.com/inlining-critical-css-for-better-web-performance/
 */

function inject_critical_scripts_and_styles(){

	/**
	 * Create an array of files to inline along with
	 * the `tag` or type of file.
	 *
	 * @todo - pass array into function
	 */

	$files = [

		'critical.css' 	=> 'style'

	];

	AssetHandler\inject_critical_files( $files );

}

/**
 * Register & enqueue the main stylesheet for our application
 */
function load_app_styles_bundle(){

	AssetHandler\get_app_styles_bundle();

}



/**
 * Register & enqueue the main script for our application
 */

function load_app_script_bundle(){

	AssetHandler\get_app_script_bundle();

}

/**
 * Inject an SVG sprite into our page.
 */
function load_svg_sprite(){

	AssetHandler\inject_svg_sprite();

}

/*************************************************************
 * The following will create our main content wrappers to be
 * utilized across the entire site.
 ************************************************************/

function open_site(){

	Controllers\render( 'structure/head' );

}


function load_header(){

	Controllers\render( 'structure/header' );

}

function load_footer(){

	Controllers\render( 'structure/footer' );

}

function close_site(){

	Controllers\render( 'structure/site-end' );

}



/*************************************************************
 * The following will render out core pieces of
 * functionality across our entire site
 ************************************************************/

 function load_utility_nav(){

	Controllers\render( 'fragments/components/nav/_c-nav--utility' );

}


function load_primary_nav(){

	Controllers\render( 'fragments/components/nav/_c-nav--primary' );

 }


 /**
  * Render the main Footer Content
  */
  function load_footer_content(){

	$data = [

	];

	// Render out our view using the defined dataset
	Controllers\render( 'fragments/components/footer/_c-footer__content', $data );

 }

 /**
  * Render a dynamic copyright that generates data
  * based on the parameters passed in.
  */
 function load_copyright(){

	$data = [

		'year' 				=> date("Y"),
		'copyright_entity'	=> 'Knack Creative',
		'creator_name'		=> 'Christopher Hahn',
		'creator_link' 		=> 'https://www.linkedin.com/in/christopher-a-hahn/',
		'privacy_page'		=> get_permalink( (int) get_option( 'wp_page_for_privacy_policy' ) )

	];

	Controllers\render( 'fragments/components/_c-copyright', $data );

 }