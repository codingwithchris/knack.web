<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Meta
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Meta • View Definition
 * *************************************
 */
?>

<div class="p-project__client">

	<p class="p-project__client-header f-b--s">About the Client</p>

	<div class="p-project__client-info">

		<h3 class="p-project__client-name f-hw--b f-hs--m u-c--gray--m"><?= esc_html( $data['name'] ); ?></h3>

		<?php if( isset( $data['website'] ) ){ ?>
			<a class="p-project__client-website f-b--xs" href="<?= esc_url( $data['website'] ); ?>" target="_blank" rel="noopener">
				<?= preg_replace("(^https?://)", "", esc_url( $data['website'] ) ); ?>
			</a>
		<?php } ?>

	</div>

	<div class="p-project__client-description u-c--gray--m">
			<p class="f-b--s"><?= esc_html( $data['description'] ); ?></p>
	</div>

	<div class="p-project__client-industries p-project__meta">

		<div class="p-project__meta__title u-c--gray--m u-mbn">
			<h3 class="f-hw--b f-hs--s"><?= esc_html( 'Client Industries' ); ?></h3>
		</div>

		<div class="p-project__meta__list u-mbn u-c--gray--m">

			<p class="p-project__meta__item"><?= $data['industries']; ?></p>

		</div>

	</div>

</div>
