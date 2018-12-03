<?php
namespace Fuse\Controllers;
use Fuse;

/**
 * Load the main template requested by WP.
 * This template will be loaded by a layout
 * wrapper inside of `resources/views/wrappers`.
 *
 * @since  1.0.0
 * @author  CreativeFuse
 * @package Fuse\Controllers
 *
 * @param  string $template The name of the requested template
 */

function load_template( $template ){

	// Set the template root
	$template_root	= Fuse\fuse()->config( 'paths', 'template_root' );

	// Build the full template path
	$final_template = $template_root . $template . '.php';

		// include the final template file
		include( locate_template( $final_template ) );

	// Bail after our file is included
	return;

}