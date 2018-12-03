<?php

use Fuse\AssetHandler;

/**
 * Type	: Foundation
 * Name	: Logo -- Icon
 *
 * @since 1.0.0
 * @author CreativeFuse
 */


 /**
 * *************************************
 * Logo -- Icon • Settings
 * *************************************
 */

    $svg = [

        'type'   		=> 'file',
        'name'  		=> '',

    ];


/**
 * *************************************
 * Logo • View Definition
 * *************************************
 */

?>

<div class="f-logo--icon">

    <?php echo AssetHandler\get_svg( $svg ); ?>

</div>