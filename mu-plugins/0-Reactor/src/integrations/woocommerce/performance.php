<?php
namespace Reactor\Woo\Performance;

/**
 * This file holds any customizations relating
 * to WooCommerce performance optimization.
 */

/**
 * Resources & References
 *
 */

// Only Load WooCommerce Scripts & Styles on Approporiate Pages
//https://gist.github.com/DevinWalker/7621777


function dequeue_all_styles() {

    if ( function_exists( 'is_woocommerce' ) ) {

        # Styles
        wp_dequeue_style( 'woocommerce-general' );
        wp_dequeue_style( 'woocommerce-layout' );
        wp_dequeue_style( 'woocommerce-smallscreen' );
        wp_dequeue_style( 'woocommerce_frontend_styles' );
        wp_dequeue_style( 'woocommerce_fancybox_styles' );
        wp_dequeue_style( 'woocommerce_chosen_styles' );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
    }
}

function dequeue_all_scripts() {

    if ( function_exists( 'is_woocommerce' ) ) {

        # Scripts
        wp_dequeue_script( 'wc_price_slider' );
        wp_dequeue_script( 'wc-single-product' );
        wp_dequeue_script( 'wc-add-to-cart' );
        wp_dequeue_script( 'wc-cart-fragments' );
        wp_dequeue_script( 'wc-checkout' );
        wp_dequeue_script( 'wc-add-to-cart-variation' );
        wp_dequeue_script( 'wc-single-product' );
        wp_dequeue_script( 'wc-cart' );
        wp_dequeue_script( 'wc-chosen' );
        wp_dequeue_script( 'woocommerce' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
        wp_dequeue_script( 'jquery-blockui' );
        wp_dequeue_script( 'jquery-placeholder' );
        wp_dequeue_script( 'fancybox' );
        wp_dequeue_script( 'jqueryui' );

    }
}


function dequeue_nonessential_scripts(){

    if ( function_exists( 'is_woocommerce' ) ) {

        # Scripts
        wp_dequeue_script( 'wc_price_slider' );
        wp_dequeue_script( 'wc-single-product' );
        // wp_dequeue_script( 'wc-add-to-cart' );
        // wp_dequeue_script( 'wc-cart-fragments' );
        // wp_dequeue_script( 'wc-checkout' );
        wp_dequeue_script( 'wc-add-to-cart-variation' );
        wp_dequeue_script( 'wc-single-product' );
        // wp_dequeue_script( 'wc-cart' );
        // wp_dequeue_script( 'wc-chosen' );
        // wp_dequeue_script( 'woocommerce' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
        // wp_dequeue_script( 'jquery-blockui' );
        // wp_dequeue_script( 'jquery-placeholder' );
        wp_dequeue_script( 'fancybox' );
        // wp_dequeue_script( 'jqueryui' );

    }

}

function dequeue_nonessential_styles(){

    if ( function_exists( 'is_woocommerce' ) ) {

        # Scripts
        // wp_dequeue_style( 'woocommerce-general' );
        // wp_dequeue_style( 'woocommerce-layout' );
        // wp_dequeue_style( 'woocommerce-smallscreen' );
        // wp_dequeue_style( 'woocommerce_frontend_styles' );
        wp_dequeue_style( 'woocommerce_fancybox_styles' );
        // wp_dequeue_style( 'woocommerce_chosen_styles' );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

    }

}

// https://docs.woocommerce.com/document/disable-the-default-stylesheet/


// Dequeue Paypal Cart Checkout script and styles on all pages other than cart and checkout

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\remove_paypal_styles_scripts', 1000 );

function remove_paypal_styles_scripts(){

    if( ! is_cart() && ! is_checkout() ){

        wp_dequeue_style( 'wc-gateway-ppec-frontend-cart' );
        wp_dequeue_script( 'wc-gateway-ppec-smart-payment-buttons' );
        wp_dequeue_script( 'paypal-checkout-js' );
    }

}