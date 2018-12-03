<?php
namespace Reactor\Woo\Checkout;
use Reactor\Helpers\URLs;
/**
 * This file holds any functionality customizations relating
 * to the WooCommerce Checkout. Be sure to put any style/visual customizations
 * in the theme and leave this file for functionality changes only.
 */

/**
 * use order_id to find partial endpoint URL
 *
 * @param $order_id
 * @return array
 */
function get_order_received_endpoint_query_string($order_id) {

    //get order from WC using order id
    $order = wc_get_order($order_id);

    //create new array from explode function
    $parts = explode(wc_get_checkout_url(), $order->get_checkout_order_received_url());

    //return order recieved portion of ccheckout URL
    return $parts[1];

}

/**
 * Get the order received endpoint
 *
 * @return string
 */
function get_order_received_endpoint_partial(){

    return get_option( 'woocommerce_checkout_order_received_endpoint' );

}


/**
 * Use the Order Received page query string to get the order ID
 *
 * @return void
 */
function get_order_id_from_query_string(){

    $order_id = get_query_var( get_order_received_endpoint_partial() ) ?? false;

    return $order_id;

}

// Redirect Checkout login to current page
add_filter( 'woocommerce_login_redirect', __NAMESPACE__ . '\checkout_login_redirect', 10, 1 );

/**
 * Function called by login redirect filter,
 * returns current href upon request
 */
function checkout_login_redirect( &$redirect ) {

	return URLs\get_full_url();

}



/**
 * Modify WooCommerce Address Fields Messaging and Requirements
 */
add_filter( 'woocommerce_default_address_fields' , __NAMESPACE__ . '\modify_address_fields', 100, 1 );

// Change placeholder and label text
function modify_address_fields( $fields ) {

    return $fields;

}

/**
 * Modify WooCommerce Checkout Billing Specific Fields
 */
add_filter( 'woocommerce_checkout_fields' , __NAMESPACE__ . '\modify_billing_fields', 100, 1 );

function modify_billing_fields( $fields ){

    return $fields;

}