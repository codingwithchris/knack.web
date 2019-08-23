<?php
namespace Knack\Projects;
use PostTypes\Taxonomy;
use function Knack\Projects\module as module;

/**
 * Get Config Settings
 */

$taxonomy_settings = module()->get_config( 'taxonomy' );

/**
 * Instantiate Our Type Taxonomy
 *
 * @since  1.0.0
 */
$type = new Taxonomy(

	$taxonomy_settings['type']['names'],
	$taxonomy_settings['type']['options'],
	$taxonomy_settings['type']['labels']

);


/**
 * Instantiate Our Project Category Taxonomy
 *
 * @since  1.0.0
 */
$project_category = new Taxonomy(

	$taxonomy_settings['project_category']['names'],
	$taxonomy_settings['project_category']['options'],
	$taxonomy_settings['project_category']['labels']

);

/**
 * Instantiate Our Featured Taxonomy
 *
 * @since  1.0.0
 */
$featured = new Taxonomy(

	$taxonomy_settings['featured']['names'],
	$taxonomy_settings['featured']['options'],
	$taxonomy_settings['featured']['labels']

);

// Register Taxonomies
$type->register();
$project_category->register();
$featured->register();
