<?php
use Fuse\Controllers;
use Samrap\Acf\Acf;
?>

<section id="studio-rental-scheduler" class="f-section p-section--studio-rental__scheduler">

    <div class="f-container f-container--max--s f-container--width">

	<div class="c-flag o-content-block">

		<div class="c-flag__title o-content-block__title u-mbn">
			<h5 class="f-hw--b f-hs--xl"><?= $data['title']; ?><h5>
		</div>

		<div class="c-flag__copy o-content-block__copy u-max-w--400">
			<p class="f-b--s"><?= $data['copy']; ?></p>
		</div>

	</div>

	<div class="p-section--studio-rental__embed">
		<?php echo $data['embed']; ?>
	</div>

    </div>

</section>
