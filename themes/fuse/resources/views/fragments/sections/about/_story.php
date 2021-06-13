<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: About • Story
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * About • Story • View Definition
 * *************************************
 */

?>


<section id="about-story" class="p-about--story" data-anim-in="false">

    <div class="p-about-story__story">

        <div class="f-container f-container--width f-container--max--l">

            <?= render( 'fragments/components/_c-split', $data['story'] ); ?>

        </div>

    </div>

	<div class="p-about-story__squad-intro">
		<div class="f-container f-container--width f-container--max--l">

			<div class="o-content-block">

				<div class="o-content-block__title u-mbn">
					<h5 class="f-h f-hs--xl"><?= esc_html( $data['squad_intro']['title'] ); ?></h5>
				</div>

				<div class="o-content-block__copy">
					<p class="f-b--s"><?= esc_html( $data['squad_intro']['subtitle'] ); ?></p>
				</div>

			</div>

		</div>
	</div>

	<?= render( 'fragments/sections/about/__founders', $data['founders'] ); ?>
	<?= render( 'fragments/sections/about/__team-members', $data['team_members'] ); ?>

</section>
