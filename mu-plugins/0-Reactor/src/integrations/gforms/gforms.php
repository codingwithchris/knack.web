<?php
namespace Reactor\GForms;

/**
 * Add an option to Gravity Forms that allows
 * the user to hide field labels on a per-field basis.
 *
 * @since  1.0.0
 */

add_action( 'plugins_loaded', __NAMESPACE__ . '\load_integration');

function load_integration(){

	if( class_exists( 'GFForms' ) ){

		add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

	}
}