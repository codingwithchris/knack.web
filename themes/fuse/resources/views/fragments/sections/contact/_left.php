<?php
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Contact • Left
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Contact • Left • View Definition
 * *************************************
 */

?>


<section id="contact-info" class="p-contact--split p-contact--left">

        <div class="p-contact--split__container">

            <!-- Title -->
            <div class="p-contact__title-group o-content-block">

                <div class="o-content-block__title">
                    <h1 class="f-hw--b f-hs--2xl">
                        <?= esc_html( $data['title'] ); ?>
                    </h1>
                </div>

                <div class="o-content-block__copy">
                    <h2 class="f-b--s">
                        <?= esc_html( $data['subtitle'] ); ?>
                    </h2>
                </div>

            </div>

            <!-- Contact Info -->
            <div class="p-contact__info o-content-block">

                <div class="o-content-block__title">
                    <h1 class="f-hw--b f-hs--m">
                        <?= esc_html( 'Contact Info' ); ?>
                    </h1>
                </div>

                <div class="o-content-block__copy">

                    <div class="c-contact">

                        <a class="c-contact__item c-contact__phone" href="tel:<?= esc_html( $data['contact']['phone'] ); ?>">
                            <?= esc_html( $data['contact']['phone'] ); ?>
                        </a>

                        <a class="c-contact__item c-contact__email" href="mailto:<?= esc_html( $data['contact']['email'] ); ?>">
                            <?= esc_html( $data['contact']['email'] ); ?>
                        </a>

                        <a class="c-contact__item c-contact__address" href="<?= esc_url( $data['contact']['address']['link'] ); ?>" target="_blank">
                            <span class="c-contact__address--top"><?= esc_html( $data['contact']['address']['top'] ); ?></span>
                            <span class="c-contact_-address--bottom"><?= esc_html( $data['contact']['address']['bottom'] ); ?></span>
                        </a>

                        <div class="c-contact__item c-social">


                            <a class="c-social__account c-social__account--instagram" href="<?= esc_url( $data['contact']['instagram']['link'] ); ?>" target="_blank">
                                <span class="c-social__icon"></span>
                                <span class="c-social__text"><?= esc_html( $data['contact']['instagram']['text'] ); ?></span>
                            </a>


                            <a class="c-social__account c-social__account--facebook" href="<?= esc_url( $data['contact']['facebook']['link'] ); ?>" target="_blank">
                                <span class="c-social__icon"></span>
                                <span class="c-social__text"><?= esc_html( $data['contact']['facebook']['text'] ); ?></span>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Back Home -->
            <a class="p-contact__action" href="<?= esc_url( site_url('/') ); ?>">
                <p class="p-contact__action__text f-b--small"><strong><?= esc_html( 'Head Home' ); ?></strong></p>
            </a>

        </div>

        <?php render( 'fragments/components/_c-overlay', $data['background'] ); ?>
        <?php render( 'fragments/components/_c-bg-image', $data['background'] ); ?>

</section>