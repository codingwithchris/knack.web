<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Media
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Media • View Definition
 * *************************************
 */

?>

<section id="project-media" class="p-project__media" data-anim-in="false">

	<?php if( $data['videos'] ){ ?>

		<div class="p-project__media__videos f-container f-container--width f-container--max--l">
			<?= render( 'fragments/components/_c-gallery--video', $data['videos'] ); ?>
		</div>

	<?php } ?>

	<?php if( $data['photos'] ){ ?>

		<div class="p-project__media__photos">
			<?= render( 'fragments/components/_c-gallery--photo', $data['photos'] ); ?>
		</div>

	<?php } ?>

</section>
