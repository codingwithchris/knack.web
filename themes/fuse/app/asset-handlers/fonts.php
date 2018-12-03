<?php
namespace Fuse\AssetHandler;

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\load_google_fonts');

function load_google_fonts(){

    $base = 'https://fonts.googleapis.com/css?family=';

    $families = 'Lato:200,500|Open+Sans:400,700';

    $full_font_request_url = $base . $families;


    $fonts = [

		'handle' 			=> 'app-fonts',
		'src'				=> $full_font_request_url,
		'dependencies'		=> null,
		'version'			=> null,
		'media'				=> 'all',

	];

	// Don't enqueue if we don't define font families to load
	if( ! $families )
		return;

	wp_register_style( $fonts['handle'], $fonts['src'], $fonts['dependencies'], $fonts['version'], $fonts['media'] );
	wp_enqueue_style( $fonts['handle'] );


}