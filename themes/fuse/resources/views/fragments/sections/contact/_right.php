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


<section id="contact-form" class="p-contact--split p-contact--right">

        <div class="p-contact--split__container">

            <div class="p-contact__logo">
                <?php render( 'fragments/foundations/_f-logo' ); ?>
            </div>

            <div class="p-contact__intro o-content-block">

                <div class="o-content-block__title">

                    <h3 class="f-b--base">
                        <?= esc_html( $data['intro'] ); ?>
                    </h3>

                </div>

            </div>

            <div class="p-contact__form c-form">
                <?= do_shortcode( "[gravityform id={$data['form_id']} title=false ajax=false description=false]" ); ?>
            </div>

        </div>

</section>