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

        <span class="c-btn__icon">
            <svg aria-hidden="true" data-prefix="fal" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="currentColor" d="M166.9 264.5l-117.8 116c-4.7 4.7-12.3 4.7-17 0l-7.1-7.1c-4.7-4.7-4.7-12.3 0-17L127.3 256 25.1 155.6c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l117.8 116c4.6 4.7 4.6 12.3-.1 17z"></path></svg>
        </span>

    <?php } ?>

    <?php if( $type === 'tertiary' ){ ?>

        <span class="c-btn__icon">
        <svg aria-hidden="true" data-prefix="fal" data-icon="long-arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z"></path></svg>
        </span>

    <?php } ?>

</a>