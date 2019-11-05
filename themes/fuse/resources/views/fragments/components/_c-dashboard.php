<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;

/**
 * Type	: Component
 * Name	:  Dashboard
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  DASHBOARD • View Settings
 * *************************************
 */

$tiles = isset( $data['tiles'] ) ? $data['tiles'] : [];

$count = 1;

/**
 * *************************************
 *  DASHBOARD • View Definition
 * *************************************
 */

?>

<div class="c-dashboard">

	<?php foreach( $tiles as $tile ){

		// Resolve internal vs external URLs

		$url_type = $tile['link_type'] === 'external'
			? ' target="_blank" rel="noopener"'
			: '';

		$url = $tile['link_type'] === 'external'
			? $tile['external_link']
			: $tile['internal_link'];

		$tile_bg_image = [
			'media' => isset( $tile['bg_image'] ) ? $tile['bg_image'] : '',
			'type'	=> 'bg'
		];

		$tile_overlay = [
			'overlay_type'	=> isset( $tile['bg_image'] ) ? 'purple--95' : 'purple--100'
		];

		?>

		<?php if( $count === 3 ) { ?>

			<div class="c-dashboard-tile --signup">

				<?= $data['signup_component']; ?>

			</div>

		<?php } ?>


		<a class="c-dashboard-tile --link --<?=$tile['link_type']; ?>" href="<?= $url; ?>" <?= $url_type; ?>>

			<div class="c-dashboard-tile__inner">

				<p class="c-dashboard-tile__text f-hw--b f-hs--l">
					<?= isset( $tile['text'] ) ? $tile['text'] : 'You must add text to your tile'; ?>
				</p>

			</div>

			<div class="c-dashboard-tile__bg">
					<?php render( 'fragments/components/_c-overlay', $tile_overlay ); ?>

					<?php if( isset( $tile['bg_image'] ) ){

						render( 'fragments/components/_c-progressive', $tile_bg_image );

					} ?>

			</div>

		</a>


		<?php $count ++; ?>

	<?php } ?>

</div>
