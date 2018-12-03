<?php
namespace Fuse;

return [

    // Core Theme settings
    'theme' => [

        'name'          => 'fuse',
        'version'       =>  '1.1.3',
        'text_domain'   => 'fuse',

        // This is the absolute path to your theme directory.
        'dir' => get_theme_file_path(),

        // This is the web server URI to your theme directory.
        'uri' => get_theme_file_uri(),

        // Theme supports to add on setup
        'supports'      => [

            'automatic-feed-links',
            'menus',
            'post-thumbnails',
            'title-tag'

        ],

        // WooCommerce Specific Theme Supports
        'woo_supports' => [

            'woocommerce',
            //'wc-product-gallery-zoom',
            'wc-product-gallery-lightbox',
            'wc-product-gallery-slider'

        ]

    ],

    // Here you may specify an array of paths that should be checked for your views.
    'paths' => [

        'view_root'         => get_theme_file_path()    . '/resources/views/',
        'template_root'     => get_theme_file_path()    . '/resources/views/templates/',
        'fragment_root'     => get_theme_file_path()    . '/resources/views/fragments/',
        'structure_root'    => get_theme_file_path()    . '/resources/views/structure/',

    ]

];
