<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: About • Quote
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * About • Quote • View Definition
 * *************************************
 */

?>


<section id="about-quote" class="p-about--quote" data-anim-in="false">
    <div class="f-container f-container--width f-container--max--l">

        <div class="f-blockquote">

            <blockquote class="f-blockquote__copy f-h f-hs--xl">
                <?= esc_html( $data['copy'] ); ?>
            </blockquote>

            <p class="f-blockquote__credit f-b--s">
                ~ <?= esc_html( $data['credit'] ); ?>
            </p>

        </div>

    </div>
</section>