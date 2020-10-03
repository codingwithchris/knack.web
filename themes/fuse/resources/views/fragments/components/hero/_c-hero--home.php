<?php
namespace Fuse\Components;
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;
/**
 * Type	: Component
 * Name	: Home Hero
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Home Hero • Settings
 * *************************************
 */

/**
 * *************************************
 * Home Hero • View Definition
 * *************************************
 */
?>

<div class="c-hero c-hero--home">

    <div class="c-hero__container f-container f-container--width f-container--max--l">

        <!-- Hero Content -->
        <div class="c--hero__content o-content-block">

            <h1 class="c-hero__title o-content-block__title f-h f-hs--2xl u-c--dark-blue">

                <?= $data['title']; ?>

            </h1>

            <h2 class="c-hero__subtitle o-content-block__copy f-h f-hs--l u-c--gold">

                <?= $data['copy']; ?>

            </h2>

            <div class="c-hero__action o-content-block__action o-content-block__action--inline">

                <?php render( 'fragments/components/_c-btn', $data['secondary_action'] ); ?>
                <?php render( 'fragments/components/_c-btn', $data['primary_action'] ); ?>

            </div>

        </div>

        <!-- End Hero Content -->

    </div>

    <?php render( 'fragments/components/_c-overlay', $data['background'] ); ?>
    <?php render( 'fragments/components/_c-bg-video', $data['background'] ); ?>
    <?php render( 'fragments/components/_c-progressive', $data['background']['image'] ); ?>

</div>
