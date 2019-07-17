<?php

/**
 * Reactor Module Abstract CLass
 *
 * @package         Reactor
 * @author          CreativeFuse
 * @license         GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:
 * Description:
 *
 * Version:         1.0.0
 * Author:          CreativeFuse
 * Text Domain:     ipp
 * Requires WP:     4.8
 * Requires PHP:    7.1.4
 */

namespace Reactor\Factory;

class ShortcodeFactory{

	/**
	 * Runtime Configuration parameters
	 *
	 * @since  1.0.0
	 * @var The configuration file for the shortcode
	 */
	public static $config = [];


	/**
	 * Shortcode Constructor registers
	 * the config for the shortcode instance.
	 *
	 * @since  1.0.0
	 * @param array $config shortcode configuration
	 */
	public function __construct( $config ){

		$this->register( $config );

	}


	/**
	 * Register the shortcode's config file
	 * by merging defined $config values with
	 * a set of default values, storing the
	 * new config, and officially adding the
	 * shortcode.
	 *
	 * @since  1.0.0
	 * @param array $config shortcode configuration
	 */

	protected function register( $config ){

		/**
		 * Set our shortcode defaults & merge with
		 * passed in $config params
		 */

		$config = array_merge(

			array(
				'shortcode_name'              => '',
				'do_shortcode_within_content' => true,
				'processing_function'         => null,
				'view'                        => '',
				'defaults'                    => array(),
			),

			$config

		);

		// Store our new config
		$this->store_config( $config['shortcode_name'], $config );

		// Officially add the shortcode
		$this->add_shortcode( $config['shortcode_name'] );

	}

	public function store_config( $shortcode_name, $config ){

		// Store the settings for this shortcode in our shortcode config by name
		self::$config[ $shortcode_name ] = $config;

	}

	/**
	 * Add the shortcode to Wordpress and define
	 * the preccessing callback function.
	 *
	 * @since  1.0.0
	 * @param string $shortcode_name The name of the shortcode
	 */
	public function add_shortcode( $shortcode_name ){

		if ( ! $this->get_config( $shortcode_name ) ) {

			return false;

		}

		\add_shortcode(

			$this->get_config( $shortcode_name, 'shortcode_name' ),
			array( $this, 'process_shortcode_callback' )

		);


	}



	public function process_shortcode_callback( $instance_args, $content, $shortcode_name ){

		/**
		 * Get the config for the shortcode we are currently working with
		 */
		$config = $this->get_config( $shortcode_name );


		// Set shortcode attributes using the current shortcode instance
		$attributes = shortcode_atts(

			$config['defaults'],
			$instance_args,
			$shortcode_name

		);

		// Determine if we need to process the shortcode within $content or not
		if ( $content && $config['do_shortcode_within_content'] ) {

			$content = \do_shortcode( $content );

		}


		// If no processing function could be found in the shortcode $config
		if ( ! $config['processing_function'] ) {

			return "No shortcode process function defined for " . $shortcode_name . ".";

		}


		// Set process function name
		$function_name = $config['processing_function'];

		// Run the processing function and make all data vailable to it.
		return $function_name( $config, $attributes, $content, $shortcode_name );

	}


	/**
	 * Get the config file or a value from the config
	 */
	public function get_config( $key = '', $value = '' ){

	    // If we are passing in a key, let's get the value
	    if( $key && ! $value){

	        return self::$config[ $key ];

	    }

	    // Let's handle getting nested values
	    if( $key && $value){

	        return self::$config[ $key ][ $value ];

	    }

	    // If no value is passed, let's just return
	    return self::$config;

	}


}
