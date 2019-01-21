<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Video Gallery
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Video Gallery • View Definition
 * *************************************
 */

?>

<section id="project-videos" class="p-project__videos" data-anim-in="false">

	<div class="f-container f-container--width f-container--max--s">

		<div class="p-project__photos__intro o-content-block">
			<p class="o-content-block__title f-hw--l f-hs--l u-mbn"><?= esc_html( 'Videography' ); ?></p>
		</div>

	</div>
	<?= render( 'fragments/components/_c-gallery--video', $data['videos'] ); ?>

</section>
