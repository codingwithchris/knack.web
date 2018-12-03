<?php
/**
 * A custom handler for displaying
 * WooCommerce content on our site
 */

do_action( 'fuse_before_woo' );

	woocommerce_content();

do_action( 'fuse_after_woo' );