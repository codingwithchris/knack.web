<?php
use function Fuse\Controllers\render as render;

/**
 * Type	: Component
 * Name	: Bio
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Bio • Settings
 * *************************************
 */

/**
 * *************************************
 * Bio • View Definition
 * *************************************
 */

?>
<div class="c-bio">

    <div class="c-bio__media">

        <img class="c-bio__headshot" src="<?= esc_url( $data['desktop_image']['url'] ); ?>" alt="<?= esc_html( $data['desktop_image']['alt'] ); ?>" width="<?= esc_attr( $data['desktop_image']['width'] ); ?>" height="<?= esc_attr( $data['desktop_image']['height'] ); ?>">

    </div>

    <div class="c-bio__content">

        <div class="c-bio__name">
            <h3 class="f-hw--b f-hs--l">
                <?= esc_html( $data['name'] ); ?>
            </h3>
        </div>

        <div class="c-bio__roles">
            <p class="f-b--xs">
                <?= esc_html( $data['roles'] ); ?>
            </p>
        </div>

        <div class="c-bio__copy">
            <p class="f-b--base">
                <?= strip_tags( $data['bio'], '<strong><a><br>' ); ?>
            </p>
        </div>

        <div class="c-bio__insta">
        </div>

    </div>

</div>
