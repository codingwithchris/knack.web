<?php
use Fuse\AssetHandler;
use function Fuse\Controllers\render as render;

/**
 * Type	: Section
 * Name	: Dashboard Content
 *
 * @since 1.0.0
 * @author CreativeFuse
 */


/**
 * *************************************
 * Dashboard Content • View Definition
 * *************************************
 */

?>


<section id="dashboard-content" class="p-dashboard--content" data-anim-in="false">

    <?php render( 'fragments/components/_c-dashboard', $data ); ?>

</section>
