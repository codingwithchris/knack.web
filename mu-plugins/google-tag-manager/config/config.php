<?php
namespace GM\GoogleTagManager;

// Merge all config files into a single config object
// to be loaded into our theme
return array_merge(

	[

		'settings' => [

			'name'			=>	'google-tag-manager',
			'version'		=>	'1.0.0',
			'description'	=>	'Implements Google Tag Manager',

		],

		// Load files this module requires
		'files'	=> [

			'src/class-gtm-loader.php',

		],

	],

	// Pull in and merge our other config files
	include_once( __DIR__ . '/_settings.php' )

);
