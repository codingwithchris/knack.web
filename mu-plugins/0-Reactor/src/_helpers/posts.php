<?php

namespace Reactor\Helpers\Posts;

/**
 * Get a usable version of the Current Post Type from the post object
 *
 * @return string lower case name of post type with space separated by hyphens
 *
 * @since  1.0.0
 */
function post_type_class(){

	// Set it (usable outside of the loop)
	global $post;

	// Handle 404 pages
	if( is_404() )
		return '404';

	// Search Results
	if( is_search() )
		return  'search-results';

	// Handle Taxonomies
	if( is_tax() )
		return get_query_var( 'taxonomy' );

	// Handle Archives
	if( is_archive() )
		return get_query_var('post_type') . '-archive';

	// Handle a page or singular post in any post type
	if( is_singular() || is_single() )
		return str_replace( '_', '-', $post->post_type );

}

/**
 * Get a usable version of the Current Term Name from the post object
 *
 * @access public
 * @return		string 		lower case name of post type with space separated by hyphens
 *
 * @since  1.0.0
 */
function term_name(){

	global $post;

	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

	// Replace underscores with hyphens
	$term = $term->slug;

	// sanitize & return
	return esc_html( $term );

}


/**
 * Unregisters any post type.
 *
 * @see http://rafaelcardero.com/tutorials/wordpress-unregister-builtin-post-type/
 *
 * @param string $post_type Post type to unregister.
 * @return bool|WP_Error True on success, WP_Error if the post type does not exist.
 */
function deregister_any_post_type( $post_type ){

	global $wp_post_types;

	// Error if the post type does not exist
	if ( ! post_type_exists( $post_type ) )
		return new \WP_Error('invalid_post_type', __('Invalid post type.'));


	// Get the desired post object
	$post_type_object = get_post_type_object($post_type);

	// Let's blow this thing away!
	$post_type_object->remove_supports();
	$post_type_object->remove_rewrite_rules();
	$post_type_object->unregister_meta_boxes();
	$post_type_object->remove_hooks();
	$post_type_object->unregister_taxonomies();

	unset($wp_post_types[$post_type]);

	/**
	 * Fires after a post type was unregistered.
	 *
	 * @param string $post_type Post type identifier.
	 */
	do_action('fuse_unregistered_post_type', $post_type);

	return true;

}


/**
 * Deregister one or more taxonomies
 */
function deregister_taxonomy( array $taxonomies ){

	// Bail if no taxonomies were passed
	if( ! $taxonomies )
		return;

	// Get global list of wp taxonomies
 	global $wp_taxonomies;

	// Loop over the taxonomies we passed in
	foreach( $taxonomies as $taxonomy ) {

		// If the taxonomy is real, remove it
		if ( taxonomy_exists( $taxonomy) )
			unset( $wp_taxonomies[$taxonomy]);

	}

}