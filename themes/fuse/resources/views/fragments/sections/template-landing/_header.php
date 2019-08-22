<div class="t-landing__header">

	<?php do_action( 'fuse_template_landing_before_logo' ); ?>

	<?php if( isset( $data['logo'] ) && $data['logo'] ) { ?>

		<a href="<?= esc_url( home_url() ); ?>" class="t-landing__logo">
			<?= $data['logo']; ?>
		</a>

	<?php } ?>

	<?php do_action( 'fuse_template_landing_after_logo' ); ?>

</div>
