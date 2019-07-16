<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: About • Story » Founders
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  View Settings
 * *************************************
 */


/**
 * *************************************
 *  View Definition
 * *************************************
 */

?>

<div class="p-about-story__founders">
	<div class="f-container f-container--width f-container--max--l">

		<div class="c-founders-highlight">

			<div class="c-founders-highlight__header">
				<div class="c-founders-highlight__image">
					<?= render( 'fragments/components/_c-progressive', $data['image'] ); ?>
				</div>
			</div>

			<div class="c-founders-highlight__body">

				<div class="c-founders-highlight__half c-founders-highlight__left">

					<div class="c-founder">

						<div class="c-founder__title">
							<h3 class="f-hw--b f-hs--l"><?= esc_html( $data['founder_1']['name'] ); ?></h3>
						</div>

						<div class="c-founder__role">
							<p class="f-b--xs"><?= esc_html( $data['founder_1']['roles'] ); ?></p>
						</div>

						<div class="c-founder__bio">
							<p class="f-b--base"><?= wp_kses_post( $data['founder_1']['bio'] ); ?></p>
						</div>

						<div class="c-founder__footer">

							<a class="c-founder__social c-social__account" href="<?= esc_url( $data['founder_2']['insta'] ); ?>" target="_blank">

								<span class="c-social__icon">
									<svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
								</span>

								<span class="c-social__text">Instagram</span>

							</a>

						</div>

					</div>

				</div>

				<div class="c-founders-highlight__half c-founders-highlight__right">

					<div class="c-founder">

						<div class="c-founder__title">
							<h3 class="f-hw--b f-hs--l"><?= esc_html( $data['founder_2']['name'] ); ?></h3>
						</div>

						<div class="c-founder__role">
							<p class="f-b--xs"><?= esc_html( $data['founder_2']['roles'] ); ?></p>
						</div>

						<div class="c-founder__bio">
							<p class="f-b--base"><?= wp_kses_post( $data['founder_2']['bio'] ); ?></p>
						</div>

						<div class="c-founder__footer">

							<a class="c-founder__social c-social__account" href="<?= esc_url( $data['founder_2']['insta'] ); ?>" target="_blank">

								<span class="c-social__icon">
									<svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
								</span>

								<span class="c-social__text">Instagram</span>

							</a>
						</div>

					</div>

				</div>

			</div>
		</div>

	</div>
</div>
