<?php
use Reactor\Helpers;
use Samrap\Acf\Acf;
use Fuse\Controllers;
?>

<a class="f-skip-link u-screen-reader" href="#site-content">
	<?= esc_html( 'Skip to content', 'fuse' ); ?>
</a>

<header id="site-header" class="c-header">

	<div class="c-header__content">
		<div class="c-header__container f-container f-container--max--l f-container--width">

			<?php do_action( 'fuse_header_content' ); ?>

		</div>
	</div>

</header>

<?php Controllers\render( 'fragments/components/menu/_c-menu--mobile' ); ?>
