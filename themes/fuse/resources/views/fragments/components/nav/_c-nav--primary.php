<?php
namespace Fuse\Components;
use Fuse\Controllers;
/**
 * Type	: Component
 * Name	: Nav -- Primary
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Nav -- Primary • Settings
 * *************************************
 */


/**
 * *************************************
 * Nav -- Primary • View Definition
 * *************************************
 */

?>

<nav class="c-nav c-nav--primary">

        <a class="c-nav__logo" href="<?= esc_url( home_url('/') ); ?>" aria-label="Go to the home page" title="Knack Creative Logo">
                <?php Controllers\render( 'fragments/foundations/_f-logo' ); ?>
        </a>

        <?php Controllers\render( 'fragments/components/menu/_c-menu--primary' ); ?>

</nav>
