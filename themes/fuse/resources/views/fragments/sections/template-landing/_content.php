<div class="t-landing__content">

	<?php do_action( 'fuse_template_landing_before_content' ); ?>

	<div class="t-landing__content-block o-content-block">

		<?php if( isset( $data['title'] ) && $data['title'] ){ ?>

			<div class="t-landing__content-title o-content-block__title">
				<h1 class="f-h f-hs--xl u-c--dark-blue"><?= esc_html( $data['title'] ); ?></h1>
			</div>

		<?php } ?>

		<?php if( isset( $data['copy'] ) && $data['copy'] ){ ?>

			<div class="t-landing__content-copy o-content-block__copy u-mbn">
				<h2 class="f-b--base u-c--gold"><?= wp_kses_post( $data['copy'] ); ?></h2>
			</div>

		<?php } ?>

		<?php if( isset( $data['action'] ) && $data['action'] ){ ?>

			<div class="t-landing__content-action o-content-block__action">
				<?php $data['action']; ?>
			</div>

		<?php } ?>

	</div>

	<?php do_action( 'fuse_template_landing_after_content' ); ?>

</div>
