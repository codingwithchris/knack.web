<?php

namespace Reactor\Woo\Redirects;
use Reactor\Woo\Checkout;
use Reactor\Woo\Cats;
use Samrap\Acf\Acf;

/**
 * This file holds any customizations relating
 * to WooCommerce redirects.
 */

/**
 * Redirect WooCommerce Orders to a custom Thank You Page
 *
 * Note that we are also passing in the full WooCommerce query string
 * for completed orders to the new URL like a good developer ;)
 */
add_action( 'template_redirect', __NAMESPACE__ . '\redirect_to_custom_thank_you' );

function redirect_to_custom_thank_you(){

    /**
     * Bail if we can't get the order ID from the query string OR we are not on the default order received page
     *
     * IMPORTANT NOTE: If we do not check if we are on the order received page, we will ALWAYS infinite loop
     * When this redirect hits. Why? Because it is checking to see if the query string for the order ID exists.
     * If we did our job right, this query string will ALWAYS exist on the page we are redirecting to because
     * we are passing the query string to the redirected URL.
     *
     * Since we are using custom order received pages, the WooCommerce function
     * is_order_received_page() will return TRUE when our first `template_redirect` fires,
     * but once we hit our custom page, it will return FALSE, since we are no longer on the
     * default order received page.
     */

    if( ! Checkout\get_order_id_from_query_string() || ! is_order_received_page() )
        return;

    $order_id = Checkout\get_order_id_from_query_string();

    // Get the thank you page from our ACF options
    $thank_you_page = '';

    // Allow our page to be easily modified if we need to change the redirect page
    $_thank_you_page = apply_filters( 'fuse_woo_thank_you_redirect', $thank_you_page, $order_id );

    // Make sure we have a thank you page and an order ID before committing to the redirect
    if( ! empty( $_thank_you_page ) && $order_id ){

        // Append our query string vars onto our redirect page URL
        $full_thank_you_url = $_thank_you_page . Checkout\get_order_received_endpoint_query_string($order_id);

        // Safe redirect to custom thank you page
        wp_safe_redirect( $full_thank_you_url );

        //exit function
        exit;

    }

}


/**
 * Get a custom thank you page URL
 *
 * @return string $woo_thank_you_url The URL to our custom thank you page
 */
add_filter( 'fuse_woo_thank_you_redirect', __NAMESPACE__ . '\get_custom_woocommerce_thank_you' );

function get_custom_woocommerce_thank_you( $thank_you_page ){

    // Get URL here

    return $thank_you_page;
}
