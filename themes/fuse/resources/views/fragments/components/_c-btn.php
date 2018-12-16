<?php
use Fuse\AssetHandler;
/**
 * Type	: Component
 * Name	: Button
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Button • Settings
 * *************************************
 */

 $type = esc_html( $data['btn_type'] );
 $theme = esc_html( $data['btn_theme'] );
 $modifier = esc_html( $data['btn_modifier'] ?? '' );
 $data_atts = esc_html( $data['btn_data_atts'] ?? '' );


/**
 * *************************************
 * Button • View Definition
 * *************************************
 */
?>

<a class="<?="c-btn c-btn--$type c-btn--$type--$theme $modifier" ?>" href="<?= esc_url( $data['btn_url'] ); ?>" <?= $data_atts; ?>>

    <span class="c-btn__text"><?= $data['btn_text']; ?></span>

    <?php if( $type === 'primary' ){ ?>

        <span class="c-btn__icon"></span>

    <?php } ?>

</a>