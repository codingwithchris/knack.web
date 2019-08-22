<div class="t-landing__footer">

	<?php do_action( 'fuse_template_landing_before_footer_content' ); ?>

	<?php if( isset( $data['content'] ) && $data['content'] ){ ?>
		<?php $data['content']; ?>
	<?php } ?>

</div>
