<?php
/**
 * This file is a custom implementation of the
 * Wordpress loop. As you can see, it contains
 * custom wrappers so we can gain entry at any point
 * and do something custom.
 *
 * Note that the_content() is not called by default.
 * In order to generate page content from the editor,
 * you need to create a call to a function that
 * hooks into do_action('fiuse_content'). For example:
 *
 * add_action('fuse_content', 'your_callback_function')
 *
 */
if( have_posts() ){

        do_action( 'fuse_before_loop' );


            while( have_posts() ): the_post();


                do_action( 'fuse_before_content' );

                    // Generate page content here
                    do_action( 'fuse_content' );


                do_action( 'fuse_after_content' );


            endwhile;


        do_action( 'fuse_after_loop' );


} else {


    do_action( 'fuse_no_content' );


}