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

<div class="c-hero c-hero--post">

    <div class="c-hero__container f-container f-container--width f-container--max--xs">

        <!-- Hero Content -->
        <div class="c--hero__content o-content-block">

            <h1 class="c-hero__title o-content-block__title f-h f-hs--xl u-c--dark-blue">
                <?= esc_html( $data['title'] ); ?>
            </h1>

        </div>

        <!-- End Hero Content -->

    </div>

</div>
