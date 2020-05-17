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

if( is_singular( 'post' ) ){
	$post_type = 'post';
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
		'btn_theme'	=> Acf::option( "{$option_group_name}_type" )->get() === 'standard' ? 'white' : 'dark',

	],
	'remove_bg'	=> false,
	'bg'	=> [
		'media' => Acf::option( "{$option_group_name}_bg" )->get(),
		'type'	=> 'bg'
	]

];

/**
 * If the user elects to modify default data, then we can merge user data with our
 * defaults array, otherwise, just use the defaults array as defined above.
 */

$data = ( isset( $data['override_defaults'] ) && $data['override_defaults'] === true )
        ? \array_replace_recursive( $defaults, $data )
        : $defaults;

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
        if( isset( $data['bg_overlay'] ) ){
            render( 'fragments/components/_c-overlay', $data['bg_overlay'] );
        }
    ?>

    <?php
        if( isset( $data['bg'] ) && ( isset( $data['remove_bg'] ) && $data['remove_bg'] !== true ) ){
            render( 'fragments/components/_c-progressive', $data['bg'] );
        }
    ?>

</div>
