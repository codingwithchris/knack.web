<?php
namespace Reactor\Woo;

add_action( 'plugins_loaded', __NAMESPACE__ . '\maybe_load_woocommerce_helpers' );

function maybe_load_woocommerce_helpers(){

    if( class_exists( 'woocommerce' ) ){

		require_once( __DIR__ . '/cart.php' );
		require_once( __DIR__ . '/categories.php' );
		require_once( __DIR__ . '/checkout.php' );
		require_once( __DIR__ . '/order.php' );
		require_once( __DIR__ . '/performance.php' );
		require_once( __DIR__ . '/products.php' );
		require_once( __DIR__ . '/redirects.php' );
		require_once( __DIR__ . '/shop.php' );
        require_once( __DIR__ . '/users.php' );

    }

}