<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Project - Meta
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project - Meta • View Definition
 * *************************************
 */
?>

<section id="project-meta" class="p-project__meta" data-anim-in="false">

	<div class="f-container f-container--width f-container--max--xs">

		<div class="p-project__client">

				<div class="p-project__client__left o-content-block">

					<div class="p-project__client__info o-content-block__title">

						<h3 class="p-project__client__name f-hw--b f-hs--m u-c--gray--m"><?= esc_html( $data['client_name'] ); ?></h3>

						<?php if( isset( $data['client_website'] ) ){ ?>
							<a class="p-project__client__website f-b--xs" href="<?= esc_url( $data['client_website'] ); ?>" target="_blank">
								<?= preg_replace("(^https?://)", "", esc_url( $data['client_website'] ) ); ?>
							</a>
						<?php } ?>

					</div>

					<div class="p-project__client__description o-content-block__copy u-c--gray--m u-mbn">
						<p class="f-b--s"><?= esc_html( $data['client_description'] ); ?></p>
					</div>

				</div>

				<div class="p-project__client__right o-content-block">

					<div class="p-project__client__industries o-content-block__title u-c--gray--m">
						<h3 class="f-hw--b f-hs--m"><?= esc_html( 'Industry' ); ?></h3>
					</div>

					<div class="p-project__client__industry-list o-content-block__copy u-mbn u-c--gray--m">

						<?php foreach( $data['industries'] as $industry ){ ?>

							<p class="p-project__client__industry f-b--xs"><?= esc_html( $industry ); ?></p>

						<?php } ?>

					</div>

				</div>


		</div>

	</div>

</section>
