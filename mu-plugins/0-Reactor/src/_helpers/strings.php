<?php
declare(strict_types=1);

namespace Reactor\Helpers\Strings;


/**
 * Take a string and strip out all spaces
 *
 * @param string $string
 * @return string
 */
function strip_spaces( string $string = '' ) : string {

	return str_replace( ' ', '', $string );

}

/**
 * Take a string and replace any spaces with hyphens
 *
 * @param string $string
 * @return string
 */
function replace_space_with_hyphen( string $string = '' ) : string {

	return str_replace( ' ', '-', $string );

}


/**
 * Take a string and replace all spaces with underscores
 *
 * @param string $string
 * @return string
 */
function replace_space_with_underscore( string $string = '' ) : string {

	return str_replace( ' ', '_', $string );

}


/**
 * Take a string and replace any hyphens or spaces with underscores
 *
 * @param string $string
 * @return string
 */
function replace_space_or_hyphen_with_underscore( string $string = '' ) : string {

	return str_replace( array( ' ', '-' ), '_', $string );

}

/**
 * Take a string and replace spaces or underscores with hyphens
 *
 * @param string $string
 * @return string
 */
function replace_space_or_underscore_with_hyphen( string $string = '' ) : string {

	return str_replace( array( ' ', '_' ), '-', $string );

}

/**
 * Determine the estimated reading time for a block of content.
 *
 * @link https://gist.github.com/mynameispj/3170442
 *
 * @param string $content the content we want to get the estimated reading time of
 * @return string $estimate
 */
function get_estimated_reading_time( string $content ) : string {

	// Get the number of words in our content
	$word = str_word_count( strip_tags($content) );

	// Assume 200 words / minute (a little slower than average)
	$minutes = floor($word / 200);

	// HTML string to output
	$estimate = $minutes . ' <span>min</span>';

	// Sanitize and return
	return wp_kses( $estimate, ['span' => [] ] );

}