<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Title
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Title • View Definition
 * *************************************
 */

 /**
 * *************************************
 * Project - Title • View Definition
 * *************************************
 */
?>

<section id="project-description" class="p-project__description" data-anim-in="false">

	<div class="f-container f-container--width f-container--max--xs">

		<div class="p-project__description__container o-content-block">
			<p class="o-content-block__title f-hw--b f-hs--l"><?= esc_html( $data['title'] ); ?></p>
			<p class="f-b--base o-content-block__copy"><?= wp_kses_post( $data['description'] ); ?></p>
		</div>

	</div>

</section>
