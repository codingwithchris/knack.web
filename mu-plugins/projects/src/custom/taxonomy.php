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
 * Instantiate Our Industry Taxonomy
 *
 * @since  1.0.0
 */
$industry = new Taxonomy(

	$taxonomy_settings['industry']['names'],
	$taxonomy_settings['industry']['options'],
	$taxonomy_settings['industry']['labels']

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
$industry->register();
$featured->register();