<?php
/**
 * This file controls what content is rendered on a singular post page
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

namespace Fuse\Layout\SinglePost;
use Fuse\AssetHandler;
use Fuse\Helpers;
use Samrap\Acf\Acf;
use function Fuse\Controllers\render as render;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_singular( 'post' ) ){

		add_action( 'wp_enqueue_scripts',	__NAMESPACE__ . '\load_posts_script', 1 );

		add_filter( 'body_class', __NAMESPACE__ . '\add_template_class_to_body_class', 10, 1 );

		// Handle Content Loading
		add_action( 'fuse_hero', __NAMESPACE__ . '\load_hero', 1);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_content', 1 );

		// Load Call to action after blog post
		add_action( 'fuse_content', __NAMESPACE__ . '\load_cta', 20 );

	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/



function add_template_class_to_body_class( $classes ){

	$classes[] = 'p-post';

	return $classes;

 }


function load_hero(){

	global $post;

	$terms = get_the_terms( $post, 'category');
	$term_name = $terms ? $terms[0]->name : 'Unspecified';

	$title = get_the_title();

	$data = [
		'title' => $title,
		'date' => get_the_date(),
		'category' => $term_name,
	];

	render( 'fragments/components/hero/_c-hero--post', $data );

 }


function load_content(){

	$featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

	echo '<div class="p-post__container f-container f-container--max--xs f-container--width">';

		if( ! empty( $featured_image_url ) ){

			echo '<div class="p-post__featured-image">';
				echo get_the_post_thumbnail();
			echo '</div>';

		}

		render( 'fragments/components/_c-share' );

		echo '<div class="p-post__content">';
			the_content();

			// Create an action to easily insert content before the post container closes
			do_action( 'fuse_before_post_content_end' );

		echo '</div>';

	echo '</div>';

}

function load_cta(){
	if( ! get_field( 'load_cta' ) ){
		return;
	}

	$cta_data = [

		'override_defaults' => Acf::field( 'override_cta_defaults' )->get(),
		'type'				=> Acf::field( 'cta_type' )->get(),
		'title'				=> Acf::field( 'cta_title' )->get(),
		'copy'				=> Acf::field( 'cta_copy' )->get(),
		'modifier_class'	=> 'c-cta--post',
		'action'	=> [

			'btn_type'	=> 'primary',
			'btn_text'	=> Acf::field( 'cta_action_text' )->get(),
			'btn_url'	=> Acf::field( 'cta_action_link' )->get(),
			'btn_theme'	=> Acf::field( 'cta_type' )->get() == 'standard' ? 'white' : 'dark',

		],
		'remove_bg'	=> Acf::field( 'cta_bg_remove' )->get(),
		'bg'	=> [
			'media' => Acf::field( 'cta_bg' )->get()
		]

	];

	$cta_data = Helpers\fuse_remove_empty_values( $cta_data );

	render( 'fragments/components/_c-cta', $cta_data );
}



/**
 * Load custom post page scripts.
 */
function load_posts_script(){

	AssetHandler\get_post_script_bundle();

}
