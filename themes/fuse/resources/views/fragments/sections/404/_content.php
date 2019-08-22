<?php
use Fuse\Controllers;
use Samrap\Acf\Acf;
?>

<section id="404-page" class="f-section p-404">

    <div class="f-container f-container--max--l f-container--width">

		<div class="p-404__header">

			<?php if( isset( $data['logo'] ) && $data['logo'] ) { ?>

				<a href="<?= esc_url( home_url() ); ?>" class="p-404__logo">
					<?= $data['logo']; ?>
				</a>

			<?php } ?>

		</div>

		<div class="p-404__content o-content-block">

			<?php if( isset( $data['title'] ) && $data['title'] ){ ?>

				<div class="p-404__content-title o-content-block__title">
					<h1 class="f-hw--m f-hs--xl u-c--gray--d"><?= esc_html( $data['title'] ); ?></h1>
				</div>

			<?php } ?>

			<?php if( isset( $data['copy'] ) && $data['copy'] ){ ?>

				<div class="p-404__content-copy o-content-block__copy u-mbn">
					<h2 class="f-b--base u-c--gray--m"><?= esc_html( $data['copy'] ); ?></h2>
				</div>

			<?php } ?>

			<?php if( isset( $data['action'] ) && $data['action'] ){ ?>

				<div class="p-404__content-action o-content-block__action">
					<?= $data['action']; ?>
				</div>

			<?php } ?>

		</div>


		<div class="p-404__footer">

			<?php if( isset( $data['footer_content'] ) && $data['footer_content'] ){ ?>
				<?= $data['footer_content']; ?>
			<?php } ?>

		</div>


    </div>

</section>
