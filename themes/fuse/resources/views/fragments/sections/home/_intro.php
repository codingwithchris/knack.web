<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Home • Intro
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Home • Intro • View Definition
 * *************************************
 */

?>


<section id="home-intro" class="p-home--intro" data-anim-in="false">
    <div class="f-container f-container--width f-container--max--l">

        <div class="o-content-block">

            <div class="o-content-block__media">
                <?= render( 'fragments/foundations/_f-logo' ); ?>
            </div>

            <div class="o-content-block__title">
                <h3 class="f-hs--3xl">
                    <span class="f-hw--b u-c--gray--m">Knack Creative</span>
                </h3>
            </div>

            <div class="o-content-block__copy">
                <h3 class="f-b--base"><?= esc_html( $data['copy'] ); ?></h3>
            </div>
        </div>

    </div>
</section>
