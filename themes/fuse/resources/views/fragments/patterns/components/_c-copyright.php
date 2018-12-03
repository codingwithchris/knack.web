<?php
namespace Fuse;
/**
 * Type	: Component
 * Name	: Copyright
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Copyright • View Definition
 * *************************************
 */

?>

<div class="c-copyright">
    <div class="f-container f-container--max--l f-container--width">

        <p class="c-copyright__content f-b--s">
            &copy; <time datetime="<?= $data['year'];?>"><?= $data['year'];?></time> <?= $data['copyright_entity'];?><?= esc_html__('. All Rights Reserved.', 'fuse'); ?>
        </p>

        <p class="c-copyright__designer f-b--s">
            <?= esc_html__('Website built with ', 'fuse'); ?><span class="c-copyright__heart"><3</span> by <a class="o-copyright__link a-link" href="<?= $data['creator_link'];?>" target='_blank' data-analytics-action="<?= strtolower( $data['creator_name'] );?>" data-analytics-source="footer"><?= $data['creator_name'];?></a>.
        </p>

        <p class="c-copyright__privacy f-b--s">
            <a class="c-copyright__link f-link" href="<?= $data['privacy_page']; ?>" data-analytics-action="privacy_policy" data-analytics-source="footer"><?= esc_html__( 'Privacy Policy', 'fuse' ); ?></a>
        </p>

    </div>
</div>