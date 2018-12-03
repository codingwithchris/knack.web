<?php
/**
 * This file controls what content is rendered on Singular Pages or Posts.
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 * @see `layouts/template/landing.php` to see this in action
 *
 */

namespace Fuse\Layout\PagePost;
use Fuse\Controllers;




// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){


	//Check to see if we are on a page or a singular post.
	if( is_page() || is_singular( 'post' ) ){

		add_action( 'fuse_before_loop', __NAMESPACE__	. '\load_article_wrapper', 1);

	}

}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/


// Load the article wrapper
function load_article_wrapper(){

	Controllers\render( 'structure/article-open' );

}