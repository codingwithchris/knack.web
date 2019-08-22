<?php
/**
 * GTM's Main Class
 *
 * @since  1.0.0
 * @package GM\GoogleTagManager
 * @author CreativeFuse
 *
 * The main class responsible for loading the config file and instantiating GTM.
 *
 */

namespace GM\GoogleTagManager;

class GTMLoader{

	/**
	 * An Array of all of the modules
	 * to load and instantiate
	 */
	private $config;


	 public function __construct(){

	 	// Set out config
		 $this->config = module()->get_config();

		/**
		 * The main function that dynamically loads the GTM Scripts
		 * into the appropriate spots
		 *
		 */
		add_action( 'init', array( $this, 'load_gtm' ), 2 );


	 }


	/**
	*  Loads the first part of Google Tag Manager in the Head as per docs and then
	*  dynamically loads the seconds part in the body as per docs.
	* @Uses wp_head
	* @uses the return of get_gtm_body_hook() to load the body script
	* @note this action needs to be called right after the opening body tag
	*  as required by google tag manager
	* @since 1.1.0
	*/
	public function load_gtm(){

		// Only load GTM if the user is not an admin
		if( ! \is_admin() && $this->config['container']['id'] ){

			add_action( 'fuse_load_analytics_head', array( $this, 'load_gtm_head' ), 1 );
			add_action( 'wp_body_open', array( $this, 'load_gtm_body' ), 1 );

		}

	}

	public function load_gtm_head(){

		$script_file = include_once ( module()->get_dir() . '/assets/scripts/gtm-head.php' );
		$script = str_replace( '{{container_id}}', $this->config['container']['id'], $script_file );

		echo $script;

	}

	public function load_gtm_body(){


		$script_file = include_once ( module()->get_dir() . '/assets/scripts/gtm-body.php' );
		$script = str_replace( '{{container_id}}', $this->config['container']['id'], $script_file );

		echo $script;

	}



}
