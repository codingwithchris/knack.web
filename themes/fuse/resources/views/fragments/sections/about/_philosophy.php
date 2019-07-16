<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: About • Philosophy
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * About • Philosophy • View Definition
 * *************************************
 */

?>


<section id="about-philosophy" class="p-about--philosophy" data-anim-in="false">
    <div class="f-container f-container--width f-container--max--l">

        <div class="o-content-block">

            <div class="o-content-block__copy u-mbn">
                <h3 class="f-b--base">
                    <?= wp_kses_post( $data['copy'] ); ?>
                </h3>
            </div>
        </div>

    </div>
</section>
