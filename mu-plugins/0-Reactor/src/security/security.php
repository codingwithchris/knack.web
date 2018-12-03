<?php
namespace Reactor\Security;


/**
 * Remove the WP Version from our site head. Why would we
 * ever want to show this? It opens the door for security
 * issues!
 */

add_filter('the_generator', __NAMESPACE__ . '\remove_wp_version');

function remove_wp_version() {
	return '';
}


/**
 * Give a general login error when a login fails
 * so the person attempting to login has no context
 * for the failure. This helps improve security.
 */
add_filter( 'login_errors', __NAMESPACE__ . '\give_general_wp_login_error' );

function give_general_wp_login_error(){
  return 'Login Unsuccessful :/';
}


// Disable login by email to wp-admin
// be careful with this - new users who regiter with emails might not be able to log back in
// remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );


/**
 * In WP 3.5 XMLRPC is enabled by default. We are disabling it
 * to make our site a bit harder to hack. We will have to re-enable it
 * if we ever want to integrate with tools like IFTTT or Windows Live Writer.
 *
 * Read more here: http://www.wpbeginner.com/plugins/how-to-disable-xml-rpc-in-wordpress/
 */

add_filter('xmlrpc_enabled', '__return_false');


/**
 * Remove the theme editor menu from the
 * wp-admin menu.  We really don't need
 * it for any reason ever.
 *
 * @since  1.0.0
 */
remove_action('admin_menu', '_add_themes_utility_last', 101);