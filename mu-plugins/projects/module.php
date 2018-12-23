<?php
/**
 * @since 1.0.0
 * @package Knack\Projects
 * @author  CreativeFuse
 *
 * Module Name: Projects
 * Module Description: This Module handles projects functionality for Knack Creative
 *
 */
namespace Knack\Projects;
use Reactor\Factory\ModuleFactory;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die( 'You cannot access this file!' );
}

class ProjectsModule extends ModuleFactory{

	/**
	 * This is where the magic happens. We define the basic
	 * configs for our module and we officially register it
	 */

	public function init_module(){

		$config		= include_once( 'config/config.php' );
		$module_dir = __DIR__;
		$module_url	= plugin_dir_url( __FILE__ );

		$this->register( $config, $module_dir, $module_url );

	}

}

/**
 * Instantiate & return the one true instance of our module.
 * We never want to instantiate a module twice! Instantiating
 * in this way also gives us access to the module anywhere we
 * need access to it...and we don't even have to declare a global!
 * We can just use it as a function!
 *
 * @return OBJECT $module
 *
 */
function module(){

    global $projects;

    if( ! isset( $projects ) ){

        $projects = new ProjectsModule;
        $projects->init_module();

    }

    return $projects;
}

module();
