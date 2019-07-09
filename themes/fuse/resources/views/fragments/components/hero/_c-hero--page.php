<?php
namespace Fuse\Components;
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;
/**
 * Type	: Component
 * Name	: Page • Hero
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Page • Hero • Settings
 * *************************************
 */

/**
 * *************************************
 * Page • Hero • View Definition
 * *************************************
 */
?>

<div class="c-hero c-hero--page">

    <div class="c-hero__container f-container f-container--width f-container--max--l">

        <!-- Hero Content -->
        <div class="c--hero__content o-content-block">

            <h1 class="c-hero__title o-content-block__title f-hw--m f-hs--xl u-c--gray--d u-mbn">

                <?= esc_html( $data['title'] ); ?>

            </h1>

            <h2 class="c-hero__subtitle o-content-block__copy f-b--base u-c--gray--m u-mbn">

                <?= esc_html( $data['copy'] ); ?>

            </h2>

        </div>

        <!-- End Hero Content -->

    </div>

    <?php render( 'fragments/components/_c-overlay', $data['background_overlay'] ); ?>
    <?php render( 'fragments/components/_c-progressive', $data['background_image'] ); ?>

</div>
