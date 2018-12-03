<?php

namespace Reactor\Optimize\General;
use function App\config as app;

/**
 * Allow shortcodes to be used in Widgets.
 * This is disabled by default! BOOOO!!!
 *
 * @since  1.0.0
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Hard set the default timezone.
 *
 * For some reason, even when set in WP settings,
 * timezones are still set to the server and not the locale of the business.
 * If we have any date or time based functions, we need the timezone to reflect
 * the timzone of the business this website is being built for!
 *
 * @since  1.0.0
 */

add_action( 'init', __NAMESPACE__ . '\set_timezone');

function set_timezone(){

	date_default_timezone_set( app()->config( 'project', 'timezone' ) );

}