<?php
namespace Knack\Projects;

// Merge all config files into a single config object
// to be loaded into our theme
return array_merge(

	[

		'settings' => [

			'name'			=>	'projects',
			'version'		=>	'1.0.0',
			'description'	=>	'Handles any projects-related custom functionality',

		],

		// Load files this module requires
		'files'	=> [

			// Custom  Taxonomy Setup
			'src/custom/taxonomy.php',
			'src/custom/post-type.php',

			// Load in Shortcodes
			'src/shortcodes/featured-projects/shortcode.php',

		],

		// Our Views directory for Shortcodes
		'views' => dirname( __FILE__, 2 ) . '/src/views/',

	],

	// Pull in and merge our other config files
	include_once( __DIR__ . '/_post-type.php' ),
	include_once( __DIR__ . '/_taxonomy.php' ),
	include_once( __DIR__ . '/_assets.php' )

);
