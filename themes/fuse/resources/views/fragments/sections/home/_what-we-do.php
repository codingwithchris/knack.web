<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Home • What We Do
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Home • What We Do • View Definition
 * *************************************
 */

?>

<section id="home-what-we-do" class="p-home--what-we-do" data-anim-in="false">
    <div class="f-container">

        <div class="c-collection--islands">

            <?php render( 'fragments/components/_c-island', $data['videography_island'] ); ?>
            <?php render( 'fragments/components/_c-island', $data['photography_island'] ); ?>

        </div>


    </div>
</section>