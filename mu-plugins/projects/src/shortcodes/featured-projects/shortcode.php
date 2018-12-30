<?php
namespace Knack\Projects;
use Reactor\Factory\ShortcodeFactory;

// Fire off registration
add_action( 'init', __NAMESPACE__ . '\register_shortcode');

function register_shortcode(){

	// Register new Shortcode
	$config = include_once( __DIR__ . '/config.php' );
	$featured_projects = new ShortcodeFactory( $config );

}


// Processing Function
function process_shortcode(  $config, $attributes, $content, $shortcode_name ){

	// Start Output Buffer
	ob_start();

		// Query Our Stories
		$projects = query_featured_work( $attributes ); ?>

		<div class="c-featured-projects">

			<?php

			// If we have stories that match the query
			if ( $projects->have_posts() ) {

					// Render our shortcode and pass all available variables
					render_shortcode( $projects, $config, $attributes, $content, $shortcode_name );


				// If we don't reset, this loop will hijack everything and nothing else will display
				// on any page where we use our shortcode.

				wp_reset_postdata();

			} else {

				echo "No projects found matching that query";

			}

		?></div><?php

	return ob_get_clean();

}


function render_shortcode( $projects, $config, $attributes, $content, $shortcode_name ){

	// Set the appropriate view.
	include( $config['views']['featured-projects']  );

}


function query_featured_work( $attributes ){

	// Set Up Tax Query
	$tax_query = array(

		'taxonomy' 	=> 'featured',
		'terms' 	=> array( 'yes' ),
		'field' 	=> 'slug',
		'operator'	=> 'IN'

	);

	// Default WP_Query arguments
	$args = array(

		'post_type'              => array( 'projects' ),
		'post_status'            => array( 'publish' ),
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
		'posts_per_page'		 => $attributes['count'],
		'tax_query'				 => array( $tax_query )

	);

	// The Query
	$projects = new \WP_Query( $args );

	return $projects;

}