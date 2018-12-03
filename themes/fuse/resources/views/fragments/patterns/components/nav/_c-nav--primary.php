<?php
namespace Fuse;
use Fuse\Contollers;
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

        <a class="c-nav__logo" href="<?= esc_url( home_url('/') ); ?>" aria-label="Go to the store home page" title="Good Medicine Store">
                <?php Controllers\render( 'fragments/patterns/foundations/_f-logo' ); ?>
        </a>

        <?php Controllers\render( 'fragments/patterns/components/menu/_c-menu--primary' ); ?>

</nav>