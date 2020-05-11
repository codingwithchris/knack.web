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
