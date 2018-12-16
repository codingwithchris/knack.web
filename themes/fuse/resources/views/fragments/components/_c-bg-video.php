<?php
/**
 * Type	: Component
 * Name	: Background Video
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Background Video • Settings
 * *************************************
 */


/**
 * *************************************
 * Background Video • View Definition
 * *************************************
 */
?>

<div class="c-bg-video">

    <iframe src="<?= esc_url( "https://player.vimeo.com/video/{$data['video_id']}?background=1&autoplay=1&loop=1&byline=0&title=0" ); ?>"
            frameborder="0"
            webkitallowfullscreen
            mozallowfullscreen
            allowfullscreen>
    </iframe>

</div>