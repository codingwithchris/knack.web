<?php
namespace Fuse\AssetHandler;

function get_app_script_bundle(){

    $script = [

		'handle' 			=> 'app-script',
		'src'				=> get_asset_from_manifest( 'app.js' ),
		'dependencies'		=> ['jquery'],
		'version'			=> null,
		'load_in_footer'	=> true,

	];

	wp_register_script( $script['handle'], $script['src'], $script['dependencies'], $script['version'], $script['load_in_footer'] );
	wp_enqueue_script( $script['handle'] );

}

function get_gallery_script_bundle(){

    $script = [

		'handle' 			=> 'gallery-script',
		'src'				=> get_asset_from_manifest( 'gallery.js' ),
		'dependencies'		=> [],
		'version'			=> null,
		'load_in_footer'	=> true,

	];

	wp_register_script( $script['handle'], $script['src'], $script['dependencies'], $script['version'], $script['load_in_footer'] );
	wp_enqueue_script( $script['handle'] );

}
