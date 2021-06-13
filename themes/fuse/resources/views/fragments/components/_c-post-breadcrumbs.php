<?php
/**
 * Type	: Component
 * Name	: Breadcrumbs
 *
 * @since 1.0.0
 * @author CreativeFuse
 */

/**
 * *************************************
 * Breadcrumbs • Settings
 * *************************************
 */

$home_url = esc_url( home_url('/') );
$blog_url = esc_url( home_url('/blog') );
$post_url = '/'

?>

<div class="c-post-breadcrumbs f-b--s">
    <a class="f-link f-link--inverted" href="<?= $home_url ?>">Home</a>
    <span class="sep">/</span>
    <a class="f-link f-link--inverted" href="<?= $blog_url ?>">Blog</a>
    <span class="sep">/</span>
    <span class="title" href="<?= $post_url; ?>"><?= get_the_title(); ?></span>
</div>