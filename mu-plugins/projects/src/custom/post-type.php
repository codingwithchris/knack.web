<?php
namespace Knack\Projects;
use PostTypes\PostType;
use function Knack\Projects\module as module;

/**
 * Get Config Settings
 */
$post_type_settings = module()->get_config( 'post_type' );
$taxonomy_settings = module()->get_config( 'taxonomy' );

/**
 * Instantiate Our Shows Post Type
 *
 * @since  1.0.0
 */
$projects = new PostType(

	$post_type_settings['names'],
	$post_type_settings['options'],
	$post_type_settings['labels']

);

// Register Post Type
$projects->register();

/**
 * Give Post Type Our Taxonomies
 */
$projects->taxonomy( $taxonomy_settings['type']['names']['name'] );
$projects->taxonomy( $taxonomy_settings['project_category']['names']['name'] );
$projects->taxonomy( $taxonomy_settings['featured']['names']['name'] );

/**
 * Set Up Filters for our post type
 */
$projects->filters( $post_type_settings['filters'] );


/**
 * Set Admin Icon
 */

$projects->icon( 'dashicons-portfolio' );
