<?php
namespace Fuse;

// Fire everything off!
add_action( 'after_setup_theme', __NAMESPACE__ . '\set_theme_text_domain' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\register_menus' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\add_theme_supports' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\add_woocommerce_theme_supports' );

/**
 * Set the text domain of our theme
 *
 * @since  1.0.0
 * @author CreativeFuse
 */
function set_theme_text_domain(){

	$text_domain_path = get_theme_file_path() . '/lang';

	load_theme_textdomain( fuse()->config('theme', 'text_domain'), $text_domain_path );

}

/**
 * Register Theme Menus
 *
 * @since  1.0.0
 * @author CreativeFuse
 */
function register_menus(){

	register_nav_menus( array(
		'primary'    => __( 'Primary Nav Menu', fuse()->config('theme', 'text_domain') ),
		'utility'    => __( 'Utility Nav Menu', fuse()->config('theme', 'text_domain') )
	) );

}

/**
 * Add Theme Supports
 *
 * @since  1.0.0
 * @author CreativeFuse
 */
function add_theme_supports(){

	// Get supports to add
	$supports = fuse()->config( 'theme', 'supports' );
	// Bail if no data
	if( ! $supports )
		return;

	// Loop through and add our supports
	foreach( $supports as $support ){

		\add_theme_support( $support );

	}

}


/**
 * Add Woocommerce Theme Supports
 *
 * @since  1.1.0
 * @author CreativeFuse
 */
function add_woocommerce_theme_supports(){

	// Bail if WooCommerce doesn't exist
	if( ! class_exists( 'woocommerce' ) )
		return;

	// Get supports to add
	$supports = fuse()->config( 'theme', 'woo_supports' );

	// Bail if no data
	if( ! $supports )
		return;

	// Loop through and add our supports
	foreach( $supports as $support ){

		\add_theme_support( $support );

	}

}
