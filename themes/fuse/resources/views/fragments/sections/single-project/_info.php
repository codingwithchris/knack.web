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
			<h3 class="f-hw--b f-hs--s"><?= esc_html( _n( 'Project Medium', 'Project Mediums', $data['medium_count'] ) ); ?></h3>
		</div>

		<div class="p-project__meta__list u-mbn">

			<p class="p-project__meta__item"><?= $data['mediums']; ?></p>

		</div>

	</div>

	<div class="p-project__client-industries p-project__meta">

		<div class="p-project__meta__title u-c--gray--d">
			<h3 class="f-hw--b f-hs--s"><?= esc_html( _n( 'Project Category', 'Project Categories', $data['category_count'] ) ); ?></h3>
		</div>

		<div class="p-project__meta__list u-c--gray--d">

			<p class="p-project__meta__item"><?= $data['categories']; ?></p>

		</div>

	</div>

</div>
