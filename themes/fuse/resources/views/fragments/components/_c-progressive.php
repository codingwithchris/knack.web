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
$type  = 'image';

// Define Image Sizes
$alt_text = esc_html( $data['media']['alt'] );
$placeholder = esc_url( $data['media']['sizes']['thumbnail'] );

$full_image = esc_url( $data['media']['url'] );
$full_image_width = esc_attr( $data['media']['width'] );
$full_image_height =  esc_attr( $data['media']['height'] );

/**
 * *************************************
 * Progressive Image • View Definition
 * *************************************
 */

$type = isset( $data['type'] )
		? $data['type']
		: $type;

?>

<figure class="c-progressive" <?= $data_atts; ?>>
	<img class="c-progressive__<?= $type ?> --not-loaded" alt="<?= $alt_text; ?>" width="<?= $full_image_width; ?>" height="<?= $full_image_height; ?>" src="<?= $placeholder; ?>" data-progressive="<?= $full_image ?>" cross-origin="anonymous">
</figure>
