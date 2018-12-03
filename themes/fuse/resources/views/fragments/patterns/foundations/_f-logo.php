<?php

use Fuse\AssetHandler;

/**
 * Type	: Foundation
 * Name	: Logo
 *
 * @since 1.0.0
 * @author CreativeFuse
 */


 /**
 * *************************************
 * Logo • Settings
 * *************************************
 */

    $svg = [

        'type'  => 'sprite',
        'name'  => '',
        'title'  => get_bloginfo('name') . ' Logo',

    ];

/**
 * *************************************
 * Logo • View Definition
 * *************************************
 */

// Bail if no name is defined
if( ! $svg['name'] )
    return;
?>

<div class="f-logo">

    <?php echo AssetHandler\get_svg( $svg ); ?>

</div>