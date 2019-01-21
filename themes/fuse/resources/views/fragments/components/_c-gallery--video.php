<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	:  Collection - Videos
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  Collection - Videos • View Settings
 * *************************************
 */

/**
 * *************************************
 *  Collection - Videos • View Definition
 * *************************************
 */
?>

<div class="c-gallery c-gallery--video">

	<?php foreach( $data as $media ){ ?>

		<div class="c-gallery__media">

			<?php

				$media_data = [

					'video' 	=> $media['video_url'] ,

				];

				render( 'fragments/components/_c-responsive-video', $media_data );

			?>

		</div>

	<?php } ?>

</div>
