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


<section id="about-story-team" class="p-about--story-team" data-anim-in="false">

    <div class="p-about-story-team__story">

        <div class="f-container f-container--width f-container--max--l">

            <?= render( 'fragments/components/_c-split', $data['story'] ); ?>

        </div>

    </div>

    <div class="p-about-story-team__team">

        <div class="f-container f-container--width f-container--max--l">

            <div class="o-content-block">

                <div class="o-content-block__title u-mbn">
                    <h5 class="f-hw--b f-hs--xl"><?= esc_html( $data['team']['title'] ); ?></h5>
                </div>

                <div class="o-content-block__copy">
                    <p class="f-b--s"><?= esc_html( $data['team']['subtitle'] ); ?></p>
                </div>

            </div>

            <?php if( $data['team']['team_members'] ){ ?>

                <div class="c-collection--bios">

                    <?php foreach( $data['team']['team_members'] as $bio ){ ?>

                            <?= render( 'fragments/components/_c-bio', $bio ); ?>

                    <?php } ?>

                </div>

            <?php } ?>

        </div>

    </div>

</section>