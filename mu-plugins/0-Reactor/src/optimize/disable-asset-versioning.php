<?php
namespace Reactor\Optimize\DisableAssetVersioning;

/**
 * Remove version query string from all styles and scripts
 *
 * Taken from roots/soil
 * @link https://github.com/roots/soil/blob/master/modules/disable-asset-versioning.php
 */
add_filter('script_loader_src', __NAMESPACE__ . '\remove_script_version', 15, 1);
add_filter('style_loader_src', __NAMESPACE__ . '\remove_script_version', 15, 1);

function remove_script_version($src) {

    return $src ? esc_url(remove_query_arg('ver', $src)) : false;

  }