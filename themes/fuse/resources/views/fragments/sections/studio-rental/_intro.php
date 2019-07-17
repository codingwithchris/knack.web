<?php
use function Fuse\Controllers\render as render;
use Fuse\Controllers;
use Samrap\Acf\Acf;
?>

<section id="studio-rental-intro" class="f-section p-section--studio-rental__intro">

    <div class="f-container f-container--max--s f-container--width">

		<div class="p-section--studio-rental__intro-content o-content-block">

		<div class="o-content-block__media">
				<?= render( 'fragments/components/_c-progressive', $data['image'] ); ?>
			</div>
			<div class="o-content-block__copy f-b--base u-align--center u-mbn">
				<?= $data['content']; ?>
			</div>
			<div class="p-section--studio-rental__intro-action o-content-block__action o-content-block__action--inline">

                <?php render( 'fragments/components/_c-btn', $data['gallery_action'] ); ?>
                <?php render( 'fragments/components/_c-btn', $data['booking_action'] ); ?>

            </div>
		</div>

    </div>

</section>
