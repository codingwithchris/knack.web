<?php
namespace Reactor\Woo\Products;

/**
 * This file holds any functionality customizations relating
 * to WooCommerce Products. Be sure to put any style/visual customizations
 * in the theme and leave this file for functionality changes only.
 */


/**
 * Get the key of a product in the cart so we can do things with it!
 *
 * @param [type] $product_id
 * @return void
 */
function get_product_cart_key( $product_id ){

    // Generate an ID in the cart for our item
    $product_cart_id = WC()->cart->generate_cart_id( $product_id );

    //Look for the product in our cart
    $product_cart_key = WC()->cart->find_product_in_cart( $product_cart_id );

    return $product_cart_key;

}

/**
 * Check to see if the user has a specific product in their cart.
 *
 * @param int $product_id The ID of the product we are checking for
 * @return boolean true if the product we are checking for is in the cart
 */
function is_product_in_cart( $product_id ){

    //Look for the product in our cart
    $product_is_in_cart = get_product_cart_key( $product_id )
                            ? true
                            : false;

    return $product_is_in_cart;

}

/**
 * Remove an item from the cart
 *
 * @param [type] $proudct_id
 * @return void
 */
function remove_product_from_cart( $product_id ){

    $product_cart_key = get_product_cart_key( $product_id );

    // Bail if product not found
    if( ! $product_cart_key )
        return;

    // Remove the item from the cart
    WC()->cart->remove_cart_item( $product_cart_key );

}


/**
 * Custom Add to Cart Button Text
 */
// add_filter('woocommerce_product_add_to_cart_text', __NAMESPACE__ . '\change_add_to_cart_text');

function change_add_to_cart_text(){

    global $product;

    $product_type = $product->get_type();

    switch ( $product_type ) {

		case 'external':
			return __( 'Take me to their site!', 'woocommerce' );
        break;

		case 'grouped':
			return __( 'VIEW THE GOOD STUFF', 'woocommerce' );
        break;

		case 'simple':
			return __( 'Must Have!', 'woocommerce' );
        break;

		case 'variable':
			return __( 'Let\'s See It!', 'woocommerce' );
        break;

		default:
            return __( 'Read more', 'woocommerce' );

	}

}

/**
 * Modify Single Product Add to Cart Button
 */
// add_filter('woocommerce_product_single_add_to_cart_text', __NAMESPACE__ . '\change_single_product_add_to_cart_text');

function change_single_product_add_to_cart_text(){

    return __( 'Must Have!', 'woocommerce' );

}