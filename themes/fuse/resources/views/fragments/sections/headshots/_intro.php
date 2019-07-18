<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Headshots • Intro
 *
 * @since 1.0.0
 * @author CreativeFuse
 */


/**
 * *************************************
 * Headshots • Intro • View Definition
 * *************************************
 */

?>


<section id="headshots-intro" class="p-headshots--intro" data-anim-in="false">

    <div class="f-container f-container--width f-container--max--l">

        <div class="o-content-block">

			<div class="o-content-block__media">
				<?= AssetHandler\get_svg( $data['icon'] ); ?>
			</div>

            <div class="o-content-block__copy u-mbn">
                <h3 class="f-b--base">
                    <?= wp_kses_post( $data['copy'] ); ?>
                </h3>
            </div>
        </div>

	</div>

</section>
