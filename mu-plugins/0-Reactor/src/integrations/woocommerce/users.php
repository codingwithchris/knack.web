<?php
namespace Reactor\Woo\Users;

/**
 * This file holds any functionality customizations relating
 * to WooCommerce Users. Be sure to put any style/visual customizations
 * in the theme and leave this file for functionality changes only.
 */


/**
 * When user accounts are auto-generated on checkout, WooCommerce uses
 * everything before the @ symbol as the username. This is very confusing and is not
 * indicated anywhere. We are going to use the full email address as the username.
 */
add_filter( 'woocommerce_new_customer_data', __NAMESPACE__ . '\force_email_as_username' );

function force_email_as_username( $data ){

    $data['user_login'] = $data['user_email'];

    return $data;

};