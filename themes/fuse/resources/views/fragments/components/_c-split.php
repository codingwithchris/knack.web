<?php
use function Fuse\Controllers\render as render;

/**
 * Type	: Component
 * Name	: Split
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Split • Settings
 * *************************************
 */


/**
 * *************************************
 * Split • View Definition
 * *************************************
 */
?>
<div class="c-split">

    <div class="c-split__half c-split--left">

        <div class="c-split__content">

            <div class="o-content-block">

                <div class="o-content-block__title">
                    <h3 class="f-hw--b f-hs--l">
                        <?= esc_html( $data['title'] ); ?>
                    </h3>
                </div>

                <div class="o-content-block__copy u-mbn">
                    <h3 class="f-b--base">
                        <?= esc_html( $data['copy'] ); ?>
                    </h3>
                </div>

            </div>

        </div>

    </div>

    <div class="c-split__half c-split--right">

        <div class="c-split__media">

            <?php render( 'fragments/components/_c-progressive', $data['image'] ); ?>

        </div>

    </div>

</div>
