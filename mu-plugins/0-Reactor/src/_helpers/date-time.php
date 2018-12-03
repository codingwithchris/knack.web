<?php

namespace Reactor\Helpers\DateTime;

/**
 * Get todays date
 *
 * @return string
 */
function get_todays_date(){

	// Get today's Date
	return date("Ymd");

}

/**
 * Get the timestamp of a given date
 *
 * @param string $date the date we want to get the timestamp of
 * @return string a timestamp
 */
function get_timestamp( $date ){

	// Bail if no date
	if( ! $date )
		return;

	// make date string into a timestamp
	return strtotime( $date );

}

/**
 * Get the timestamp of today's date
 *
 * @return string today's timestamp
 */
function get_todays_timestamp(){

	// Bail if the dependent function doesn't exist
	if( ! function_exists( 'get_todays_date' ) )
		return;

	// make date string into a timestamp
	return strtotime( get_todays_date() );

}