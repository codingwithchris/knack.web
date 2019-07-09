<?php
use Fuse\AssetHandler;
use Samrap\Acf\Acf;
use function Fuse\Controllers\render as render;

/**
 * *************************************
 * Project • Hero • Settings
 * *************************************
 */

/**
 * *************************************
 * Project • Hero • View Definition
 * *************************************
 */

?>

<section class="c-hero p-project__hero" data-anim-in="false">

	<div class="p-project__hero__container f-container f-container--width f-container--max--l u-z--front">

		<div class="p-project__hero__left">
			<?= render( 'fragments/sections/single-project/_info', $data['info'] ); ?>
		</div>

		<div class="p-project__hero__right">
			<?= render( 'fragments/sections/single-project/_client', $data['client'] ); ?>
		</div>


	</div>

	<?php render( 'fragments/components/_c-overlay', $data['overlay'] ); ?>
	<?php render( 'fragments/components/_c-progressive', $data['image'] ); ?>

</section>
