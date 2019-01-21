<?php
namespace Fuse\Components;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;
use function Fuse\Controllers\render as render;
/**
 * Type	: Component
 * Name	: Project • Hero
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project • Hero • Settings
 * *************************************
 */

$media_data = [

	'media' 	=> Acf::field( 'featured_image_desktop' )->get() ,

];


/**
 * *************************************
 * Project • Hero • View Definition
 * *************************************
 */
?>

<div class="c-hero c-hero--project">

	<div class="c-hero__container f-container f-container--width f-container--max--l">

		<!-- Hero Content -->
		<div class="c--hero__content o-content-block" data-anim-in="false">

			<h1 class="c-hero__title o-content-block__title f-hw--b f-hs--xl u-c--gray--d u-mbn">

				<?= esc_html( $data['title'] ); ?>

			</h1>

		</div>

		<!-- End Hero Content -->

	</div>

	<?= render( 'fragments/components/_c-progressive', $media_data ); ?>

</div>
