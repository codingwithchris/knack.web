<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Photo Gallery
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Photo Gallery • View Definition
 * *************************************
 */
?>

<section id="project-photos" class="p-project__photos" data-anim-in="false">

	<div class="f-container f-container--width f-container--max--s">

		<div class="p-project__photos__intro o-content-block">
			<p class="o-content-block__title f-hw--l f-hs--l u-mbn"><?= esc_html( 'Photography' ); ?></p>
		</div>

	</div>


	<?= render( 'fragments/components/_c-gallery--photo', $data['photos'] ); ?>


</section>
