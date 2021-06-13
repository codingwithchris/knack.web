<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;

/**
 * Type	: Component
 * Name	:  Signup Card
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  Signup Card • View Settings
 * *************************************
 */

/**
 * *************************************
 *  Signup Card • View Definition
 * *************************************
 */

?>


<div class="c-signup-card">

	<div class="c-signup-card__header o-content-block">

		<div class="c-signup-card__title o-content-block__title">
			<h2 class="f-h f-hs--xl">
				<?= $data['title']; ?>
			</h2>
		</div>

		<div class="c-signup-card__copy o-content-block__copy">
			<h3 class="f-b--s">
				<?= $data['copy']; ?>
			</h3>
		</div>

		<div class="c-signup-card__form o-content-block__action">
			<?= $data['form']; ?>
		</div>

	</div>

</div>
