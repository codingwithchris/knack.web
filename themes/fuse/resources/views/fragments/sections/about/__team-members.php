<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: About • Story » Team Members
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

<div class="p-about-story__team-members">
	<div class="f-container f-container--width f-container--max--l">

		<div class="c-team-members">

			<?php if( $data['team_members'] ){

				foreach( $data['team_members'] as $member ){ ?>

					<div class="c-team-member">

						<div class="c-team-member__header">
							<div class="c-team-member__headshot">

									<?php

									// We need to put our image into an array with the key `media`
									// so it works with our progressive image loader

									$headshot = [];
									$headshot['media'] = $member['headshot'];

									echo render( 'fragments/components/_c-progressive', $headshot );

									?>

							</div>
						</div>

						<div class="c-team-member__body">

							<div class="c-team-member__title">
								<h3 class="f-h f-hs--l"><?= esc_html( $member['name'] ); ?></h3>
							</div>

							<div class="c-team-member__role">
								<p class="f-b--xs"><?= esc_html( $member['roles'] ); ?></p>
							</div>

							<div class="c-team-member__bio">
								<p class="f-b--base"><?= wp_kses_post( $member['bio'] ); ?></p>
							</div>

							<?php if( $member['instagram_link'] ){ ?>

								<div class="c-team-member__footer">

									<a class="c-team-member__social c-social__account" href="<?= esc_url( $member['instagram_link'] ); ?>" target="_blank">

										<span class="c-social__icon">
											<svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
										</span>

										<span class="c-social__text">Instagram</span>

									</a>

								</div>

							<?php } ?>

						</div>


					</div>

				<?php }

			} ?>

		</div>

	</div>
</div>
