<?php
declare(strict_types=1);

namespace Reactor\Helpers\URLs;

/**
 * Get the current base domain
 *
 * example: domain.com
 *
 * @return string the current base domain
 */
function get_domain(){

	return $_SERVER['HTTP_HOST'];

}

/**
 * Get the path of the requested page or content
 *
 * Page example: /about/
 * Search example: /s?how-to-be-a-person
 *
 * @return string the path of the request
 */
function get_reuest_uri(){

        return $_SERVER['REQUEST_URI'];

}

/**
 * The protocol of the current request
 *
 * @return string $protocol http || https
 */
function get_url_protocol(){

        // If the protocol is set, get it!
	$protocol = isset( $_SERVER['HTTPS'] )

                        ? "https"
                        : "http";

	return  $protocol;

}

/**
 * A full URL including protocol, domain, and request uri of the current request
 *
 * @return string $url the full request URL
 */
function get_full_url(){

	$url = get_url_protocol() . '://' . get_domain() . get_reuest_uri();

	return $url;

}

/**
 * Check to see if a domain exists and is working on the ole intrawebs!
 *
 * NOTE: This will only work with the HTTP protocol. Any HTTPS requests must be converted
 * to HTTP requests or the domain will always return as non-existent.
 *
 * @param string $domain what domain are we checking existence for?
 * @return bool
 */
function domain_exists( string $domain ) : bool {

        // Bail if no domain provided
        if( ! $domain )
                return false;

        //check, if a valid url is provided
        if( ! filter_var($domain, FILTER_VALIDATE_URL) )
                return false;

        // Replace https with http for our domain existence check
        $domain = str_replace( 'https://', 'http://', $domain );

        //initialize curl
        $curlInit = curl_init($domain);
        curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
        curl_setopt($curlInit,CURLOPT_HEADER,true);
        curl_setopt($curlInit,CURLOPT_NOBODY,true);
        curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

        //get answer
        $response = curl_exec($curlInit);

        // Close our curl request
        curl_close($curlInit);

        // If we get a response, the site exists
        if ( $response )
                return true;


        return false;

}

// @ref https://stackoverflow.com/questions/27718170/file-path-without-domain-name-from-wp-get-attachment-url

/**
 * Strip out the protocol and domain of a local URL
 * and just return the remaining path without a
 * trailing slash.
 *
 * @param string $url the URL to strip the domain and protocol form
 * @return string the new url
 */
function strip_domain_from_url( string $url ) : string {

        if( ! $url )
                return '';

        //output local path without beginning slash
        return explode(get_full_url(), $url)[1];

}

/**
 * Remove the protocol from a URL
 *
 * @param string $url The URL we are stripping the protocol from
 * @return string the new url
 */
function strip_protocol_from_url( string $url ) : string {

        if( ! $url )
                return '';

        $url = preg_replace('#^https?://#', '', $url);

        return $url;

}