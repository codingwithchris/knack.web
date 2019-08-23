<?php
namespace Fuse\Components;
use Fuse\Controllers;
/**
 * Type	: Component
 * Name	: Nav -- Mobile
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Nav -- Mobile • Settings
 * *************************************
 */


/**
 * *************************************
 * Nav -- Mobile • View Definition
 * *************************************
 */

?>

<nav class="c-nav c-nav--mobile">

	<div class="c-nav--mobile__content">

		<a class="c-nav__logo" href="<?= esc_url( home_url('/') ); ?>" aria-label="Go to the home page" title="Knack Creative">
				<?php Controllers\render( 'fragments/foundations/_f-logo' ); ?>
		</a>

		<button class="c-mobile-menu-button js-open-mobile-menu">

			<span class="c-mobile-menu-button__bread --top"></span>
			<span class="c-mobile-menu-button__bread --bottom"></span>

		</button>

	</div>

</nav>
