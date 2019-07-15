<?php
namespace Fuse\Helpers;

/**
	* Remove any elements in any type of array
	* where the value is empty.
	*
	* @since 1.2.0
	*
	* @param  array $array the array to walk
	* @return array $array the cleaned array
	*/
	function fuse_remove_empty_values( array $array ){

		foreach ($array as $key => &$value) {

			if ( is_array( $value ) ) {
				$value = fuse_remove_empty_values( $value );
			}

			if ( empty( $value ) ) {
				unset( $array[$key] );
			}
		}

		return (array) $array;

	}
