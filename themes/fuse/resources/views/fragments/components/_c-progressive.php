<?php
/**
 * Type	: Component
 * Name	: Progressive Image
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Progressive Image • Settings
 * *************************************
 */
$data_atts = isset( $data['atts'] ) ? esc_attr( implode( " ", $data['atts'] ) ) : '';

/**
 * *************************************
 * Progressive Image • View Definition
 * *************************************
 */
?>

<div class="c-progressive" <?= $data_atts; ?>>
	<img class="c-progressive__placeholder" data-src="<?= esc_url( $data['media']['url'] ); ?>" src="<?= esc_url( $data['media']['sizes']['thumbnail'] ); ?>" width="<?= esc_attr( $data['media']['sizes']['thumbnail-width'] ); ?>" height="<?= esc_attr( $data['media']['sizes']['thumbnail-height'] ); ?>" aria-hidden="true" cross-origin="anonymous">
	<img class="c-progressive__image" alt="<?= esc_html( $data['media']['alt'] ); ?>" width="<?= esc_attr( $data['media']['width'] ); ?>" height="<?= esc_attr( $data['media']['height'] ); ?>" cross-origin="anonymous">
</div>
