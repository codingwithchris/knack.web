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

$type = isset( $data['type'] )
		? $data['type']
		: 'img';

$sizes = isset( $data['sizes'] )
		? $data['sizes']
		: '';

$srcset = isset( $data['srcset'] )
	? $data['srcset']
	: '';

$background_color = isset( $data['bg_color'] )
					? $data['bg_color']
					: 'transparent';

// Define Image Sizes & data
$alt_text = isset( $data['media']['alt'] )
				? esc_html( $data['media']['alt'] )
				: '';
$placeholder = isset( $data['media']['sizes'] )
				? esc_url( $data['media']['sizes']['thumbnail'] )
				: '';

$full_image = isset( $data['media']['url'] )
				? esc_url( $data['media']['url'] )
				: '';

$full_image_width = isset( $data['media']['width'] )
					? esc_attr( $data['media']['width'] )
					: '';

$full_image_height =  isset($data['media']['height'])
					? esc_attr( $data['media']['height'] )
					: '';

$svg_aspect_ratio_placeholder = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 ${full_image_width} ${full_image_height}'%3E%3C/svg%3E";


/**
 * *************************************
 * Progressive Image • View Definition
 * *************************************
 */

?>

<figure class="c-progressive" <?= $data_atts; ?> data-src="<?= $full_image; ?>" data-sizes="<?= $sizes; ?>" data-srcset="<?= $srcset; ?>" data-type=<?= $type; ?> style="background-color:<?php $background_color; ?>">

	<img class="c-progressive__image --preview" alt="<?= $alt_text; ?>" src="<?= $placeholder; ?>">

	<?php if( $type === 'img' ){ ?>
		<img class="c-progressive__aspect-ratio-sizer" src="<?= $svg_aspect_ratio_placeholder; ?>">
	<?php } ?>

</figure>
