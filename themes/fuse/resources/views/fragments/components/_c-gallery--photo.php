<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	:  Collection - Photos
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  Collection - Photos • View Settings
 * *************************************
 */

/**
 * *************************************
 *  Collection - Photos • View Definition
 * *************************************
 */
?>

<div class="c-gallery c-gallery--photo">

	<?php foreach( $data['photos'] as $media ){ ?>

		<div class="c-gallery__media">

			<?php

				$media_data = [

					'media' 	=> $media['photo'] ,
					'atts'		=> [

						"data-lightbox-img={$media['photo']['url']}"

					]

				];

				render( 'fragments/components/_c-progressive', $media_data );

			?>

		</div>

	<?php } ?>

</div>
