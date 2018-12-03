<?php
namespace Fuse;
use Reactor\Helpers\Posts;

// Set data we will need for our wrapper
$data = [

	'current_post_type'		=> Posts\post_type_class(),
	'wordpress_loop'		=> fuse()->config( 'paths', 'structure_root' ) . 'the-loop--wp.php',
	'woocommerce_loop'		=> fuse()->config( 'paths', 'structure_root' ) . 'the-loop--woocom.php'
];

?>

<?php do_action( 'fuse_site_begin' ); ?>

	<div id="site-wrapper" class="f-site-wrapper p-page-wrapper--<?= $data['current_post_type']; ?>">

		<?php do_action( 'fuse_header' ); ?>

		<?php do_action( 'fuse_before_content_div' ); ?>

			<div id="site-content" class="f-content">

					<?php do_action( 'fuse_before_main_div' ); ?>

					<main class="f-content__main">

						<?php do_action( 'fuse_hero' );

						/**
						 * First, we want to check and see if WooCommerce Exists
						 * so we can handle it in a special way.
						 */

						 if( function_exists('is_woocommerce') && is_woocommerce() ){

							/**
							 * If it does, in order for WooCommerce to work properly, we
							 * will load the file that handles displaying WooCommerce content
							 */
							include_once $data['woocommerce_loop'];

						} else {

							/**
							 * In all other cases, when WooCommerce does not exist,
							 * we will load the file that handles our standard WP loop.
							 */
							include_once $data['wordpress_loop'];

						} ?>

						<?php do_action( 'fuse_before_main_div_end' ); ?>

					</main>

					<?php do_action( 'fuse_after_main_div' ); ?>


			</div>

		<?php do_action( 'fuse_after_content_div' ); ?>

		<?php do_action( 'fuse_footer' ); ?>

	</div>

<?php do_action( 'fuse_site_end' ); ?>
