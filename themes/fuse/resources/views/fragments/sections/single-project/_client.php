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

		<h3 class="p-project__client-name f-h f-hs--m u-c--dark-blue"><?= esc_html( $data['name'] ); ?></h3>

		<?php if( isset( $data['website'] ) ){ ?>
			<a class="p-project__client-website f-b--xs" href="<?= esc_url( $data['website'] ); ?>" target="_blank" rel="noopener">
				<?= preg_replace("(^https?://)", "", esc_url( untrailingslashit( $data['website'] ) ) ); ?>
			</a>
		<?php } ?>

	</div>

	<div class="p-project__client-description u-c--dark-blue">
			<p class="f-b--s"><?= esc_html( $data['description'] ); ?></p>
	</div>

</div>
