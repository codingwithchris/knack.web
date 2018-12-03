<?php

namespace Reactor;


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die( 'You cannot access this file!' );
}

/**
 * Reactor is a suite of tools, optimizations, factories & helper functions
 * to extend Wordpress and make developing Wordpress-based sites much faster
 * and more streamlined.
 *
 * @since 1.0.0
 * @package Reactor
 * @autor   CreativeFuse
 *
 */

class Reactor{

   /**
     * The one true instance of Reactor
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

        $this->config = require_once( __DIR__ . '/_config/config.php' );
        $this->init();

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
     * Get the config object or a value from the config
     *
     * @since  1.0.0
     *
     * @param string $key The first level key to return values for
     * @param string $value The specific value to retrieve
     *
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

    /**
     * Initialize Reactor & require needed files.
     *
     * @since  1.0.0
     */
    private function init(){

        /**
         * Fire up autoloader and load our composer dependencies
         */
        require_once( __DIR__ . '/assets/vendor/autoload.php' );

        /**
         * Load all dependencies as defined in our config file.
         */
        if( $this->config('files') ){

            foreach ( $this->config('files') as $file_path ){

                require_once( __DIR__ . '/src/' . $file_path . '.php' );

            }

        }

    }


}

/**
 * Instantiate & return the one true instance of Reactor.
 * We never want to instantiate Reactor twice!
 *
 * @return OBJECT Reactor Instance
 *
 */
function reactor(){

    return Reactor::get_instance();

}



/**
 * Fires before Reactor is officially initialized
 *
 * @since  1.0.0
 */
do_action( 'reactor_before_init' );


    /**
     * Fire it all up! The class is obfuscated to make it globally available,
     * in case we ever need to get a value from it.
     *
     * @since  1.0.0
     */
    reactor();


/**
 * Fires after Reactor is officially initialized
 *
 * @since  1.0.0
 */
do_action( 'reactor_after_init' );
