<?php
namespace Fuse\AssetHandler;
use Fuse;

/**
 * Load JQuery from Google CDN if Available. This can lead to huge performance gains
 * since it takes the strain off of our server. Also, the vast majority of users will
 * already have this cached.
 *
 * @since  1.0.0
 * @package Fuse\Enqueues
 * @author  CreativeFuse
 */

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\maybe_load_jquery_from_google_cdn' );

function maybe_load_jquery_from_google_cdn(){


    // JQuery settings array
    $jquery = [

        // Are we even wanting to include jquery?
        'include'           => Fuse\fuse()->config('jquery', 'include'),

        // Check to see if we are loading from Google or Not
        'load_from_google'  => Fuse\fuse()->config('jquery', 'use_google_cdn'),

        // What version are we loading
        'version'           => wp_scripts()->registered['jquery']->ver,

    ];


    // Do we want JQuery in our project?
    if( ! $jquery['include'] ){

        // If not, deregisters the default WordPress jQuery & bail
        wp_deregister_script( 'jquery' );

        return;

    }

    /**
     * If we are including JQuery, but we are not loading it from Google,
     * we need to bail, which will mean JQuery just loads from WP as usual.
     */
    if( $jquery['include'] && ! $jquery['load_from_google'] )
        return;

    // Set the site protocol for our final request
    $protocol = is_ssl() ? 'https' : 'http';

    /**
	 * Wordpress added the `-wp` string to it's jquery script in 5.2.1
	 * We need to account and strip it out of our version so Google can load the
	 * correct version of the script.
	 *
	 * @since 1.1.5
	 */
	$jquery_version = str_replace( '-wp', '', $jquery['version']  );

    // Build the final request url
    $jquery_cdn_url 	= $protocol . '://ajax.googleapis.com/ajax/libs/jquery/' . $jquery_version . '/jquery.min.js';
    // deregisters the default WordPress jQuery
    wp_deregister_script( 'jquery' );

    // register the external file
    wp_register_script( 'jquery', $jquery_cdn_url, [], null, false);

    // enqueue the external file
    wp_enqueue_script('jquery');

}
