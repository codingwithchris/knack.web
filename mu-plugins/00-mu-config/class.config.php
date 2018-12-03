<?php

/**
 * Reactor MU Plugins Loader
 *
 * @package         Wordpress
 * @author          Christopher Hahn - CreativeFuse
 * @license         GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:     Reactor Must-Use Plugins Loader
 * Description:     Loads all Must Use Plugins for CreativeFuse
 *
 * Version:         1.0.0
 * Author:          Christopher Hahn
 * Text Domain:     pg
 * Requires WP:     4.8
 * Requires PHP:    7.1.4
 */

namespace App;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'You cannot access this file!' );
}

class Config{


	/** @var array Store MU Plugin Registration Information*/
	public $config;


    public function init(){

        $this->config = require_once( __DIR__ . '/config.php' );

    }

    /**
     * Get the config file or a value from the config
     */
    public function config( $key = '', $value = '' ){

        // If we are passing in a key, let's get the value
        if( $key && ! $value){

            return $this->config[ $key ];

        }

        // Let's handle getting nested values
        if( $key && $value){

            return $this->config[ $key ][ $value ];

        }

        // If no value is passed, let's just return
        return $this->config;

    }


}



/**
 * Instantiate & return the one true instance of our
 * MU Plugin Config. We never want to instantiate
 * our config twice!
 *
 * @return OBJECT $config
 * 
 */
function config(){

    global $config;

    if( ! isset( $config ) ){

        $config = new Config;
        $config->init();

    }

    return $config;
}

config();