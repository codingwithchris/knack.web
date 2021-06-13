<?php
/**
 * This file controls what content is rendered on the "Blog" page of our site
 * as selected through WP Admin.
 *
 * @since 1.0.0
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 * @see `layouts/template/landing.php` to see this in action
 *
 */

namespace Fuse\Layout\BlogPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandlers;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Blog Page of our site
	if( is_page('blog') ){
        add_action( 'fuse_content', __NAMESPACE__ . '\load_content', 1);
	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_content() {
    echo '<section class="f-section p-blog">';
            the_content();
    echo '<section />';
}