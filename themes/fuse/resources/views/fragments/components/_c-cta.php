<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;

/**
 * Type	: Section
 * Name	:  CTA
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 *  CTA • View Settings
 * *************************************
 */

$post_type = 'page';

if( is_singular( 'projects' ) ){
	$post_type = 'project';
}

$option_group_name = "cta_{$post_type}_defaults";


// Default option sets for pag and project call to actions as defined in ACF
$defaults = [

	'type'			=> Acf::option( "{$option_group_name}_type" )->get(),
	'title'			=> Acf::option( "{$option_group_name}_title" )->get(),
	'copy'			=> Acf::option( "{$option_group_name}_copy" )->get(),
	'modifier_class'	=> "c-cta--{$post_type}",
	'action'	=> [

		'btn_type'	=> 'primary',
		'btn_text'	=> Acf::option( "{$option_group_name}_action_text" )->get(),
		'btn_url'	=> Acf::option( "{$option_group_name}_action_link" )->get(),
		'btn_theme'	=> Acf::option( "{$option_group_name}_type" )->get() === 'simple' ? 'white' : 'dark',

	],
	'bg_image'	=> [
		'image_url' => Acf::option( "{$option_group_name}_bg" )->get()
	]

];

 // Merge incoming data with defined defaults

$data = \array_merge( $defaults, $data );


// TODO -- handle merging in of arrays... like "action" for example - right now the whole array is getting wiped out


/**
 * *************************************
 *  CTA • View Definition
 * *************************************
 */

?>


<div class="c-cta c-cta--<?= $data['type']; ?> <?= $data['modifier_class']; ?>">

    <div class="f-container f-container--width f-container--max">

        <div class="c-cta__content o-content-block">

            <div class="c-cta__title o-content-block__title u-mbn">
                <h5 class="f-hw--b f-hs--2xl">
                    <?= $data['title']; ?>
                <h5>
            </div>

            <div class="c-cta__copy o-content-block__copy">
                <p class="f-b--base"><?= $data['copy']; ?></p>
            </div>

            <div class="c-cta__action o-content-block__action">
                <?php render( 'fragments/components/_c-btn', $data['action'] ); ?>
            </div>

        </div>

    </div>

    <?php
        if( $data['bg_overlay'] ){
            render( 'fragments/components/_c-overlay', $data['bg_overlay'] );
        }
    ?>

    <?php
        if( $data['bg_image'] ){
            render( 'fragments/components/_c-bg-image', $data['bg_image'] );
        }
    ?>

</div>
