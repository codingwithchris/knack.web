<?php
namespace Reactor\Woo\Cats;

/**
 * This file holds any functionality customizations relating
 * to WooCommerce Category Pages. Be sure to put any style/visual customizations
 * in the theme and leave this file for functionality changes only.
 */


/**
 *
 * Checks for category existwnce within an order
 *
 * @param $order_id
 * @param $term_name
 * @return bool
 */
function has_category_in_order( $order_id, $term_name ) {

    // get order information from woocommerce
    $order = wc_get_order($order_id);

    //set category name to all lowercase for proper verification
    $_term_name = strtolower($term_name);

    // Loop through all products in the Cart
    foreach ($order->get_items() as $item_id => $item_product) {

        //Get the product ID
        $product_id = $item_product->get_product_id();

        //get category using product id
        $productCat = get_the_terms($product_id, 'product_cat');

        //set category to all lowercase
        $name = strtolower($productCat[0]->name);

        //if category is in order, return true
        if ($name === $_term_name) {
            return true;
        }
    }

    //if category not in order, return false
    return false;
}
