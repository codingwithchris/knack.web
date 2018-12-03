<?php
namespace Fuse\AssetHandler;
use Reactor\Helpers;
use Fuse;

function get_app_styles_bundle(){

	$stylesheet = [

		'handle' 			=> 'app-styles',
		'src'				=> get_asset_from_manifest( 'app.css' ),
		'dependencies'		=> null,
		'version'			=> null,
		'media'				=> 'all',

	];


	wp_register_style( $stylesheet['handle'], $stylesheet['src'], $stylesheet['dependencies'], $stylesheet['version'], $stylesheet['media'] );
	wp_enqueue_style( $stylesheet['handle'] );


}