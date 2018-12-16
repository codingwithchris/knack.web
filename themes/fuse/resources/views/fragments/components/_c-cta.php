<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	:  CTA
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  CTA • View Definition
 * *************************************
 */

?>


<div class="c-cta c-cta--<?= $data['type']; ?> <?= $data['modifier_class']; ?>">

    <div class="f-container f-container--width f-container--max">

        <div class="c-cta__content o-content-block">

            <div class="c-cta__title o-content-block__title">
                <h5 class="f-hw--b f-hs--2xl">
                    <?= $data['title']; ?>
                <h5>
            </div>

            <div class="c-cta__copy o-content-block__copy">
                <p class="f-b--base"><?= $data['copy']; ?></p>
            </div>

            <div class="c-cta__action o-content-block__action">
                <?php render( 'fragments/components/_c-btn', $data['action'] ); ?>
            </div>

        </div>

    </div>

    <?php
        if( $data['bg_overlay'] ){
            render( 'fragments/components/_c-overlay', $data['bg_overlay'] );
        }
    ?>

    <?php
        if( $data['bg_image'] ){
            render( 'fragments/components/_c-bg-image', $data['bg_image'] );
        }
    ?>

</div>