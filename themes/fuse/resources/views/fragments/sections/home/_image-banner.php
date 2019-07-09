<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Home • Clients
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Home • Clients • View Definition
 * *************************************
 */

?>


<section id="home-image-banner" class="p-home--image-banner">
    <div class="f-container">

		<?php render( 'fragments/components/_c-progressive', $data['image'] ); ?>

    </div>
</section>
