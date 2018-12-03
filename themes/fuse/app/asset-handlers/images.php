<?php
namespace Fuse\AssetHandler;

/**
 * Get Img Meta data from a posts featured image
 * @param  array  $settings [description]
 * @return [type]           [description]
 */
function get_featured_image( array $image_request_settings = [] ) : array {

	$settings = array_merge(

		array(

			'id'  			=> null,
			'term'  		=> null,
			'size'			=> 'full',
			'fallback'		=> '',
            'show_falback'	=> false

		),

		$image_request_settings

	);

	// Access $post global if an ID is not defined in the image request
	if( ! $settings['id'] ){
		global $post;
	}

	// Set the post ID either to an ID we passed into the post or the current Post's ID
	$post_id = $settings['id'] ?? $post->ID;

	// Set up an array to hold our data
	$data = [

        'src' 	=> '',
		'alt'	=> '',
		'w'		=> '',
		'h'		=> ''

    ];

	// Bail if theme doesn't support featured images
	if( ! current_theme_supports( 'post-thumbnails' ) )
		return $data;

	// Get the image ID
	$image_id = get_post_thumbnail_id( $post_id );

	// Bail if we can't get an image ID
	if( ! $image_id )
		return $data;

	$featured_image = wp_get_attachment_image_src( $image_id, $settings['size'] );

	// Bail if we can't get a featured Image
	if( ! $featured_image )
		return $data;

    // Set our data
	$data['src'] = $featured_image[0];
	$data['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	$data['w'] = $featured_image[1];
	$data['h'] = $featured_image[2];

    // Give back our array of image data
	return $data;

}