<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;
/**
 * Type	: Component
 * Name	: Island
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Island • Settings
 * *************************************
 */

$overlay_type = $data['type'] == 'light'
                ? 'white--85'
                : 'gray--d--85';


$overlay_data = [

    'overlay_type'  => $overlay_type

];

/**
 * *************************************
 * Island • View Definition
 * *************************************
 */

?>

<div class="c-island c-island--<?= $data['type']; ?>">

    <div class="c-island__content o-content-block">

		<?php if( isset( $data['icon'] ) ){ ?>

			<div class="c-island__icon">
				<?= AssetHandler\get_svg( $data['icon'] ); ?>
			</div>

		<?php } ?>

        <div class="c-island__title">

            <h5 class="f-hw--b f-hs--xl">
                <?= $data['title']; ?>
            </h5>

        </div>

        <div class="c-island__copy">
            <p class="f-b--base"><?= $data['copy']; ?></p>
        </div>

        <div class="c-island__action">
            <?php render( 'fragments/components/_c-btn', $data['action'] ); ?>
        </div>

    </div>

    <?php render( 'fragments/components/_c-overlay', $overlay_data ); ?>
    <?php render( 'fragments/components/_c-progressive', $data['background'] ); ?>

</div>
