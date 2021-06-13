<?php
/**
 * This file controls what content is rendered on the landing template page
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 */

namespace Fuse\Layout\TemplateLanding;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on our landing page
	if( is_page_template( 'page-templates/landing.php') ){

		/**
		 * Remove the Header, Hero, and Footer from our landing page
		 */
		remove_action( 'fuse_header', 'Fuse\Structure\load_header', 1 );
		remove_action( 'fuse_before_content', 'Fuse\Layout\Page\load_hero', 1 );
		remove_action( 'fuse_footer', 'Fuse\Structure\load_footer', 1 );

		add_filter( 'body_class', __NAMESPACE__ . '\add_template_class_to_body_class', 10, 1 );

		add_action( 'fuse_content', __NAMESPACE__  . '\load_header', 1 );
		add_action( 'fuse_content', __NAMESPACE__  . '\load_content', 2 );
		add_action( 'fuse_content', __NAMESPACE__  . '\load_footer', 3 );

	}


}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function add_template_class_to_body_class( $classes ){

	$classes[] = 't-landing';

	return $classes;

 }

 function load_header(){

	$props = [

		'logo'	=> render( 'fragments/foundations/_f-logo', [], false )

	];

	$props = apply_filters( 'fuse_template_landing_header', $props );

	render( 'fragments/sections/template-landing/_header', $props );

 }

 function load_content(){

	$props = [

		'title'		=> Acf::field( 'title' )->get(),
		'copy'		=> Acf::field( 'copy' )->get(),
		'action'	=> [
			'btn_text'		=> Acf::field( 'action_text' )->get(),
			'btn_url'		=> Acf::field( 'action_link' )->get(),
			'btn_type'		=> 'primary',
			'btn_theme'		=> 'navy',
			'btn_modifier'	=> '',
		],

	];

	$props = apply_filters( 'fuse_template_landing_content', $props );

	render('fragments/sections/template-landing/_content', $props );

 }

 function load_footer(){

	$props = [

		'content' => []

	];

	$props = apply_filters( 'fuse_template_landing_footer', $props );

	render('fragments/sections/template-landing/_footer', $props );

 }
