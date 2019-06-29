<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Clients • Logos
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Clients • Logos • View Definition
 * *************************************
 */
?>

<section id="clients-logos" class="p-clients--logos" data-anim-in="false">

    <div class="f-container f-container--width f-container--max--l">

    <div class="o-content-block">

        <div class="o-content-block__title">
            <h5 class="f-hw--b f-hs--l u-c--purple"><?= esc_html( $data['title'] ); ?><h5>
        </div>

    </div>

    <div class="c-collection--logos">
        <?php if( $data['client_logos'] ){

            foreach( $data['client_logos'] as $logo ){ ?>

                <img class="c-collection--logos__logo" src="<?= $logo['logo']['url']; ?>" alt="<?= $logo['logo']['url']; ?>" width="<?= $logo['logo']['width']; ?>" height="<?= $logo['width']['height']; ?>">

            <?php }

        } ?>
    </div>

</section>
