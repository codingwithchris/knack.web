<?php
use Fuse\Controllers;
use Samrap\Acf\Acf;
?>

<section id="studio-rental-scheduler" class="f-section p-section--studio-rental__scheduler">

    <div class="f-container f-container--max--s f-container--width">

		<div class="o-content-block">

		<div class="o-content-block__title u-mbn">
				<h3 class="f-b--base">
					<?= wp_kses_post( $data['title'] ); ?>
				</h3>
		</div>

			<div class="o-content-block__copy u-mbn">
				<p class="f-b--base">
					<?= wp_kses_post( $data['copy'] ); ?>
				</p>
			</div>

		</div>


		<div class="p-section--studio-rental__embed">
			<?php echo $data['embed']; ?>
		</div>

    </div>

</section>
