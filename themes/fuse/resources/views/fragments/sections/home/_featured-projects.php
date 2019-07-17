<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Home • Featured Projects
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Home • Featured Projects • View Definition
 * *************************************
 */

?>


<section id="home-projects" class="p-home--projects u-bgc--gray--l" data-anim-in="false">
    <div class="f-container f-container--width f-container--max--l">

        <div class="c-flag o-content-block">

            <div class="c-flag__title o-content-block__title u-mbn">
                <h5 class="f-hw--b f-hs--xl">Featured Projects<h5>
            </div>

            <div class="c-flag__copy o-content-block__copy">
                <p class="f-b--s">Take a look at some of our favorite work.</p>
            </div>

        </div>

        <div class="p-home--projects__content">

            <?=
                /**
                 * Display Knack Creative's Featured Projects
                 * Note: This relies on a must-use plugin called "projects"
                 */
                do_shortcode( '[featured_projects count="3"]' );
            ?>

        </div>

        <div class="p-home--projects__action">
            <?php render( 'fragments/components/_c-btn', $data['action'] ); ?>
        </div>

    </div>
</section>
