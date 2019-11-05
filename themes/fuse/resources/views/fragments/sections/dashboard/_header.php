<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Dashboard Header
 *
 * @since 1.0.0
 * @author CreativeFuse
 */


/**
 * *************************************
 * Dashboard Header • View Definition
 * *************************************
 */

?>


<section id="dashboard-header" class="p-dashboard--header" data-anim-in="false">

	<?php if( isset( $data['logo'] ) ){ ?>

		<div class="p-dashboard--header__logo">
			<?= $data['logo']; ?>
		</div>

	<?php } ?>

	<div class="p-dashboard--header__ig">
		<a class="p-dashboard--header__ig-link f-b--s" href="<?= esc_url( $data['instagram']['link'] ); ?>" rel="noopener" target="_blank">
			<?= esc_html( '@' . $data['instagram']['handle'] ); ?>
		</a>
	</div>

</section>
