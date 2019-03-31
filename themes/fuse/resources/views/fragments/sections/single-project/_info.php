<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Info
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Info • View Definition
 * *************************************
 */
?>


<div class="p-project__info">

	<p class="p-project__info-header f-b--s">About this Project</p>

	<h1 class="p-project__title f-hw--b f-hs--l"><?= esc_html( $data['title'] ); ?></h1>
	<h2 class="p-project__description f-b--base"><?= wp_kses_post( $data['description'] ); ?></h2>

	<div class="p-project__mediums p-project__meta">

		<div class="p-project__meta__title u-mbn">
			<h3 class="f-hw--b f-hs--s"><?= esc_html( 'Project Mediums' ); ?></h3>
		</div>

		<div class="p-project__meta__list u-mbn">

			<p class="p-project__meta__item"><?= $data['mediums']; ?></p>

		</div>

	</div>

</div>
