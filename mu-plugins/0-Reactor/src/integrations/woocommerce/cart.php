<?php
namespace Reactor\Woo\Cart;

 /**
  * Get basic details about our cart
  *
  * @param [type] $cart
  * @return void
  */
 function get_cart_details( $cart ){

    if( $cart === null )
        return;

        // Assign values to cart variables
    $cart_value = $cart->get_cart_contents_total();
    $cart_shipping = $cart->get_shipping_total();
    $cart_tax = $cart->get_total_tax();
    $cart_discount = $cart->get_discount_total();
    $cart_revenue = $cart->get_cart_contents_total() - $cart->get_total_tax() - $cart->get_shipping_total();

    $cart_coupons= '';

    // Map values to an array we can use anywhere we want!
    $cart_data = [

        'value'     => $cart_value,
        'shipping'  => $cart_shipping,
        'tax'       => $cart_tax,
        'coupon'    => $cart_coupon,
        'discount'  => $cart_discount,
        'currency'  => 'USD',
        'revenue'   => $cart_revenue

    ];

    return $cart_data;

}