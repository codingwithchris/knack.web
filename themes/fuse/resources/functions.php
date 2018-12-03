<?php
namespace Fuse;

/**
 * This is the main class for our theme. It's purposes
 * is to load and make globally available our theme config
 * and include dependencies. That is it. This class serves
 * no other purposes and all custom functionality
 * will be built elsewhere.
 *
 * @since  1.0.0
 * @package  Fuse;
 * @author  CreativeFuse
 */

final class Fuse{

	/**
	 * The one true instance of our theme
     * @var Fuse
     */
	private static $instance;

	/**
	 * Our Configuration Object
	 * @var array
	 */
	public $config = [];


	 /**
     * Instantiation can be done only inside the class itself
     */
	protected function __construct() {

		$this->set_theme_root();

        // Must load config in before theme root defined
        $this->config = include_once dirname(__FILE__, 2) .'/_config/config.php';

        // Load local dependencies
		$this->load_dependencies();

	}

    /**
     * Cloning singleton is not possible.
     *
     * @throws Exception
     */
    public function __clone(){

        throw new Exception('You cannot clone singleton object');

    }

    /**
     * Waking Up singleton is not possible.
     *
     * @throws Exception
     */
    protected function __wakeup() {

    	throw new Exception('You cannot wakeup singleton object');

    }


    /**
     * Return the one true instance of our class if already exists,
     * otherwise, we will instantiate the class here.
     *
     * @since  1.0.0
     */
    public static function get_instance(){

        if (! isset(self::$instance) ) {

            self::$instance = new self();

        }

        return self::$instance;

	}


    /**
     * Tell WP to look in this directory for anything theme related, but look in the root of our project
     * otherwise.
     *
     * @param [type] $path [description]
     */
    private function set_theme_root(){

        array_map(
            'add_filter',
            ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
            array_fill(0, 4, 'dirname')
        );

    }



    /**
     * Get the config object or a value from the config
     *
     * @since  1.0.0
     *
     * @param string $key The first level key to return values for
     * @param string $value The specific value to retrieve
     *
     */
    public function config( $key = null, $value = null ){

        // If we are passing in a key, let's get the value
        if( $key && ! $value){

            return $this->config[ $key ];

        }

        // Let's handle getting nested values
        if( $key && $value){

            return $this->config[ $key ][ $value ];

        }

        // If no value is passed, let's just return the config object
        return $this->config;

    }



    /**
     * Load all dependencies as defined in our config file.
     *
     * @since  1.0.0
     */
    private function load_dependencies(){

        // Set dependency vars
        $local_dependencies = $this->config( 'files' );


        // Load all local deps
        foreach ( $local_dependencies as $file ){

            include_once get_theme_file_path() . '/app/' . $file . '.php';

        }

    }


}

/**
 * Instantiate & return the one true instance of our Fuse Theme.
 * We never want to instantiate Fuse twice!
 *
 * @return OBJECT Fuse();
 *
 */
function fuse(){

	return Fuse::get_instance();

}

/**
 * Fires before Fuse is officially initialized
 *
 * @since  1.0.0
 */
do_action( 'fuse_before_init' );

    /**
     * Fire it all up! The class is obfuscated to make it globally available,
     * which makes it easy to get our config values!
     *
     * @since  1.0.0
     */
    fuse();

/**
 * Fires after Fuse is fully initialized
 *
 * @since  1.0.0
 */

do_action( 'fuse_after_init' );