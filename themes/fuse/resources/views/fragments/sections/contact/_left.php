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



            </div>

            <!-- Contact Info -->
            <div class="p-contact__info o-content-block">

                <div class="p-contact__info__wrapper">

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

                            <div class="c-social">


                                <a class="c-contact__item c-social__account c-social__account--instagram" href="<?= esc_url( $data['contact']['instagram']['link'] ); ?>" target="_blank">
                                    <span class="c-social__icon">
                                        <svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                                    </span>
                                    <span class="c-social__text"><?= esc_html( $data['contact']['instagram']['text'] ); ?></span>
                                </a>


                                <a class="c-contact__item c-social__account c-social__account--facebook" href="<?= esc_url( $data['contact']['facebook']['link'] ); ?>" target="_blank">
                                    <span class="c-social__icon">
                                        <svg aria-hidden="true" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-9" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512"><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg>
                                    </span>
                                    <span class="c-social__text"><?= esc_html( $data['contact']['facebook']['text'] ); ?></span>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <!-- Back Home -->
            <a class="p-contact__action" href="<?= esc_url( site_url('/') ); ?>">
                <p class="p-contact__action__text f-b--small"><strong><?= esc_html( 'Head Home' ); ?></strong></p>
            </a>

        </div>

        <?php render( 'fragments/components/_c-overlay', $data['background_overlay'] ); ?>
        <?php render( 'fragments/components/_c-progressive', $data['background_image'] ); ?>

</section>
