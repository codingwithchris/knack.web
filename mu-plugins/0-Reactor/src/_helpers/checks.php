<?php
declare(strict_types=1);

namespace Reactor\Helpers\Checks;
use Reactor\Helpers\Arrays;
use Reactor\Helpers\URLs;
use function App\config as app;

/**
 * Check to see if Advanced Custom Fields is active
 *
 * @return bool
 */
function is_acf_active() : bool{

	if( ! class_exists('acf') )
		return false;

	return true;

}

/**
 * Check to see if Gravity Forms is active
 *
 * @return bool
 */
function is_gforms_active() : bool{

	if( ! class_exists('GFCommon') )
		return false;

	return false;

}


/**
 * Checks to see if our current environment our dev environment?
 * Dev environment domains are defined in our mu-plugin config at
 * `mu-plugins/_config/config.php`.
 *
 * @return bool
 */
function is_dev_env() : bool{

	// If no dev environments are defined
	if( ! app()->config( 'env', 'dev' ) )
		return false;

	// check our array of dev environments
	// against the current domain

	return Arrays\array_contains_string_part(

		app()->config( 'env', 'dev' ),
		URLs\get_domain()

	);

}