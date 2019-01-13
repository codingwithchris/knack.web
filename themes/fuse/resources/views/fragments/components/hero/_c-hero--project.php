<?php
namespace Fuse\Components;
use Fuse\AssetHandler;
use Samrap\Acf\Acf;
use function Fuse\Controllers\render as render;
/**
 * Type	: Component
 * Name	: Project • Hero
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Project • Hero • Settings
 * *************************************
 */

$media_data = [

	'media' 	=> Acf::field( 'featured_image_desktop' )->get() ,

];


/**
 * *************************************
 * Project • Hero • View Definition
 * *************************************
 */
?>

<div class="c-hero c-hero--project">

	<?= render( 'fragments/components/_c-progressive', $media_data ); ?>

</div>
