<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Home • Clients
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Home • Clients • View Definition
 * *************************************
 */
?>


<section id="home-clients" class="p-home--clients">
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

    <div class="p-home--clients__action">
            <?php render( 'fragments/components/_c-btn', $data['action'] ); ?>
        </div>

    </div>
</section>