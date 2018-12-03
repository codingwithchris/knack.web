<?php
declare(strict_types=1);

namespace Reactor\Helpers\Arrays;


/**
 * Check if items a given array contains any part of the
 * string passed in as a parameter
 *
 * @param array $array the array to check
 * @param string $string the string to use for comparison
 *
 * @return bool
 */
function array_contains_string_part( array $array = [], string $string = '' ) : bool{

	// Bail if no string
	if( ! $string )
		return false;

	// All strings passed must be lowercased
	$_string = strtolower( $string );

	// Loop through our array
	foreach( $array as $array_item ){

		// If a part of the string exists in the array item
		if( strpos( $_string, $array_item ) !== false )

			// Return true & bail
			return true;

	}

	return false;

}